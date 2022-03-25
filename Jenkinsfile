properties([
  pipelineTriggers([
    [
      $class: 'BitBucketPPRTrigger',
      triggers : [
        [
          $class: 'BitBucketPPRPullRequestTriggerFilter',
          actionFilter: [
            $class: 'BitBucketPPRPullRequestCreatedActionFilter',
          ]
        ],
        [
          $class: 'BitBucketPPRRepositoryTriggerFilter',
          actionFilter: [
            $class: 'BitBucketPPRRepositoryPushActionFilter',
            triggerAlsoIfTagPush: false,
            allowedBranches: "*/master"
          ]
        ]
      ]
    ]
  ])
])

pipeline {
  agent any
    triggers {
        bitbucketPush()
    }
  stages {
    stage('Pre steps') {
      steps {
          preSteps()
          echo "Syntax Checking"
          sh """find ${SOURCE_DIR} -type f -name '*.php' -exec php -l {} \\; | (! grep -v 'No syntax errors detected' )"""
          sh 'composer install --no-suggest --optimize-autoloader --no-ansi --no-interaction'
        }
      }

      stage('Setting up Environment') {
        steps {
          sh 'cp -rf .env.deploy .env'
          sh """ echo APP_NAME=$JOB_NAME >> .env """
          sh """ echo BUILD_TAG=$BUILD_TAG >> .env """
          sh """ echo DB_HOST=$MYSQL_HOST >> .env """
          sh """ echo DB_USERNAME=$MYSQL_CREDS_USR >> .env """
          sh """ echo DB_PASSWORD=$MYSQL_CREDS_PSW >> .env """
          sh """ echo DB_DATABASE=$DATABASE_NAME >> .env """

          sh 'php artisan key:generate'
        }
      }

      stage('PROD STAGE') {
        when {
          expression {
            return env.BRANCH_NAME == 'master'
          }

        }
        steps {
          echo 'This can be executed on Remote Targets'
          withCredentials(bindings: [sshUserPrivateKey(credentialsId: 'jenkins-ssh-key-for-prod', keyFileVariable: 'SSH_KEY_FOR_PROD')]) {
            script {
              sh """ rsync -arz --stats --exclude-from=.deployment_exclude -e 'ssh -i ${SSH_KEY_FOR_PROD}' ./  "jenkins@brokeria-prod:\$PROJECT_DIR/$BASE_NAME/$BASE_NAME-$BUILD_NUMBER" """
            }

            script {
              def remote = [:]
              remote.name = 'jenkins@brokeria-prod'
              remote.host = 'brokeria-prod'
              remote.user = 'jenkins'
              remote.identityFile = "${SSH_KEY_FOR_PROD}"
              remote.allowAnyHosts = true
              stage('SSH to the Remote Target') {
                echo "Prepare App on the Remote Target"
                sshCommand remote: remote, command: """
                cd $PROJECT_DIR/$BASE_NAME/$BASE_NAME-$BUILD_NUMBER && php artisan migrate --force
                """
                sshCommand remote: remote, command: """
                sudo chown -R jenkins:www-data $PROJECT_DIR/$BASE_NAME/$BASE_NAME-$BUILD_NUMBER/
                """
                sshCommand remote: remote, command: """
                sudo chmod -R g+w $PROJECT_DIR/$BASE_NAME/$BASE_NAME-$BUILD_NUMBER/
                """
                sshCommand remote: remote, command: """
                cd $PROJECT_DIR/$BASE_NAME/ && ln -sfn $BASE_NAME-$BUILD_NUMBER/ deploy
                """
              }
            }
          }
        }
      }

      stage('NPM dependencies') {
        steps {
          script {
            sh """ npm install --silent --no-progress """
          }
        }
      }

      stage('NPM build') {
        steps {
          script {
            sh """ npm run dev --silent --no-progress """
          }
        }
      }

       stage('Copying frontend to target') {
        steps {
          withCredentials(bindings: [sshUserPrivateKey(credentialsId: 'jenkins-ssh-key-for-prod', keyFileVariable: 'SSH_KEY_FOR_PROD')]) {
            script {
              def remote = [:]
              remote.name = 'jenkins@brokeria-prod'
              remote.host = 'brokeria-prod'
              remote.user = 'jenkins'
              remote.identityFile = "${SSH_KEY_FOR_PROD}"
              remote.allowAnyHosts = true

              sh """ rsync -arz --stats -e 'ssh -i ${SSH_KEY_FOR_PROD}' ./public "jenkins@brokeria-prod:\$PROJECT_DIR/$BASE_NAME/$BASE_NAME-$BUILD_NUMBER" """
            }
          }
        }
      }

    }
    environment {
      BUILD_DIR = 'build'
      SOURCE_DIR = 'app'
      PROJECT_DIR = '/var/www/brokeria-ecosystem'
      PHPUNIT = './vendor/bin/phpunit'
      JNK_PATH = "${env.WORKSPACE}/app"
      MYSQL_HOST = "127.0.0.1"
      MYSQL_CREDS = credentials('mysql-volunteering_chart_poland')
      BASE_NAME = """${sh(returnStdout: true,script: "echo $JOB_NAME | grep -o '^[^(\\/|\\)]*'").trim()}"""
      DATABASE_NAME = 'volunteering_chart_poland'
    }
    post {
      always {
        cleanWs()
      }
    }

    parameters {
      string(name: 'CUSTOM_DATABASE_NAME', defaultValue: '', description: 'Custom database name for build')
      booleanParam(name: 'DROP_BUILD_DB', defaultValue: true, description: 'Is Debug build?')
    }
  }

def preSteps() {
    sh 'printenv'
}

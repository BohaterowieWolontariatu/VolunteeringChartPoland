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
          script {
            if (params.CUSTOM_DATABASE_NAME == '') {
              echo "Database name: ${BUILD_DATABASE_NAME}"
              sh 'echo  DB_DATABASE="${BUILD_DATABASE_NAME}" >> .env'
            }
            else{
              echo "Database name: ${params.CUSTOM_DATABASE_NAME}"
              sh '''echo  DB_DATABASE=''' + params.CUSTOM_DATABASE_NAME +''' >> .env '''
            }
          }

        }
      }

      stage('Prepare to Tests') {
        parallel {
          stage('Database') {
            steps {
              echo "Prepare to create build database: ${BUILD_DATABASE_NAME}"
              script {
                if (params.CUSTOM_DATABASE_NAME == '') {
                  echo "Database name: ${BUILD_DATABASE_NAME}"
                  sh 'mysql -h "$MYSQL_HOST" -u "$MYSQL_CREDS_USR" --password="$MYSQL_CREDS_PSW" -e "CREATE DATABASE IF NOT EXISTS ${BUILD_DATABASE_NAME} DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;" '
                }
                else{
                  echo "Database name: ${params.CUSTOM_DATABASE_NAME}"
                  sh '''mysql -h "$MYSQL_HOST" -u "$MYSQL_CREDS_USR" --password="$MYSQL_CREDS_PSW" -e "CREATE DATABASE IF NOT EXISTS ''' + params.CUSTOM_DATABASE_NAME +''' DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;" '''
                }
              }
            }
          }

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
                cd $PROJECT_DIR/$BASE_NAME/$BASE_NAME-$BUILD_NUMBER && php artisan key:generate
                """
                sshCommand remote: remote, command: """
                cd $PROJECT_DIR/$BASE_NAME/$BASE_NAME-$BUILD_NUMBER && php artisan migrate
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

      stage('Post Tests Cleanup') {
        steps {
          script {
            if (params.DROP_BUILD_DB){
              if (params.CUSTOM_DATABASE_NAME == '') {
                echo "Database to be removed: ${BUILD_DATABASE_NAME}"
                sh 'mysql -h "$MYSQL_HOST" -u "$MYSQL_CREDS_USR" --password="$MYSQL_CREDS_PSW" -e "DROP DATABASE IF EXISTS ${BUILD_DATABASE_NAME} ;" '
              }
              else{
                echo "Database to be removed: ${params.CUSTOM_DATABASE_NAME}"
                sh '''mysql -h "$MYSQL_HOST" -u "$MYSQL_CREDS_USR" --password="$MYSQL_CREDS_PSW" -e "DROP DATABASE IF EXISTS ''' + params.CUSTOM_DATABASE_NAME +''' ;" '''
              }
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
      MYSQL_HOST = credentials('mysql-host')
      MYSQL_CREDS = credentials('mysql-local')
      BASE_NAME = """${sh(returnStdout: true,script: "echo $JOB_NAME | grep -o '^[^(\\/|\\)]*'").trim()}"""
      DATABASE_NAME = """${sh(returnStdout: true,script: "echo $JOB_NAME | grep -o '^[^(\\/|\\)]*' | sed -e 's/-/_/g' -e 's/ /_/g'").trim()}"""
      BUILD_DATABASE_NAME = """${sh(returnStdout: true,script: " echo \$(echo 'jenkins_')\$(echo $JOB_NAME | grep -o '^[^(\\/|\\)]*' | sed -e 's/-/_/g' -e 's/ /_/g')\$(echo _${BUILD_ID}) ").trim()}"""
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

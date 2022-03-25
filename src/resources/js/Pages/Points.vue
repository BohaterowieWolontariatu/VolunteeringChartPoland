
<template>
<!--  <v-app id="inspire">-->
  <v-row>
    <template v-for="n in 1">
      <v-col
        :key="n"
        class="mt-2"
        cols="12"
      >
        <h2>Gdańsk</h2>
      </v-col>

      <v-col
        v-for="(j, key) in 6"
        :key="key+55"
        md="4"
        sm="12"
      >
        <v-card
          class="mx-auto"
          :elevation="1"
          hover
        >

          <v-card-title>
            Stadion
          </v-card-title>

          <v-card-subtitle>
            <v-row>
              <v-col sm="12" md="6">
                <div class="mb-2 font-weight-bold">Potrzeba wolontariuszy</div>
                <div>
                  <div>
                    Dziś:
                    <v-chip
                      class="ma-2"
                      color="red"
                      text-color="white"
                    >
                      5
                    </v-chip>
                  </div>
                  <div>
                    Jutro:
                    <v-chip
                      class="ma-2"
                      color="primary"
                      text-color="white"
                    >
                      1
                    </v-chip>
                  </div>
                  <div>
                    Pojutrze:
                    <v-chip
                      class="ma-2"
                      color="grey"
                      text-color="white"
                    >
                      nieczynne
                    </v-chip>
                  </div>
                </div>
              </v-col>
              <v-col sm="12" md="6">
                <div class="mb-2 font-weight-bold">Koordynatorzy</div>
                <div class="mb-4">
                  <div>Jacek Jackowski</div>
                  <div>Kom. +48 123 123 123</div>
                </div>
                <div>
                  <div>Karolina Wiśniewska</div>
                  <div>Kom. +48 123 123 123</div>
                </div>
              </v-col>
            </v-row>
          </v-card-subtitle>

          <v-card-actions class="justify-between">
            <v-btn
              color=""
              text
            >
              Zobacz
            </v-btn>

            <v-btn
              depressed
              @click="show = !show"
            >
              Pokaż adres
            </v-btn>
          </v-card-actions>

          <v-expand-transition>
            <div v-show="show">
              <v-divider></v-divider>

              <v-card-text>
                <div>
                  Adres: Olimpijska 2
                </div>
              </v-card-text>
            </div>
          </v-expand-transition>
        </v-card>
      </v-col>
    </template>
  </v-row>


</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
// import Welcome from '@/Jetstream/Welcome'
export default {
  name: "Points",
  components: {
    AppLayout,
    // Welcome,
  },
  data: () => ({
    drawer: null,
    show: false,
    date: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
    menu: false,
    modal: false,
    menu2: false,
    loader: null,
    loading: false,

    items: [
      {
        avatar: 'https://cdn.vuetifyjs.com/images/lists/1.jpg',
        title: 'Jacek Kozłowski',
        subtitle: `Kom. +48 123 123 123`,
      },
      {
        avatar: 'https://cdn.vuetifyjs.com/images/lists/3.jpg',
        title: 'Marta Piasek',
        subtitle: `Kom. +48 123 123 123`,
      },
    ],
  }),
  watch: {
    loader () {
      const l = this.loader
      this[l] = !this[l]

      setTimeout(() => (this[l] = false), 3000)

      this.loader = null
    },
  },
}
</script>
<style>
.ukraine-blue {
  background-color:#005bbc
}
.ukraine-yellow {
  background-color:#ffd600
}
@-moz-keyframes loader {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}
@-webkit-keyframes loader {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}
@-o-keyframes loader {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}
@keyframes loader {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}
</style>

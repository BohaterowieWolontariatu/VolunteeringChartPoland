
<template>
  <v-app id="inspire">
    <app-layout>

      <v-main class="grey lighten-2">
        <v-container>
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
                v-for="j in 6"
                :key="`${n}${j}`"
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

                  <v-card-actions class="justify-space-between">
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
        </v-container>

        <v-container>
          <v-row>
            <v-col
              sm="12"
            >
              <div class="text-center mt-15">
                <h1>Stadion</h1>
              </div>
            </v-col>
          </v-row>
        </v-container>


        <!--            app-->
        <v-container>
          <!--                datepicker-->
          <v-row>
            <v-col
              cols="12"
              sm="12"
            >
              <div class="d-flex justify-space-between align-items-center">
                <div>
                  <v-btn
                    class="ma-2"
                    text
                    icon
                    x-large
                    color="primary"
                  >
                    <v-icon>mdi-arrow-left-bold</v-icon>
                  </v-btn>
                </div>
                <div>
                  <v-menu
                    v-model="menu2"
                    :close-on-content-click="false"
                    :nudge-right="40"
                    transition="scale-transition"
                    offset-y
                    min-width="auto"
                  >
                    <template v-slot:activator="{ on, attrs }">
                      <v-text-field
                        v-model="date"
                        label="Data"
                        prepend-icon="mdi-calendar"
                        readonly
                        v-bind="attrs"
                        v-on="on"
                      ></v-text-field>
                    </template>
                    <v-date-picker
                      v-model="date"
                      @input="menu2 = false"
                    ></v-date-picker>
                  </v-menu>
                </div>
                <div>
                  <v-btn
                    class="ma-2"
                    text
                    icon
                    x-large
                    color="primary"
                  >
                    <v-icon>mdi-arrow-right-bold</v-icon>
                  </v-btn>
                </div>


              </div>
            </v-col>
          </v-row>

          <v-row>
            <v-col
              v-for="i in [{
                            title: 'Poniedziałek',
                            description: 'Potrzeba osób: 13'
                        },{
                            title: 'Wtorek',
                            description: 'Potrzeba osób: 2'
                        }]"
              :key="i"
              md="6"
              sm="12"
              class="text-center"
            >
              <div class="py-5 ukraine-blue text-white">
                <h3>
                  {{ i.title }}
                </h3>
                <h2 class="font-weight-bold">
                  {{ i.description }}
                </h2>
              </div>

              <v-row>
                <v-col
                  v-for="j in [
                                    {
                                        title: 'Zmiana 1 w godzinach 15:00-18:00',
                                    },
                                    {
                                       title: 'Zmiana 2 w godzinach 18:00-21:00',
                                    }
                                ]"
                  :key="j"
                  sm="12"
                >
                  <div class="py-5 ukraine-yellow">
                    <h4>
                      {{j.title}}
                    </h4>
                  </div>

                  <v-row class="mt-3">
                    <v-col
                      class="pt-0"
                      v-for="k in 4"
                      :key="k"
                      sm="12"
                    >
                      <div class="white p-4" style="min-height:95px">
                        <div v-if="k <= 2" class="d-flex align-items-center justify-space-between">
                          <div class="d-flex align-items-center">
                            <v-avatar>
                              <img
                                src="https://cdn.vuetifyjs.com/images/john.jpg"
                                alt="John"
                              >
                            </v-avatar>
                            <div class="ml-3" style="font-size:24px">{{ k % 2 ? 'Robert' : 'Dawid' }}</div>
                          </div>
                          <div>
                            PL / EN
                          </div>https://meet.google.com/mtw-nivj-kyj
                        </div>
                        <div v-else class="d-flex align-items-center justify-content-center">
                          <div>
                            <v-btn
                              large
                              depressed
                              :loading="loading"
                              :disabled="loading"
                              class="text-white"
                              color="#005bbc"
                              @click="loader = 'loading'"
                            >
                              Zapisz się
                            </v-btn>
                            <!--                                                    <v-btn-->
                            <!--                                                        depressed-->
                            <!--                                                        color="success"-->
                            <!--                                                        large-->
                            <!--                                                    >-->
                            <!--                                                        Zapisz się-->
                            <!--                                                    </v-btn>-->
                          </div>
                        </div>

                      </div>
                    </v-col>

                    <v-col
                      class="pt-0"
                      sm="12"
                    >
                      <div class="p-4" style="min-height:95px">
                        <div class="d-flex align-items-center justify-content-center">
                          <div>
                            <v-btn
                              large
                              depressed
                              :loading="loading"
                              :disabled="loading"
                              class="text-white"
                              color="#005bbc"
                              @click="loader = 'loading'"
                            >
                              Zapisz się na listę rezerwową
                            </v-btn>
                            <!--                                                    <v-btn-->
                            <!--                                                        depressed-->
                            <!--                                                        color="success"-->
                            <!--                                                        large-->
                            <!--                                                    >-->
                            <!--                                                        Zapisz się-->
                            <!--                                                    </v-btn>-->
                          </div>
                        </div>

                      </div>
                    </v-col>



                  </v-row>
                </v-col>
              </v-row>
            </v-col>

          </v-row>
        </v-container>
      </v-main>
    </app-layout>
  </v-app>



</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
// import Welcome from '@/Jetstream/Welcome'
export default {
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

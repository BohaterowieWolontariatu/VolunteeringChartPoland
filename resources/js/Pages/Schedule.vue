<template>

  <div>

    <div class="text-center">
      <p class="text-6xl">Stadion</p>
    </div>

    <div>
      <div
        class="w-full"
      >
        <div class="flex justify-between items-center">
          <div>
            <v-btn
              class="ma-2"
              color="primary"
              icon
              text
              x-large
            >
              <v-icon>mdi-arrow-left-bold</v-icon>
            </v-btn>
          </div>
          <div>
            <v-menu
              v-model="menu2"
              :close-on-content-click="false"
              :nudge-right="40"
              min-width="auto"
              offset-y
              transition="scale-transition"
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
              color="primary"
              icon
              text
              x-large
            >
              <v-icon>mdi-arrow-right-bold</v-icon>
            </v-btn>
          </div>


        </div>
      </div>
    </div>


    <div class="md:flex md:space-x-4 w-full">
      <div
        v-for="(i,key) in [{
                            title: 'Poniedziałek',
                            color: 'bg-green-700',
                            description: 'Potrzeba osób: 13'
                        },{
                            title: 'Wtorek',
                            color: 'bg-green-600',
                            description: 'Potrzeba osób: 2'
                        },{
                            title: 'Środa',
                            color: 'bg-green-500',
                            description: 'Potrzeba osób: 2'
                        }]"
        :key="key+334"
        class="text-center sm:w-full md:w-1/2"
      >
        <div class="py-2 text-white" :class="i.color">
          <p class="text-3xl">
            {{ i.title }}
          </p>
        </div>
        <div class="py-2 ukraine-blue text-white">
          <p class="font-bold text-xl">
            {{ i.description }}
          </p>
        </div>

        <div>
          <div
            v-for="(j, jkey) in [
                                    {
                                        title: 'Zmiana 1 w godzinach 15:00-18:00',
                                    },
                                    {
                                       title: 'Zmiana 2 w godzinach 18:00-21:00',
                                    }
                                ]"
            :key="jkey+345"
            class="w-full"
          >
            <div class="py-2 ukraine-yellow">
              <p class="font-bold">
                {{ j.title }}
              </p>
            </div>

            <div>
              <div
                v-for="(k,kkey) in 4"
                :key="kkey"
                class="bg-white px-4 flex items-center mb-2 shadow-md"
                style="min-height:50px"
              >
<!--                <div class="" >-->
                  <div v-if="k <= 2" class="flex w-full items-center justify-between">
                    <div class="flex items-center">
                      <div class="flex relative w-9 h-9 bg-green-500 justify-center items-center m-1 mr-2 text-xl rounded-full text-white">{{ k % 2 ? 'R' : 'D' }}</div>
                      <div class="ml-3" style="font-size:22px">{{ k % 2 ? 'Robert' : 'Dawid' }}</div>
                    </div>
                    <div>
                      PL / EN
                    </div>
                  </div>
                  <div v-else class="w-full">
                    <!--                    <div class="w-full">-->
                    <button
                      class="w-full bg-blue-500 text-white px-4 py-1 rounded-md text-1xl font-medium hover:bg-blue-700 transition duration-300">
                      Zapisz się
                    </button>
                    <!--                                                    <v-btn-->
                    <!--                                                        depressed-->
                    <!--                                                        color="success"-->
                    <!--                                                        large-->
                    <!--                                                    >-->
                    <!--                                                        Zapisz się-->
                    <!--                                                    </v-btn>-->
                    <!--                    </div>-->
                  </div>

<!--                </div>-->
              </div>

              <div
                class="pt-0 w-full"
              >
                <div class="p-4" style="min-height:95px">
                  <div class="flex items-center justify-center">
                    <!--                    <div class=">-->
                    <button
                      class="w-full bg-gray-600 text-white px-4 py-2 rounded-md text-1xl font-medium hover:bg-blue-700 transition duration-300">
                      Zapisz się na listę rezerwową
                    </button>
                    <!--                                                    <v-btn-->
                    <!--                                                        depressed-->
                    <!--                                                        color="success"-->
                    <!--                                                        large-->
                    <!--                                                    >-->
                    <!--                                                        Zapisz się-->
                    <!--                                                    </v-btn>-->
                    <!--                    </div>-->
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>


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
    date: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
    menu: false,
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
    loader() {
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
  background-color: #005bbc
}

.ukraine-yellow {
  background-color: #ffd600
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

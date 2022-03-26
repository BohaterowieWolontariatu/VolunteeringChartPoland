<template>
  <app-layout v-if="point">
    <template #header>
      <h1 class="font-semibold text-2xl text-gray-800 leading-tight">
        Punkt: {{ point.name }}
      </h1>
    </template>


    <div class="container mx-auto">

      <breadcrumbs />

      <div class="flex flex-col md:flex-row sm:space-x-5 information-wrapper pb-4 shadow">

        <div class="flex flex-col sm:w-full md:w-1/2 point-informations">
          <p class="text-xl font-bold mb-2">
            Informacje na temat placówki
          </p>
          <p>
            {{ point.address }}
          </p>
          <p class="my-3">
            {{ point.lead }}
          </p>
          <p>
            {{ point.description }}
          </p>
        </div>

        <div class="flex flex-col sm:w-full md:w-1/2 instructions">
          <p class="text-xl font-bold mb-2">
            Instrukcja
          </p>
          <p class="font-bold">
            1. WYPEŁNIJ POROZUMIENIE WOLONTARIACKIE
          </p>

          <p>
            Porozumienie dla osób pełnoletnich:
          </p>
          <p>
            https://forms.gle/UQMVqZmtwE3Y1MgEA
          </p>
          <p>
            Porozumienie dla osób niepełnoletnich:
          </p>
          <p>
            https://forms.gle/CUCkafUsszqZrC9C6
          </p>
          <p class="font-bold">
            2. WYBIERZ PLACÓWKĘ, W KTÓREJ CHCIAŁBYŚ POMAGAĆ
          </p>
          <p>
            Lista placówek znajduje się na dole, po lewej stronie.
          </p>
          <p class="font-bold">
            3. WYPEŁNIJ DANE OSOBOWE
          </p>
          <p>
            Pamiętaj, aby wypełenić wszystkie pola. Numer telefonu musi zawierać 9 cyfr.
          </p>
          <p class="font-bold">
            4. WYBIERZ ZMIANĘ Z KALENDARZA
          </p>
          <p>
            Kalendarz pokazuje zmiany, które nie mają wystarczającej liczby wolontariuszy, na które nie jesteś jeszcze zapisany. Aby wybrać
            zmianę, zaznacz ją w kalendarzu.
          </p>
          <p class="font-bold">
            5. ZAPISZ SIĘ NA ZMIANĘ
          </p>
          <p>
            Po wybraniu zmiany, jej dane wyświetlą się na prawo od kalendarza. Jeśli wszysko się zgadza, kliknij przycisk zapisz się na
            zmianę
          </p>
          <p class="font-bold">
            6. WYSZUKAJ SWOJĄ ZMIANĘ
          </p>
          <p>
            Możesz zobaczyć zmiany, na które się zapisałeś wyszukując je po numerze telefonu w zakładce moje zmiany. Po wybraniu zmiany z
            kalendarza, możesz zrezygnować ze zmiany klikając zrezygnuj ze zmiany.
          </p>
          <p class="font-bold">
            7. NA MIEJSCU CZEKAĆ BĘDZIE NA CIEBIE KOORDYNATOR LUB LIDER WOLONTARIATU, KTÓRY WPROWADZI CIEBIE W DZIAŁANIA
          </p>
          <p>
            Jeśli potrzebujesz wcześniej nawiązać kontakt z koordynatorem placówki napisz do nas.
          </p>

        </div>
      </div>


      <div class="text-center my-5">
        <p class="text-3xl font-bold">Harmonogram</p>
      </div>
      <!--        <div class="container mx-auto">-->
      <!--          <div-->
      <!--            class="w-full"-->
      <!--          >-->
      <!--            <div class="flex justify-between items-center">-->
      <!--              <div>-->
      <!--                <v-btn-->
      <!--                  class="ma-2"-->
      <!--                  color="primary"-->
      <!--                  icon-->
      <!--                  text-->
      <!--                  x-large-->
      <!--                >-->
      <!--                  <v-icon>mdi-arrow-left-bold</v-icon>-->
      <!--                </v-btn>-->
      <!--              </div>-->
      <!--              <div>-->
      <!--                <v-menu-->
      <!--                  v-model="menu2"-->
      <!--                  :close-on-content-click="false"-->
      <!--                  :nudge-right="40"-->
      <!--                  min-width="auto"-->
      <!--                  offset-y-->
      <!--                  transition="scale-transition"-->
      <!--                >-->
      <!--                  <template v-slot:activator="{ on, attrs }">-->
      <!--                    <v-text-field-->
      <!--                      v-model="date"-->
      <!--                      label="Data"-->
      <!--                      prepend-icon="mdi-calendar"-->
      <!--                      readonly-->
      <!--                      v-bind="attrs"-->
      <!--                      v-on="on"-->
      <!--                    ></v-text-field>-->
      <!--                  </template>-->
      <!--                  <v-date-picker-->
      <!--                    v-model="date"-->
      <!--                    @input="menu2 = false"-->
      <!--                  ></v-date-picker>-->
      <!--                </v-menu>-->
      <!--              </div>-->
      <!--              <div>-->
      <!--                <v-btn-->
      <!--                  class="ma-2"-->
      <!--                  color="primary"-->
      <!--                  icon-->
      <!--                  text-->
      <!--                  x-large-->
      <!--                >-->
      <!--                  <v-icon>mdi-arrow-right-bold</v-icon>-->
      <!--                </v-btn>-->
      <!--              </div>-->


      <!--            </div>-->
      <!--          </div>-->
      <!--        </div>-->

      <div class="schedule m-5">
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
            class="text-center sm:w-full md:w-1/2 shadow"
          >
            <div :class="i.color" class="py-2 text-white">
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
                        <div
                          class="flex relative w-9 h-9 bg-green-500 justify-center items-center m-1 mr-2 text-xl rounded-full text-white">
                          {{ k % 2 ? 'R' : 'D' }}
                        </div>
                        <div class="ml-3" style="font-size:22px">{{ k % 2 ? 'Robert' : 'Dawid' }}</div>
                      </div>
                      <div>
                        PL / EN
                      </div>
                    </div>
                    <div v-else class="w-full">
                      <!--                    <div class="w-full">-->
                      <button
                        class="w-full bg-blue-500 text-white px-4 py-2 rounded-md text-1xl font-medium hover:bg-blue-700 transition duration-300">
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

    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Breadcrumbs from "@/Pages/Breadcrumbs.vue";

export default {
  props: ['sessions'],
  data() {
    return {
      point: null
    }
  },
  components: {
    Breadcrumbs,
    AppLayout,
  },
  mounted() {
    this.point = this.$page.props.point
  }
}
</script>
<style scoped>
.schedule {

}

.information-wrapper {
  padding: 10px 25px;
  margin-top: 1px;
  max-height: 300px;
  overflow: auto;
  background-color: white;
}

.instructions {

}

.point-informations p,
.instructions p {
  text-align: justify;
}
</style>
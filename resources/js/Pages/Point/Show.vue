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
          <PointDateComponent
            v-for="(pointDate,key) in [{
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
            :pointDate="point"
            :key="key+334"
          />

        </div>
      </div>

    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Breadcrumbs from "@/Pages/Breadcrumbs.vue";
import PointDateComponent from "@/Pages/Point/PointDateComponent.vue";

export default {
  props: ['sessions'],
  data() {
    return {  }
  },
  computed: {
    point() {
      return this.$page.props.point || []
    }
  },
  components: {
    PointDateComponent,
    Breadcrumbs,
    AppLayout,
  },
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
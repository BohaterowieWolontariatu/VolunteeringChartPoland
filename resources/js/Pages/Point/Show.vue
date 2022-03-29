<template>
  <app-layout v-if="point">
    <template #header>
      <h1 class="font-semibold text-2xl text-gray-800 leading-tight">
        Punkt: {{ point.name }}
      </h1>
    </template>

    <div class="container mx-auto">

      <breadcrumbs/>

      <div class="information-wrapper pb-4 shadow rounded">
        <div class="accordion accordion-flush" id="accordionFlushExample">
          <div class="accordion-item border-t-0 border-l-0 border-r-0 rounded-none bg-white border border-gray-200">
            <h2 class="accordion-header mb-0" id="flush-headingOne">
              <button
                class="accordion-button collapsed relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none"
                type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                aria-expanded="false" aria-controls="flush-collapseOne">
                Informacje na temat punktu
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse border-0 collapse"
                 aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body py-4 px-5">
                <p>
                  <span v-html="point.description"></span>
                </p>
              </div>
            </div>
          </div>
          <div class="accordion-item border-l-0 border-r-0 rounded-none bg-white border border-gray-200">
            <h2 class="accordion-header mb-0" id="flush-headingTwo">
              <button class="accordion-button
    collapsed
    relative
    flex
    items-center
    w-full
    py-4
    px-5
    text-base text-gray-800 text-left
    bg-white
    border-0
    rounded-none
    transition
    focus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                      aria-expanded="false" aria-controls="flush-collapseTwo">
                Instrukcja
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse border-0 collapse" aria-labelledby="flush-headingTwo"
                 data-bs-parent="#accordionFlushExample">
              <div class="accordion-body py-4 px-5">
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
                  Kalendarz pokazuje zmiany, które nie mają wystarczającej liczby wolontariuszy, na które nie jesteś jeszcze zapisany. Aby
                  wybrać
                  zmianę, zaznacz ją w kalendarzu.
                </p>
                <p class="font-bold">
                  5. ZAPISZ SIĘ NA ZMIANĘ
                </p>
                <p>
                  Po wybraniu zmiany, jej dane wyświetlą się na prawo od kalendarza. Jeśli wszysko się zgadza, kliknij przycisk zapisz się
                  na
                  zmianę
                </p>
                <p class="font-bold">
                  6. WYSZUKAJ SWOJĄ ZMIANĘ
                </p>
                <p>
                  Możesz zobaczyć zmiany, na które się zapisałeś wyszukując je po numerze telefonu w zakładce moje zmiany. Po wybraniu
                  zmiany z
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
          </div>
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
          <point-date-component
            v-for="schedule in point.schedules"
            :key="schedule.sheduled_at"

            :pointDate="point"
            :schedule="schedule"
          />

        </div>
      </div>

    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout';
import Breadcrumbs from '@/Pages/Breadcrumbs.vue';
import PointDateComponent from '@/Pages/Point/PointDateComponent.vue';

export default {
  props: ['sessions'],
  data() {
    return {};
  },
  computed: {
    point() {
      return this.$page.props.point || [];
    },
  },
  components: {
    PointDateComponent,
    Breadcrumbs,
    AppLayout,
  },
};
</script>
<style scoped>
.schedule {

}

.information-wrapper {
  padding: 10px 25px;
  margin-top: 1px;
  background-color: white;
}

.instructions {

}

.point-informations p,
.instructions p {
  text-align: justify;
}
</style>
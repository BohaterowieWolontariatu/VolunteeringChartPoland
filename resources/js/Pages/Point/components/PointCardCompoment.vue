<template>
  <div class="w-full md:w-1/3 mb-5 md:mb-0">

<!--    <div class="max-w-2xl sm:px-6 lg:px-8">-->
      <div class="overflow-hidden shadow-md">
        <!-- card header -->
        <div class="px-6 py-4 bg-white border-b border-gray-200 font-bold uppercase">
          {{point.name}}
        </div>

        <!-- card body -->
        <div class="flex flex-col p-6 bg-white border-b border-gray-200">
          <div class="">
            <div>
              <p class="font-bold">Potrzeba wolontariuszy</p>
            </div>
            <div class="flex space-x-5">
              <div class="flex items-center space-x-2">
                <div>Dziś</div>
                <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-full text-black bg-red-300 border border-red-300 w-8">
                  <div class="text-xs font-normal leading-none max-w-full flex-initial">15</div>
                </div>
              </div>
              <div class="flex items-center space-x-2">
                <div>Jutro</div>
                <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-full text-black bg-yellow-300 border border-yellow-300 w-8">
                  <div class="text-xs font-normal leading-none max-w-full flex-initial">7</div>
                </div>
              </div>
              <div class="flex items-center space-x-2">
                <div>Pojutrze</div>
                <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-full text-black bg-green-300 border border-green-300 w-8">
                  <div class="text-xs font-normal leading-none max-w-full flex-initial">1</div>
                </div>
              </div>
            </div>
          </div>
          <div>
            <p class="mb-1">{{point.lead}}</p>
          </div>
        </div>

        <!-- card footer -->
        <div class="p-6 bg-white border-gray-200 text-right">
          <inertia-link
            :href="route('points.show', {
              id: point.id
            })"
            class="bg-blue-500 shadow-md text-sm text-white font-bold py-3 md:px-8 px-4 hover:bg-blue-400 rounded uppercase w-full"
          >
            Przejdź do placówki
          </inertia-link>
        </div>
      </div>




<!--    <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">-->
<!--      <h2 class="mt-4 font-bold text-xl">{{point.name}}</h2>-->

<!--      <div class="grid grid-cols-2">-->

<!--        <div class="float-left">-->

<!--        </div>-->

<!--        <div class="float-right">-->


<!--          <h1>Koordynatorzy</h1>-->
<!--          <div class="mb-4">-->
<!--            <div>Jacek Jackowski</div>-->
<!--            <div>Kom. +48 123 123 123</div>-->
<!--          </div>-->
<!--          <div>-->
<!--            <div>Karolina Wiśniewska</div>-->
<!--            <div>Kom. +48 123 123 123</div>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--      <div class="p-2 text-grey-darker text-justify flex flex-row justify-end">-->
<!--        <div class="p-2 bg-white border-gray-200">-->
<!--          <inertia-link-->
<!--            :href="route('points.show', {-->
<!--              id: point.id-->
<!--            })"-->
<!--            class="bg-blue-500 text-white px-4 py-2 rounded-md text-1xl font-medium hover:bg-blue-700 transition duration-300"-->
<!--          >-->
<!--            Przejdź do placówki-->
<!--          </inertia-link>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
  </div>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout';
// import Welcome from '@/Jetstream/Welcome'
export default {
  name: "PointCardComponent",
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
    loader() {
      const l = this.loader
      this[l] = !this[l]

      setTimeout(() => (this[l] = false), 3000)

      this.loader = null
    },
  },
  props: {
    point: {
      type: Object,
      required: true,
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

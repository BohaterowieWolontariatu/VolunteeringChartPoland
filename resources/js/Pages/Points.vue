<template>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">

    <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg" v-for="n in 4">
      <h2 class="mt-4 font-bold text-xl">Stadion</h2>

      <div class="grid grid-cols-2">
        <div class="float-left">
          <h3>Potrzeba wolontariuszy</h3>
          <div>
            <div>Dziś: 5</div>
            <div>Jutro: 1</div>
            <div>Pojutrze: nieczynne</div>
          </div>
        </div>
        <div class="float-right">
          <h1>Koordynatorzy</h1>
          <div class="mb-4">
            <div>Jacek Jackowski</div>
            <div>Kom. +48 123 123 123</div>
          </div>
          <div>
            <div>Karolina Wiśniewska</div>
            <div>Kom. +48 123 123 123</div>
          </div>
        </div>
      </div>
      <div class="p-2 text-grey-darker text-justify flex flex-row justify-end">
        <div class="p-2 bg-white border-gray-200">
          <button class="bg-blue-500 text-white px-4 py-2 rounded-md text-1xl font-medium hover:bg-blue-700 transition duration-300">
            Przejdź do placówki
          </button>
        </div>
        <div class="p-2 bg-white border-gray-200">
          <button class="bg-blue-500 text-white px-4 py-2 rounded-md text-1xl font-medium hover:bg-blue-700 transition duration-300" @click="show = !show">
            Informacje
          </button>
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

<template>
  <button
    class="w-full text-white
                 bg-red-700
                  px-4 py-2 rounded-md text-1xl font-medium hover:bg-red-500 transition duration-300"
    @click="onDeclineHandler"
  >
    Wypisz się
  </button>
</template>
<script>
export default {
  name: 'UnauthDeclineButtonComponent',
  methods: {
    onDeclineHandler () {
      this.$inertia.delete(route('slots.unsubscribe', {
        point: this.$page.props.point.id,
        slot: this.$page.props.slot.id,
        token: this.$page.props.token,
      }));
    },
  },
};
</script>
<style scoped>

@media (prefers-color-scheme: dark) {

}
</style>
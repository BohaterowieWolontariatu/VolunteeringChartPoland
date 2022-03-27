<template>
  <div
    class="pt-0 w-full"
  >
    <div class="p-4" style="min-height:95px">
      <div class="flex items-center justify-center">
        <!--                    <div class=">-->
        <button
          class="w-full bg-gray-600 text-white px-4 py-2 rounded-md text-1xl font-medium hover:bg-blue-500 transition duration-300"
          @click="assignToSlot">
          Zapisz się na listę rezerwową
        </button>
      </div>

    </div>
  </div>
</template>
<script>
export default {
  name: 'ReserveListSignComponent',
  methods: {
    assignToSlot() {
      this.$inertia.post(route("slot.store"), {
        schedule_at: this.schedule_at,
        pointShift: this.pointShift,
        is_reserve: true,
      })
    }
  },
  props: {
    schedule_at: {},
    pointShift: {},
  },
}
</script>
<style scoped>

.point-informations p,
.instructions p {
  text-align: justify;
}
</style>

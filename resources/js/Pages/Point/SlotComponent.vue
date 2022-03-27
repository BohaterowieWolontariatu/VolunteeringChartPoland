<template>
  <div class="bg-white px-4 flex items-center mb-2 py-2">
    <div class="flex w-full items-center justify-between">
      <div class="flex items-center">
        <div
          class="flex relative w-9 h-9 bg-green-500 justify-center items-center m-1 mr-2 text-xl rounded-full text-white">
          {{ shiftSlot.user.name[0] }}
        </div>
        <div class="ml-3" style="font-size:22px">{{ shiftSlot.user.name }}</div>
      </div>
      <div>
        <button v-if="shiftSlot.user.id === $page.props.user.id"
          class="w-full primary-blue text-white px-4 py-2 rounded-md text-1xl font-medium hover:bg-blue-500 transition duration-300"
          @click="resignFromSlot"
        >
          Wypisz się
        </button>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'SlotCoEmptySlotComponent',
  methods: {
    resignFromSlot() {
      this.$inertia.delete(route("slot.destroy", this.shiftSlot))
    }
  },
  props: {
    schedule_at: {},
    pointShift: {},
    shiftSlot: {},
  },
}
</script>
<style scoped>

.point-informations p,
.instructions p {
  text-align: justify;
}
</style>

<template>
  <div class="bg-white px-4 flex items-center justify-center mb-2 py-2 min-height-60">
    <div>
      <div class="flex relative w-9 h-9 bg-custom-green justify-center items-center m-1 mr-2 text-xl rounded-full text-white">
        {{ number }}
      </div>
    </div>
    <div class="center">
        <button
          v-if="!isUserAssigned"
          class="primary-blue text-white px-4 py-2 rounded-md text-1xl font-medium hover:bg-blue-500 transition duration-300"
          @click="assignToSlot"
        >
          Zapisz się
        </button>
    </div>
  </div>
</template>
<script>
export default {
  name: 'EmptySlotComponent.vue',
  methods: {
    assignToSlot() {
      this.$inertia.post(route("slot.store"), {
        schedule_at: this.schedule_at,
        pointShift: this.pointShift,
        is_reserve: false,
      })
    }
  },
  props: {
    schedule_at: {},
    pointShift: {},
    isUserAssigned: {},
    number:{
      type: Number,
      required: true,
      default: 1
    }
  },
};
</script>
<style scoped>

.point-informations p,
.instructions p {
  text-align: justify;
}
.center {
  margin: 0 auto;
}
</style>
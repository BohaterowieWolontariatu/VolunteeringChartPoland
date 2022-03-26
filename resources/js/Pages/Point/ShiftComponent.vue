<template>
  <div
    class="w-full"
  >
    <div class="py-2 primary-blue text-white">
      <p class="font-bold text-xl px-4">
        Potrzeba osób: {{ pointShift.capacity }} w godzinach {{ pointShift.start_time }}-{{ pointShift.end_time }}
      </p>
    </div>
    <div class="py-2 primary-yellow">
      <p class="font-bold px-4">
        {{ pointShift.name }}
      </p>
    </div>
    <div>
      <SlotComponent
        v-for="(slot,kkey) in pointShift.slots"
        :shiftSlot="slot"
        :key="slot.id"
        class=""
        style="min-height:50px"
      />
      <ReserveListSignComponent/>
    </div>
  </div>
</template>
<script>
import ReserveListSignComponent from "@/Pages/Point/ReserveListSignComponent.vue"
import SlotComponent from "@/Pages/Point/SlotComponent.vue"

export default {
  name: 'ShiftComponent',
  components: {ReserveListSignComponent, SlotComponent},
  props: {
    pointShift: {}
  }
}
</script>
<style scoped>

.point-informations p,
.instructions p {
  text-align: justify;
}
</style>
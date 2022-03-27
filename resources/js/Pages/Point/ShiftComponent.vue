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
        v-for="(slot) in pointShift.slots"
        :shiftSlot="slot"
        :key="slot.id"
        :pointShift="pointShift"
        :schedule_at="schedule_at"
        class=""
        style="min-height:50px"
      />
      <EmptySlotComponent
        v-for="i in availableCapacity"
        :pointShift="pointShift"
        :schedule_at="schedule_at"
        :key="i"
      ></EmptySlotComponent>


      <ReserveListSignComponent
        :pointShift="pointShift"
        :schedule_at="schedule_at"
      />
    </div>
  </div>
</template>
<script>
import ReserveListSignComponent from '@/Pages/Point/ReserveListSignComponent.vue';
import SlotComponent from '@/Pages/Point/SlotComponent.vue';
import EmptySlotComponent from '@/Pages/Point/EmptySlotComponent.vue';

export default {
  name: 'ShiftComponent',
  components: { EmptySlotComponent, ReserveListSignComponent, SlotComponent },

  computed: {

    availableCapacity () {
      return Math.max(0, this.pointShift.capacity - this.pointShift.slots.length);
    },
  },

  props: {
    pointShift: {},
    schedule_at: {},
  },
};
</script>
<style scoped>

.point-informations p,
.instructions p {
  text-align: justify;
}
</style>

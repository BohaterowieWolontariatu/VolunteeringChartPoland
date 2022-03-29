<template>
  <div
    class="w-full"
  >
    <div class="py-2 primary-blue text-white">
      <p class="font-bold text-xl px-4">
        {{ pointShift.name }} w godzinach {{ pointShift.start_time }}-{{ pointShift.end_time }}
      </p>
    </div>
    <div class="py-2 primary-yellow">
      <p class="font-bold px-4">
        Potrzeba osób: {{ availableCapacity }}
      </p>
    </div>
    <div>
      <SlotComponent
        v-for="(slot, i) in pointShift.slots"
        :shiftSlot="slot"
        :key="slot.id"
        :pointShift="pointShift"
        :schedule_at="schedule_at"
        :number="i + 1"
        class=""
        style="min-height:50px"
      />
      <EmptySlotComponent
        v-for="i in availableCapacity"
        :pointShift="pointShift"
        :schedule_at="schedule_at"
        :number="i + pointShift.slots.length"
        :isUserAssigned="isUserAssigned"
        :key="i"
      ></EmptySlotComponent>

      <ReserveListSignComponent
        v-if="!isUserAssigned"
        :pointShift="pointShift"
        :isUserAssigned="isUserAssigned"
        :schedule_at="schedule_at"
      />
      <div
        v-else
        class="min-height-60 p-4"
      >

      </div>
    </div>
  </div>
</template>
<script>
import ReserveListSignComponent from '@/Pages/Point/ReserveListSignComponent.vue';
import SlotComponent from '@/Pages/Point/SlotComponent.vue';
import EmptySlotComponent from '@/Pages/Point/EmptySlotComponent.vue';
import JetSectionBorder from '@/Jetstream/SectionBorder'

export default {
  name: 'ShiftComponent',
  components: { EmptySlotComponent, ReserveListSignComponent, SlotComponent, JetSectionBorder },

  computed: {
    isUserAssigned() {
      return !!this.pointShift.slots.find((el) => {
        return el.user.id === this.$page.props.user.id;
      })
    },
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

<template>
  <div
    class="text-center sm:w-full md:w-1/2"
  >
    <div :class="colorClassByDay" class="py-2 text-white">
      <p class="text-3xl">
        {{ dayName }}
      </p>
    </div>

    <div>

      <ShiftComponent
        v-for="shift in schedule.shifts"
        :pointShift="shift"
        :key="shift.id"
      />
    </div>
  </div>
</template>
<script>
import ShiftComponent from '@/Pages/Point/ShiftComponent.vue';

export default {
  name: 'PointDateComponent',
  components: { ShiftComponent },

  computed: {

    dayName () {
      let date = new Date(this.schedule.sheduled_at);
      switch (date.getDay() + 1) {
        case 1:
          return 'Poniedziałek';
        case 2:
          return 'Wtorek';
        case 3:
          return 'Środa';
        case 4:
          return 'Czwartek';
        case 5:
          return 'Piątek';
        case 6:
          return 'Sobota';
        case 7:
          return 'Niedziela';
      }

    },


    colorClassByDay () {
      if (!this.pointDate) {
        return 'default';
      }

      let date = new Date(this.schedule.sheduled_at);
      let day = date.getDay() + 1;
      return `color${day}`;
    },
  },

  props: {
    pointDate: {},
    schedule: {},
  },
};
</script>
<style scoped>
.default {
  background-color: grey;
}

.color1 {
  background-color: #4a148c;
}

.color2 {
  background-color: #1a237e;
}

.color3 {
  background-color: #01579b;
}

.color4 {
  background-color: #004d40;
}

.color5 {
  background-color: #33691e;
}

.color6 {
  background-color: #f57f17;
}

.color7 {
  background-color: #e65100;
}

.point-informations p,
.instructions p {
  text-align: justify;
}
</style>
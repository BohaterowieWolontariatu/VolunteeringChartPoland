<template>
  <div
    class="text-center sm:w-full md:w-1/2"
  >
    <div :class="getColorClassByDay" class="py-2 text-white">
      <p class="text-3xl">
        Poniedziałek
      </p>
    </div>

    <div>
      <ShiftComponent
        v-for="(shift, jkey) in pointDate.shifts"
        :pointShift="shift"
        :key="shift.id"
      />
    </div>
  </div>
</template>
<script>
import ShiftComponent from "@/Pages/Point/ShiftComponent.vue"

export default {
  name: 'PointDateComponent',
  components: {ShiftComponent},
  computed: {
    getColorClassByDay() {
      if(!this.pointDate) {
        return 'default'
      }

      let date = '2022-02-02'
      date = new Date(date)
      let day = date.getDay()+1
      return `color${day}`
    }
  },
  props: {
    pointDate: {}
  }
}
</script>
<style scoped>
.default{
  background-color:grey;
}
.color1 {
  background-color:#4a148c;
}
.color2 {
  background-color:#1a237e;
}
.color3 {
  background-color:#01579b;
}
.color4 {
  background-color:#004d40;
}
.color5 {
  background-color:#33691e;
}
.color6 {
  background-color:#f57f17;
}
.color7 {
  background-color:#e65100;
}
.point-informations p,
.instructions p {
  text-align: justify;
}
</style>
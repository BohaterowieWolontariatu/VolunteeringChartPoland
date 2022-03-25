
<template>
    <app-layout>
      <div class="container mx-auto">
        <Points />

        <Schedule />
      </div>

    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Points from './Points.vue'
import Schedule from './Schedule.vue'

export default {
  components: {
    AppLayout,
    Points,
    Schedule
  },
  data: () => ({

  }),
  watch: {},
}
</script>
<style>

</style>

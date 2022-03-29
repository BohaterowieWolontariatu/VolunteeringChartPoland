<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
        Placówki
      </h2>
    </template>

    <div class="container mx-auto">
      <breadcrumbs/>
      <div class="grid sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-3">
        <point-card-component
            v-for="point in $page.props.points.data"
            :key="point.id"

            :point="point"
        />

      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout';
import PointCardComponent from '@/Pages/Point/components/PointCardCompoment.vue';
import Breadcrumbs from "@/Pages/Breadcrumbs.vue";

export default {
  props: ['sessions'],

  components: {
    Breadcrumbs,
    PointCardComponent,
    AppLayout,
  },
}
</script>

<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                Placówki
            </h2>
        </template>

      <div class="container mx-auto">
        <breadcrumbs />
      <div class="flex flex-col md:flex-row space-x-2">

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

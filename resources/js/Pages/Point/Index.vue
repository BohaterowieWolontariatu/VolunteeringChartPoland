<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Lokalizacje
            </h2>
        </template>


      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">

        <point-card-component
          v-for="point in $page.props.points.data"
          :key="point.id"

          :point="point"
        />
      </div>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
              <pre>{{ $page.props}}</pre>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout';
import PointCardComponent from '@/Pages/Point/components/PointCardCompoment.vue';

export default {
        props: ['sessions'],

        components: {
          PointCardComponent,
            AppLayout,
        },
    }
</script>

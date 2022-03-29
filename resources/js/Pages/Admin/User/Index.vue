<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
        Użytkownicy
      </h2>
    </template>

    <div class="container mx-auto">
      <breadcrumbs/>


      <pre class="bg-white">{{ $page.props }}</pre>

    </div>
  </app-layout>
</template>

<script>
import PointCardComponent from '@/Pages/Point/components/PointCardCompoment.vue';
import Breadcrumbs from '@/Pages/Breadcrumbs.vue';
import AppAdminLayout from '@/Layouts/AppAdminLayout.vue';
import AppLayout from '@/Layouts/AppLayout.vue';

export default {
  components: {
    AppLayout,
    AppAdminLayout,
    Breadcrumbs,
    PointCardComponent,
  },
}
</script>

<template>
  <app-admin-layout>
    <template #header>
      <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
        Użytkownicy
      </h2>
    </template>

    <div class="container mx-auto">
      <breadcrumbs/>


      <pre class="bg-white">{{ $page.props }}</pre>

    </div>
  </app-admin-layout>
</template>

<script>
import PointCardComponent from '@/Pages/Point/components/PointCardCompoment.vue';
import Breadcrumbs from '@/Pages/Breadcrumbs.vue';
import AppAdminLayout from '@/Admin/Layouts/AppAdminLayout.vue';

export default {
  props: ['sessions'],

  components: {
    AppAdminLayout,
    Breadcrumbs,
    PointCardComponent,
  },
}
</script>

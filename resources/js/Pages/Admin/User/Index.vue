<template>
  <app-admin-layout>
    <div class="container mx-auto">
      <breadcrumbs/>


      <pre class="bg-white">{{ $page.props }}</pre>
      <pre class="bg-white">{{ users }}</pre>

    </div>
  </app-admin-layout>
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

  props: {
    users: {
      type: Object
    }
  }

}
</script>

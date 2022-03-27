<template>
  <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0 background-gdansk">
    <div>
      <un-auth-decline-button-component/>
    </div>
  </div>
</template>
<script>
import UnAuthDeclineButtonComponent from '@/Pages/PointSlot/UnauthDeclineButtonComponent.vue';

export default {
  name: 'decline',

  components: { UnAuthDeclineButtonComponent },
  props: ['sessions'],
};
</script>
<style scoped>
.bg-gray-100 {
  background-color: #f7fafc;
  background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
}

@media (prefers-color-scheme: dark) {

  .dark\:bg-gray-900 {
    background-color: #1a202c;
    background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
  }

}
</style>

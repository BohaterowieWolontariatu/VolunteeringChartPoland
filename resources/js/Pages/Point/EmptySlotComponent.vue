<template>
  <div class="bg-white px-4 flex items-center mb-2 py-2">
    <div class="w-full">

      <button
        class="w-full primary-blue text-white px-4 py-2 rounded-md text-1xl font-medium hover:bg-blue-500 transition duration-300"
      >
        Zapisz się
      </button>
    </div>
  </div>
</template>
<script>
export default {
  name: 'EmptySlotComponent.vue',

  props: {
    shiftSlot: {},
  },
};
</script>
<style scoped>

.point-informations p,
.instructions p {
  text-align: justify;
}
</style>
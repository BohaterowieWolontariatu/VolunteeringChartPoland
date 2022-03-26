<template>
  <div class="bg-white px-4 flex items-center mb-2 py-2">
    <div v-if="shiftSlot.is_reserved" class="flex w-full items-center justify-between">
      <div class="flex items-center">
        <div
          class="flex relative w-9 h-9 bg-green-500 justify-center items-center m-1 mr-2 text-xl rounded-full text-white">
          {{ k % 2 ? 'R' : 'D' }}
        </div>
        <div class="ml-3" style="font-size:22px">{{ k % 2 ? 'Robert' : 'Dawid' }}</div>
      </div>
      <div>
        PL / EN
      </div>
    </div>
    <div v-else class="w-full">
      <button
        class="w-full primary-blue text-white px-4 py-2 rounded-md text-1xl font-medium hover:bg-blue-500 transition duration-300">
        Zapisz się
      </button>
    </div>
  </div>
</template>
<script>
export default {
  name: 'SlotComponent',
  props: {
    shiftSlot: {}
  }
}
</script>
<style scoped>

.point-informations p,
.instructions p {
  text-align: justify;
}
</style>
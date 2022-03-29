<template>
<span
  :class="{
    'bg-green-700': value,
    'bg-red-700': !value,
  }"
  class="px-4 py-2 rounded-full text-white font-semibold text-sm flex align-center w-max">{{ value ? trueText : falseText }}</span>
</template>
<script>
export default {
  name: 'BoolChipComponent',

  props: {
    value: Boolean,

    falseText: {
      default: 'Nie',
    },
    trueText: {
      default: 'Tak',
    },
  },
};
</script>
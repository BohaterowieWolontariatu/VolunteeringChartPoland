<template>
  <div>
    <label
      v-if="label"
      :for="name"
      class="form-label inline-block mb-2 text-gray-700"
    >{{ label }}</label>
    <input
      :id="name"
      :placeholder="placeholder"

      class="form-control
        block
        w-full
        px-3
        py-1.5
        text-base
        font-normal
        text-gray-700
        bg-white bg-clip-padding
        border border-solid border-gray-300
        rounded
        transition
        ease-in-out
        m-0
        focus:text-gray-700
        focus:bg-white
        focus:border-blue-600
        focus:outline-none"
      v-bind="$attrs"
      v-on="inputListeners"
    >
    <div
      v-if="errors[name]"
      class="text-sm text-red-500 mt-1">{{ errors[name] }}
    </div>
  </div>
</template>
<script>
export default {
  inheritAttrs: false,
  name: 'SimpleInput',
  computed: {
    inputListeners () {
      return {
        ...this.$listeners,
        ...{
          input:  (event) => {
            this.$emit('input', event.target.value);
          },
        },
      };
    },
  },

  props: {
    label: {
      type: String,
      default: '',
    },
    name: {
      type: String,
      required: true,
    },
    placeholder: {
      type: String,
      default: '',
    },
    errors: {
      type: Object,

    },
  },
};
</script>
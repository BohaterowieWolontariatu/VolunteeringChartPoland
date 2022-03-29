<template>
  <li
    v-show="link.url !== null"
    :class="{
            active: link.active
          }"
    class="page-item"
  ><a
    :class="linkCssClass"
    :href="link.url"
  >{{ link.label }}</a>
  </li>
</template>

<script>
export default {
  name: 'PaginationLinkComponent',
  computed: {
    linkCssClass () {
      if (this.link.active) {
        return 'page-link relative block py-1.5 px-3 rounded border-0 bg-blue-600 outline-none transition-all duration-300 rounded text-white hover:text-white hover:bg-blue-600 shadow-md focus:shadow-md';
      }
      return 'page-link relative block py-1.5 px-3 rounded border-0 bg-transparent outline-none transition-all duration-300 rounded text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:shadow-none';
    },
  },

  props: {
    link: Object,
  },
};

</script>
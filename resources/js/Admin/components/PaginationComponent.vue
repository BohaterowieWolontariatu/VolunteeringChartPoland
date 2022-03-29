<template>
  <div v-if="3 < links.length" class="flex justify-center">
    <nav aria-label="Page navigation example">
      <ul class="flex list-style-none">
        <pagination-link-component
          v-for="(link, key) in links"
          v-show="link.url !== null"
          :key="key"
          :link="link"
        />
      </ul>
    </nav>
  </div>
</template>

<script>
import PaginationLinkComponent from '@/Admin/components/PaginationLinkComponent.vue';

export default {
  name: 'PaginationComponent',
  components: { PaginationLinkComponent },
  props: {
    links: Array,
  },
};

</script>
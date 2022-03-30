<template>
  <app-admin-layout>
    <div class="container mx-auto">

      <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <table class="min-w-full">
                <thead class="bg-white border-b">
                <tr>
                  <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                    ID
                  </th>
                  <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                    Nazwisko
                  </th>
                  <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                    Imię
                  </th>
                  <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                    Email
                  </th>
                  <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                    Aktywny?

                  </th>
                  <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                    Umowa?
                  </th>
                  <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">

                  </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="user in users.data"
                  class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100"
                >
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ user.id }}</td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ user.surname }}
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ user.name }}
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <a
                      :href="`mailto:${user.email}`"
                      class="underline text-primary decoration-transparent hover:decoration-inherit transition duration-300 ease-in-out"
                    >
                       {{ user.email }}
                    </a>
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <bool-chip-component
                      :value="!!user.is_active"
                      false-text="Nie aktywny"
                      true-text="Aktywny"
                    />


                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <bool-chip-component
                      :value="!!user.has_agreement_signed"
                      false-text="Nie podpisana"
                      true-text="Podpisana"
                    />
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <warning-button>
                      <InertiaLink :href="route('admin.users.edit', user)">
                        Edytuj
                      </InertiaLink>
                    </warning-button>

                  </td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <pagination-component
        :links="users.links"
      ></pagination-component>

    </div>
  </app-admin-layout>
</template>

<script>
import Breadcrumbs from '@/Pages/Breadcrumbs.vue';
import AppAdminLayout from '@/Layouts/AppAdminLayout.vue';
import PaginationComponent from '@/Admin/components/PaginationComponent.vue';
import WarningButton from '@/Components/WarningButton.vue';
import BoolChipComponent from '@/Admin/components/BoolChipComponent.vue';

export default {
  components: {
    BoolChipComponent,
    WarningButton,
    PaginationComponent,
    AppAdminLayout,
    Breadcrumbs,

  },

  props: {
    users: {
      type: Object,
    },
  },

};
</script>

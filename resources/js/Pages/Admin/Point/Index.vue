<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
        Użytkownicy
      </h2>
      <InertiaLink
        :href="route('admin.points.create')"
        class="w-full"
      >
        <primary-button>
          Dodaj dział
        </primary-button>
      </InertiaLink>
    </template>

    <div class="container mx-auto">
      <breadcrumbs/>


    <div class="flex flex-col">
      <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
          <div class="overflow-hidden">
            <table class="min-w-full">
              <thead class="bg-white border-b">
              <tr>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  #
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Nazwa
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Adres
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Akcje
                </th>
              </tr>
              </thead>
              <tbody>
              <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100" v-for="point in points">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1</td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  {{point.name }}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  {{ point.address }}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  <warning-button>
                    <InertiaLink method="get" :href="route('admin.points.edit', point)">
                      Edytuj
                    </InertiaLink>
                  </warning-button>
<!--                  <danger-button>-->
<!--                    <InertiaLink method="delete" :href="route('admin.points.destroy', point)">-->
<!--                      Usuń-->
<!--                    </InertiaLink>-->
<!--                  </danger-button>-->
                </td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    </div>
  </app-layout>
</template>

<script>
import PointCardComponent from '@/Pages/Point/components/PointCardCompoment.vue';
import Breadcrumbs from '@/Pages/Breadcrumbs.vue';
import AppAdminLayout from '@/Layouts/AppAdminLayout.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import WarningButton from "../../../Components/WarningButton";
import DangerButton from "../../../Jetstream/DangerButton";
import PrimaryButton from "../../../Components/PrimaryButton";

export default {
  components: {
    PrimaryButton,
    DangerButton,
    WarningButton,
    AppLayout,
    AppAdminLayout,
    Breadcrumbs,
    PointCardComponent,
  },
  props: {
    points: {},
  }
}
</script>

<template>
  <div class="md:grid md:grid-cols-3 md:gap-6 mt-10 sm:mt-0">
    <div class="mt-5 md:mt-0 md:col-span-3">
      <div class="bg-white p-3 shadow-sm rounded-sm">
        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
          <span class="text-green-500">
              <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                   stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
              </svg>
          </span>
          <span>Informacje użytkownika</span>
        </div>
        <div class="text-gray-700">
          <div class="grid md:grid-cols-2 text-sm">
            <div class="grid grid-cols-2">
              <div class="px-4 py-2 font-semibold">Imie</div>
              <div class="px-4 py-2"> {{$page.props.user.name}}</div>
            </div>
            <div class="grid grid-cols-2">
              <div class="px-4 py-2 font-semibold">Nazwisko</div>
              <div class="px-4 py-2"> {{$page.props.user.surname}}</div>
            </div>
            <div class="grid grid-cols-2">
              <div class="px-4 py-2 font-semibold">Email</div>
              <div class="px-4 py-2">{{$page.props.user.email}}</div>
            </div>
            <div class="grid grid-cols-2">
              <div class="px-4 py-2 font-semibold">Numer telefonu</div>
              <div class="px-4 py-2">{{$page.props.user.email}}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import JetButton from '@/Jetstream/Button'
import JetFormSection from '@/Jetstream/FormSection'
import JetInput from '@/Jetstream/Input'
import JetInputError from '@/Jetstream/InputError'
import JetLabel from '@/Jetstream/Label'
import JetActionMessage from '@/Jetstream/ActionMessage'
import JetSecondaryButton from '@/Jetstream/SecondaryButton'

export default {
  components: {
    JetActionMessage,
    JetButton,
    JetFormSection,
    JetInput,
    JetInputError,
    JetLabel,
    JetSecondaryButton,
  },

  props: ['user'],

  data() {
    return {}
  },
}
</script>

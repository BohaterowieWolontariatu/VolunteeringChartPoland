<template>
  <app-admin-layout>
    <div class="container mx-auto">

      <div class=" p-6 rounded-lg shadow-lg bg-white max-w">
        <form @submit.prevent="onSubmit">
          <div class="form-group mb-6">
            <simple-input
              v-model="form.name"

              :errors="errors"
              label="Imię"

              name="name"
              placeholder="Podaj imię"
            />
          </div>


          <div class="form-group mb-6">
            <simple-input
              v-model="form.surname"
              :errors="errors"
              label="Nazwisko"
              name="surname"
              placeholder="Podaj nazwisko"
            />
          </div>
          <div class="form-group mb-6">
            <simple-input
              v-model="form.email"
              :errors="errors"
              label="E-mail"
              name="email"
              placeholder="Podaj adres email"

              type="email"
            />
          </div>
          <div class="form-group mb-6">
            <simple-input
              v-model="form.pesel"
              :errors="errors"
              label="PESEL"
              name="pesel"

              placeholder="Podaj numer PESEL"
            />
          </div>
          <div class="form-group mb-6">
            <simple-input
              v-model="form.phone"
              :errors="errors"
              label="Telefon komórkowy"
              name="phone"
              placeholder="Podaj numer telefonu komórkowego"
              type="tel"
            />
          </div>
          <div class="form-group mb-6">
          </div>

          <div class="form-group mb-6">

            <div class="flex justify-between items-center mb-6">
              <div class="form-group form-check">
                <input id="is_active"
                       :checked="!!form.is_active"
                       class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                       type="checkbox"
                       @change="form.is_active = $event.target.checked"
                >
                <label class="form-check-label inline-block text-gray-800" for="is_active">Czy użytkownik jest aktywny?</label>
                <div
                  v-if="errors['is_active']"
                  class="text-sm text-re-500 mt-1">{{ errors['is_active'] }}
                </div>
              </div>
            </div>
          </div>
          <div class="form-group mb-6">

            <div class="flex justify-between items-center mb-6">
              <div class="form-group form-check">
                <input id="has_agreement_signed"
                       :checked="!!form.has_agreement_signed"
                       class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                       type="checkbox"
                       @change="form.has_agreement_signed = $event.target.checked"
                >
                <label class="form-check-label inline-block text-gray-800" for="has_agreement_signed">Czy podpisał umowę?</label>
                <div
                  v-if="errors['has_agreement_signed']"
                  class="text-sm text-re-500 mt-1">{{ errors['has_agreement_signed'] }}
                </div>
              </div>
            </div>
          </div>
          <button
            class="
      w-full
      px-6
      py-2.5
      bg-blue-600
      text-white
      font-medium
      text-xs
      leading-tight
      uppercase
      rounded
      shadow-md
      hover:bg-blue-700 hover:shadow-lg
      focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
      active:bg-blue-800 active:shadow-lg
      transition
      duration-150
      ease-in-out"
            type="submit">Zapisz
          </button>
        </form>
      </div>


    </div>
  </app-admin-layout>
</template>

<script>
import AppAdminLayout from '@/Layouts/AppAdminLayout.vue';
import SimpleInput from '@/Pages/Admin/User/SimpleInput.vue';

export default {
  components: {
    SimpleInput,
    AppAdminLayout,

  },

  data () {
    return {
      form: this.$inertia.form({
        name: this.user.name,
        surname: this.user.surname,
        email: this.user.email,
        pesel: this.user.pesel,
        phone: this.user.phone,
        is_active: this.user.is_active,
        has_agreement_signed: this.user.has_agreement_signed,
      }),

    };
  },

  methods: {
    onSubmit () {
      this.form.put(this.route('admin.users.update', this.user));
    },
  },

  props: {
    user: {
      type: Object,
    },
    errors: Object,
  },

};
</script>

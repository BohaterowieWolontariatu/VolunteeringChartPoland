<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Porozumienie
      </h2>
    </template>
    <div class="py-12">
      <div class="mx-auto max-w-2xl px-4">
        <div class="overflow-hidden bg-white shadow-md sm:rounded-lg border">
          <div class="p-6 max-w-xl mx-auto">
            <form @submit.prevent="submit">
              <div>
                <p class="font-bold text-2xl text-center">
                  Porozumienie wolontariackie <br>
                  GDAŃSK POMAGA UKRAINIE - wolontariusz pełnoletni
                </p>
                <br>
                <p>
                  Akcja #GdańskPomagaUkrainie służy pomocy osobą, które uciekają przed wojną na Ukrainie.
                  Wspieramy instytucje publiczne oraz organizacje pozarządowych w różnych obszarach.
                </p>
                <p>
                  Niniejszy formularz stanowi elektroniczne porozumienie wolontariackie,
                  które jest zawierane pomiędzy wolontariuszem, a bez Regionalnym Centrum Wolontariatu w Gdańsku.
                </p>
                <p>
                  Porozumienie jest niezbędne do rozpoczęcia działań.
                </p>
                <p>
                  Kontakt:<br>
                  tel: 881320626<br>
                  e-mail: ukraina@wolontariatgdansk.pl<br>
                </p>
              </div>
              <div>
                <jet-label for="surname" value="Nazwisko"/>
                <jet-input id="surname" type="surname" class="mt-1 block w-full" v-model="form.surname" required
                           autocomplete="current-surname"/>
              </div>

              <div class="mt-8">
                <jet-label for="pesel" value="PESEL"/>
                <jet-input id="pesel" type="pesel" class="mt-1 block w-full" v-model="form.pesel" required autocomplete="current-pesel"/>
              </div>
              <!--              <input-error :message="this.$page.props.errors.pesel"></input-error>-->

              <!-- submit -->
              <div class="flex items-center justify-center mt-12">
                <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                  Login
                </jet-button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
import JetButton from '@/Jetstream/Button'
import JetInput from '@/Jetstream/Input'
import JetCheckbox from '@/Jetstream/Checkbox'
import JetLabel from '@/Jetstream/Label'
import JetValidationErrors from '@/Jetstream/ValidationErrors'

export default {
  components: {
    JetAuthenticationCard,
    JetAuthenticationCardLogo,
    JetButton,
    JetInput,
    JetCheckbox,
    JetLabel,
    JetValidationErrors,
    AppLayout
  },

  props: {
    canResetPassword: Boolean,
    status: String
  },

  data() {
    return {
      form: this.$inertia.form({
        email: '',
        password: '',
        remember: false
      })
    }
  },

  methods: {
    submit() {
      this.form
          .transform(data => ({
            ...data,
            remember: this.form.remember ? 'on' : ''
          }))
          .post(this.route('login'), {
            onFinish: () => this.form.reset('password'),
          })
    }
  }
}
</script>

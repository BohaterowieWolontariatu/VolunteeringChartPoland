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
                  {{ $trans('translations.agreement.title') }} <br>
                  {{ $trans('translations.agreement.subtitle') }}
                </p>
                <br>
                <p>
                  {{ $trans('translations.agreement.about_action') }}
                </p>
                <br>
                <p>
                  {{ $trans('translations.agreement.we_search') }}
                </p>
                <br>
                <p>
                  {{ $trans('translations.agreement.about_form') }}
                </p>
                <br>
                <p>
                  {{ $trans('translations.agreement.agreement_is_needed') }}
                </p>
                <br>
                <p>
                  {{ $trans('translations.agreement.contact') }}:<br>
                  {{ $trans('translations.agreement.phone') }}: 881320626<br>
                  e-mail: ukraina@wolontariatgdansk.pl<br>
                </p>
              </div>
              <div>
                <div class="h-0.5 bg-gray-200 w-full my-5"> </div>
                <p class="font-bold text-2xl text-center">
                  Porozumienie
                </p>
                <div>
                  <jet-label for="email" :value="$trans('translations.agreement.your_adress_email')"/>
                  <jet-input class="mt-1 block w-full" :value="user.email" disabled />
                  <p></p>
                </div>
              </div>
              <div class="mt-8">
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

  computed: {
    user() {
      return this.$page.props.user
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
  },

  mounted() {
    console.log(this.$page);
  }
}
</script>

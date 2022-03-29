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
              <div class="h-0.5 bg-gray-200 w-full my-5"></div>
              <p class="font-bold text-xl text-center">
                Porozumienie
              </p>
              <div>
                <jet-label for="email" :value="$trans('translations.agreement.your_adress_email')"/>
                <jet-input class="mt-1 block w-full" :value="user.email" disabled/>
              </div>
              <div class="mt-8">
                <p class="font-bold text-lg">
                  {{$trans('translations.agreement.concluded_on')}}
                </p>
                <jet-input id="concluded_on" type="date" class="mt-1 block w-full" v-model="form.sign_date"
                           autocomplete="current-concluded_on"/>
                <input-error :message="this.$page.props.errors.sign_date"></input-error>
              </div>
              <br>
              <p class="font-bold text-lg">
                {{$trans('translations.agreement.concluded_with_voluntary')}}
              </p>
              <br>
              <p class="font-bold text-lg">
                {{$trans('translations.agreement.concluded_between')}}
              </p>
              <div class="mt-8">
                <jet-label :value="$trans('translations.agreement.name_and_surname')"/>
                <jet-input class="mt-1 block w-full" :value="user.name + ' ' + user.surname" disabled/>
              </div>
              <div class="mt-8">
                <jet-label value="PESEL"/>
                <jet-input class="mt-1 block w-full" :value="user.pesel" disabled/>
              </div>
              <div class="mt-8">
                <jet-label :value="$trans('translations.agreement.are_you_full_age')"/>
                <input id="is_adult_yes" type="radio" value="1" v-model="form.is_adult">
                <label for="is_adult_yes">TAK</label>
                <br>
                <input id="is_adult_no" type="radio" value="0" v-model="form.is_adult">
                <label for="is_adult_no">NIE</label>
                <input-error :message="this.$page.props.errors.is_adult"></input-error>
              </div>
              <div class="mt-8">
                <jet-label :value="$trans('translations.agreement.address')"/>
                <textarea class="w-full" v-model="form.address"></textarea>
              </div>
              <input-error :message="this.$page.props.errors.address"></input-error>

              <div class="agreement">
                <p class="font-bold text-lg pt-2">
                  {{$trans('translations.agreement.concluded_with_participant')}}
                </p>
                <p class="font-bold text-lg pt-2">
                  {{$trans('translations.agreement.according_to')}}:
                </p>
                <p class="font-bold text-lg pt-2">
                  {{$trans('translations.agreement.art42')}}
                </p>
                <ol class="font-bold text-lg pt-2 px-4 list-decimal">
                  <li> {{$trans('translations.agreement.info_list_1')}}</li>
                  <li> {{$trans('translations.agreement.info_list_2')}}</li>
                  <li> {{$trans('translations.agreement.info_list_3')}}</li>
                  <li> {{$trans('translations.agreement.info_list_4')}}</li>
                  <li> {{$trans('translations.agreement.info_list_5')}}</li>
                  <li> {{$trans('translations.agreement.info_list_6')}}</li>
                  <li> {{$trans('translations.agreement.info_list_7')}}</li>
                  <li> {{$trans('translations.agreement.info_list_8')}}</li>
                  <li> {{$trans('translations.agreement.info_list_9')}}</li>
                  <li> {{$trans('translations.agreement.info_list_10')}}</li>
                  <li> {{$trans('translations.agreement.info_list_11')}}</li>
                </ol>
              </div>
              <div class="mt-8">
                <jet-label :value="$trans('translations.agreement.covid_principles')"/>
                <input id="agree_to_covid_recommendations" type="radio" value="1" v-model="form.agree_to_covid_recommendations">
                <label for="agree_to_covid_recommendations">TAK</label>
                <input-error :message="this.$page.props.errors.agree_to_covid_recommendations"></input-error>
              </div>
              <div class="mt-8">
                <jet-label :value="$trans('translations.agreement.true_informations')"/>
                <input id="data_is_valid" type="radio" value="1" v-model="form.data_is_valid">
                <label for="data_is_valid">TAK</label>
                <input-error :message="this.$page.props.errors.data_is_valid"></input-error>
              </div>
              <p class="font-bold text-lg pt-2">
                {{$trans('translations.agreement.informations_from_administrator')}}
              </p>
              <div class="mt-8">
                <jet-label :value="$trans('translations.agreement.agree_to_free_process_image')"/>
                <input id="agree_to_free_process_image_yes" type="radio" value="1" v-model="form.agree_to_free_process_image">
                <label for="agree_to_free_process_image_yes">TAK</label>
                <br>
                <input id="agree_to_free_process_image_no" type="radio" value="0" v-model="form.agree_to_free_process_image">
                <label for="agree_to_free_process_image_no">NIE</label>
                <input-error :message="this.$page.props.errors.agree_to_free_process_image"></input-error>
              </div>
              <div class="mt-8">
                <p class="text-lg">{{$trans('translations.agreement.facebook_key')}}</p>
                <img src="/img/wolna_ukraina.png" class="mr-4" alt="Wolna ukraina obraz">
              </div>
              <!-- submit -->
              <div class="flex items-center justify-center mt-12">
                <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }">
<!--                <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">-->
                  Submit
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
import InputError from '@/Jetstream/InputError'
import JetCheckbox from '@/Jetstream/Checkbox'
import JetLabel from '@/Jetstream/Label'
import JetValidationErrors from '@/Jetstream/ValidationErrors'


export default {
  components: {
    JetAuthenticationCard,
    JetAuthenticationCardLogo,
    JetButton,
    JetInput,
    InputError,
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
        remember: false,
        sign_date: (new Date()).toISOString().split('T')[0],
        address: '',
        is_adult: 0,
        agree_to_covid_recommendations: 0,
        data_is_valid: 0,
        agree_to_free_process_image: 0,
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
      this.form.post(this.route('agreement.store'))
    }
  },
}
</script>

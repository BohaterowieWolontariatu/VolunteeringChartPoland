<template>
  <div class="min-h-screen background-gdansk flex justify-center">
    <div class="fixed top-0 px-6 py-4 sm:block">
      <inertia-link :href="route('login')" class="text-sm text-white text-2xl mr-5">
        Logowanie
      </inertia-link>

      <inertia-link :href="route('register')" class="text-sm text-white text-2xl">
        Rejestracja
      </inertia-link>
    </div>
    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
        </template>

        <div class="mb-4 text-sm text-gray-600">
          Podaj swój adres e-mail w polu obok. Jeżeli konto istnieje zostanie na ten adres wysłana wiadomość z linkiem, dzięki któremu będziesz mógł ustalić nowe hasło.
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Wyślij
                </jet-button>
            </div>
        </form>
    </jet-authentication-card>
  </div>
</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'

    export default {
        components: {
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetLabel,
            JetValidationErrors
        },

        props: {
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: ''
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('password.email'))
            }
        }
    }
</script>

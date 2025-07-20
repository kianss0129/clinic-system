<script setup>
import { useForm } from '@inertiajs/vue3'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'
import { onMounted, ref } from 'vue'

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
  'g-recaptcha-response': '',
})

const recaptchaElement = ref(null); // Reference for the reCAPTCHA div element

const submit = () => {
  form.post(route('register.patient'), {
    onFinish: () => {
      form.reset('password', 'password_confirmation', 'g-recaptcha-response')
      grecaptcha.reset() // Reset the reCAPTCHA after form submission
    },
  })
}

onMounted(() => {
  // Ensure grecaptcha is loaded and the element is available
  if (typeof grecaptcha !== 'undefined' && recaptchaElement.value) {
    grecaptcha.ready(function () {
      grecaptcha.render(recaptchaElement.value, {
        sitekey: import.meta.env.VITE_RECAPTCHA_SITE_KEY, // Use your site key here
        callback: function(response) {
          form['g-recaptcha-response'] = response; // Set the response token to form
        }
      });
    });
  }
})
</script>

<template>
  <div class="max-w-md mx-auto mt-10 bg-white shadow-md p-6 rounded">
    <h1 class="text-2xl font-bold mb-4">Sign Up as Patient</h1>

    <form @submit.prevent="submit">
      <!-- Name -->
      <div class="mb-4">
        <InputLabel for="name" value="Full Name" />
        <TextInput id="name" v-model="form.name" required autofocus autocomplete="name" class="mt-1 block w-full" />
        <InputError :message="form.errors.name" class="mt-2" />
      </div>

      <!-- Email -->
      <div class="mb-4">
        <InputLabel for="email" value="Email" />
        <TextInput id="email" v-model="form.email" required autocomplete="email" class="mt-1 block w-full" />
        <InputError :message="form.errors.email" class="mt-2" />
      </div>

      <!-- Password -->
      <div class="mb-4">
        <InputLabel for="password" value="Password" />
        <TextInput id="password" type="password" v-model="form.password" required autocomplete="new-password" class="mt-1 block w-full" />
        <InputError :message="form.errors.password" class="mt-2" />
      </div>

      <!-- Confirm Password -->
      <div class="mb-4">
        <InputLabel for="password_confirmation" value="Confirm Password" />
        <TextInput id="password_confirmation" type="password" v-model="form.password_confirmation" required autocomplete="new-password" class="mt-1 block w-full" />
        <InputError :message="form.errors.password_confirmation" class="mt-2" />
      </div>

      <!-- ✅ reCAPTCHA -->
      <div ref="recaptchaElement" class="my-4"></div>
      <p v-if="form.errors['g-recaptcha-response']" class="text-xs text-red-600 mt-2">
        {{ form.errors['g-recaptcha-response'] }}
      </p>

      <!-- Submit Button -->
      <div class="flex justify-end">
        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
          Register
        </PrimaryButton>
      </div>
    </form>
  </div>
</template>

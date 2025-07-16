<script setup>
import { useForm } from '@inertiajs/vue3'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'

const form = useForm({
  name: '', email: '', password: '', password_confirmation: '',
  'g-recaptcha-response': ''
})

const submit = () => form.post(route('register.patient'))
</script>

<template>
  <div class="max-w-md mx-auto mt-10 bg-white shadow p-6 rounded">
    <InputLabel for="name" value="Full Name" />
    <TextInput id="name" v-model="form.name" required />
    <InputError :message="form.errors.name"/>

    <InputLabel for="email" value="Email" />
    <TextInput id="email" type="email" v-model="form.email" required />
    <InputError :message="form.errors.email"/>

    <InputLabel for="password" value="Password" />
    <TextInput id="password" type="password" v-model="form.password" required />
    <InputError :message="form.errors.password"/>

    <InputLabel for="password_confirmation" value="Confirm Password" />
    <TextInput id="password_confirmation" type="password" v-model="form.password_confirmation" required />
    <InputError :message="form.errors.password_confirmation"/>

    <PrimaryButton :disabled="form.processing">Register</PrimaryButton>
  </div>
</template>

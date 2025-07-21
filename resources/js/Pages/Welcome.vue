<script setup>
import { Head, Link } from '@inertiajs/vue3'

defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
  laravelVersion: String,
  phpVersion: String,
})
</script>

<template>
  <Head title="Clinic System" />

  <div
    class="min-h-screen bg-black text-white flex items-center justify-center"
    style="background: radial-gradient(circle at left, #ff0000, transparent 80%)"
  >
    <div class="text-center">
      <!-- Logo or title -->
      <img
        src="/images/logo.png.svg"
        alt="Clinic Logo"
        class="mx-auto mb-6 w-28 h-28 object-contain"
        v-if="true" 
      />
      <h1 class="text-4xl font-bold mb-6">Welcome to OnClique</h1>

      <!-- Buttons -->
      <div class="space-x-6">
        <Link
          v-if="canLogin"
          :href="route('login')"
          class="px-6 py-2 bg-white text-black font-semibold rounded hover:bg-gray-200 transition"
        >
          Log in
        </Link>

        <Link
          v-if="canRegister"
          :href="route('register.patient')"
          class="px-6 py-2 bg-transparent border border-white text-white font-semibold rounded hover:bg-white hover:text-black transition"
        >
          Register
        </Link>
      </div>
    </div>
  </div>
</template>

<style scoped>
/* You can place your global font in app.css */
</style>

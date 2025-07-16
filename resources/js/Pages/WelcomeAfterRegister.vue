<template>
  <div class="min-h-screen flex items-center justify-center">
    <div class="p-6 bg-white shadow rounded">
      <h1 class="text-2xl mb-4">Thanks for registering!</h1>
      <p>Please verify your email to continue.</p>
      <Link :href="route('dashboard')" class="mt-4 text-blue-600">Go to Dashboard</Link>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>

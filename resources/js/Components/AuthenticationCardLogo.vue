<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <Link :href="'/'">
    <img
      src="/images/logo.png.svg"
      alt="Clinic Logo"
      class="h-16 w-16 object-contain mx-auto"
    />
  </Link>
</template>

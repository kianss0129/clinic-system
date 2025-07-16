<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <AppLayout title="Super Admin Dashboard">
    <template #header>
      <Link as="button"
      method="post"
      :href="route('logout')"
      class="text-red-600 hover:underline ml-auto">
  Logout
</Link>
      <h2 class="font-semibold text-2xl text-gray-800">Super Admin Dashboard</h2>
    </template>

    <div class="p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <div class="bg-white shadow rounded-lg p-4 hover:shadow-md transition">
        <Link :href="route('appointments.index')" class="flex items-center gap-3">
          <i class="bi bi-calendar4-week text-2xl text-blue-700"></i>
          <span class="text-lg font-medium">Appointments Overview</span>
        </Link>
      </div>
      <div class="bg-white shadow rounded-lg p-4 hover:shadow-md transition">
        <Link :href="route('medical-records.index')" class="flex items-center gap-3">
          <i class="bi bi-journals text-2xl text-green-700"></i>
          <span class="text-lg font-medium">Medical Records</span>
        </Link>
      </div>
      <div class="bg-white shadow rounded-lg p-4 hover:shadow-md transition">
        <Link :href="route('doctor.prescriptions.index')" class="flex items-center gap-3">
          <i class="bi bi-file-medical text-2xl text-purple-700"></i>
          <span class="text-lg font-medium">Prescriptions</span>
        </Link>
      </div>
      <div class="bg-white shadow rounded-lg p-4 hover:shadow-md transition">
        <Link :href="route('billing.index')" class="flex items-center gap-3">
          <i class="bi bi-cash-stack text-2xl text-red-700"></i>
          <span class="text-lg font-medium">All Billing</span>
        </Link>
      </div>
    </div>
  </AppLayout>
</template>

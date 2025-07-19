<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <AppLayout title="Admin Dashboard">
    <template #header>
      <h2 class="font-semibold text-2xl text-gray-800">Admin Dashboard</h2>
    </template>

    <div class="p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <!-- Appointments -->
      <div class="bg-white shadow rounded-lg p-4 hover:shadow-md transition">
        <Link :href="route('appointments.index')" class="flex items-center gap-3">
          <i class="bi bi-calendar-event text-2xl text-blue-600"></i>
          <span class="text-lg font-medium">Manage Appointments</span>
        </Link>
      </div>

      <!-- Medical Records -->
      <div class="bg-white shadow rounded-lg p-4 hover:shadow-md transition">
        <Link :href="route('medical-records.index')" class="flex items-center gap-3">
          <i class="bi bi-journal-medical text-2xl text-green-600"></i>
          <span class="text-lg font-medium">Medical Records</span>
        </Link>
      </div>

      <!-- Billing -->
      <div class="bg-white shadow rounded-lg p-4 hover:shadow-md transition">
        <Link :href="route('billing.index')" class="flex items-center gap-3">
          <i class="bi bi-receipt text-2xl text-red-600"></i>
          <span class="text-lg font-medium">Billing</span>
        </Link>
      </div>

      <!-- 👤 Profile Link -->
      <div class="bg-white shadow rounded-lg p-4 hover:shadow-md transition">
        <Link href="/user/profile" class="flex items-center gap-3">
          <i class="bi bi-person-circle text-2xl text-purple-600"></i>
          <span class="text-lg font-medium">My Profile</span>
        </Link>
      </div>
    </div>
  </AppLayout>
</template>

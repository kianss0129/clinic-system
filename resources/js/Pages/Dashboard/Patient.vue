<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <AppLayout title="Patient Dashboard">
    <template #header>
      
      <h2 class="font-semibold text-2xl text-gray-800">Patient Dashboard</h2>
    </template>

    <div class="p-6 grid grid-cols-1 sm:grid-cols-2 gap-6">
      <!-- Book Appointment Card -->
      <div class="bg-white shadow rounded-lg p-4 hover:shadow-md transition">
        <Link :href="route('patient.appointments.create')" class="flex items-center gap-3">
          <i class="bi bi-calendar-plus text-2xl text-indigo-600"></i>
          <span class="text-lg font-medium">Book Appointment</span>
        </Link>
      </div>

      <!-- View Appointments Card -->
      <div class="bg-white shadow rounded-lg p-4 hover:shadow-md transition">
        <Link :href="route('patient.appointments.index')" class="flex items-center gap-3">
          <i class="bi bi-calendar-check text-2xl text-green-600"></i>
          <span class="text-lg font-medium">View Appointments</span>
        </Link>
      </div>
    </div>
  </AppLayout>
</template>

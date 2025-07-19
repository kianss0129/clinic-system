<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <AppLayout title="Doctor Dashboard">
    <template #header>
      <h2 class="font-semibold text-2xl text-gray-800">Doctor Dashboard</h2>
    </template>

    <div class="p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <!-- Appointments -->
      <div class="bg-white shadow rounded-lg p-4 hover:shadow-md transition">
        <Link :href="route('doctor.appointments.index')" class="flex items-center gap-3">
          <i class="bi bi-calendar-check text-2xl text-purple-600"></i>
          <span class="text-lg font-medium">My Appointments</span>
        </Link>
      </div>

      <!-- Update Records -->
      <div class="bg-white shadow rounded-lg p-4 hover:shadow-md transition">
        <Link :href="route('doctor.records.index')" class="flex items-center gap-3">
          <i class="bi bi-pencil-square text-2xl text-yellow-600"></i>
          <span class="text-lg font-medium">Update Records</span>
        </Link>
      </div>

      <!-- Prescriptions -->
      <div class="bg-white shadow rounded-lg p-4 hover:shadow-md transition flex flex-col gap-2">
        <Link :href="route('doctor.prescriptions.index')" class="flex items-center gap-3">
          <i class="bi bi-file-earmark-medical text-2xl text-cyan-600"></i>
          <span class="text-lg font-medium">Prescriptions</span>
        </Link>

        <Link :href="route('doctor.records.create')" class="text-blue-600 text-sm underline">
          ➕ Add Medical Record
        </Link>
      </div>

      <!-- My Profile -->
      <div class="bg-white shadow rounded-lg p-4 hover:shadow-md transition">
        <Link href="/user/profile" class="flex items-center gap-3">
          <i class="bi bi-person-circle text-2xl text-gray-700"></i>
          <span class="text-lg font-medium">My Profile</span>
        </Link>
      </div>
    </div>
  </AppLayout>
</template>

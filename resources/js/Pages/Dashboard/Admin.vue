<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, usePage } from '@inertiajs/vue3';

const user = usePage().props.auth.user;
</script>

<template>
  <AppLayout title="Admin Dashboard">
    <template #header>
      <h2 class="font-bold text-3xl text-gray-800">Welcome, {{ user.name }}!</h2>
      <p class="text-gray-500 text-sm">Administrator Control Panel</p>
    </template>

    <div class="flex flex-col md:flex-row p-6 gap-6">
      <!-- Sidebar -->
      <aside class="w-full md:w-64 bg-white border rounded-xl shadow-sm p-4 space-y-2">
        <nav class="flex flex-col gap-2">
          <div class="nav-link bg-gray-100 cursor-default text-indigo-600 font-semibold">
            <i class="bi bi-house-door-fill mr-2"></i> Dashboard
          </div>

          <Link :href="route('appointments.index')" class="nav-link">
            <i class="bi bi-calendar-event mr-2"></i> Appointments
          </Link>

          <Link :href="route('medical-records.index')" class="nav-link">
            <i class="bi bi-journal-medical mr-2"></i> Medical Records
          </Link>

          <Link :href="route('billing.index')" class="nav-link">
            <i class="bi bi-receipt mr-2"></i> Billing
          </Link>

          <Link href="/user/profile" class="nav-link">
            <i class="bi bi-person-circle mr-2"></i> My Profile
          </Link>

          <Link method="post" href="/logout" class="nav-link text-red-500 hover:text-red-600">
            <i class="bi bi-box-arrow-right mr-2"></i> Logout
          </Link>
        </nav>
      </aside>

      <!-- Dashboard Cards -->
      <section class="flex-1 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="dashboard-card border-l-4 border-blue-600">
          <Link :href="route('appointments.index')" class="flex items-center gap-4">
            <i class="bi bi-calendar-event text-3xl text-blue-600"></i>
            <div>
              <h3 class="text-lg font-semibold">Manage Appointments</h3>
              <p class="text-sm text-gray-500">View and modify all appointments</p>
            </div>
          </Link>
        </div>

        <div class="dashboard-card border-l-4 border-green-600">
          <Link :href="route('medical-records.index')" class="flex items-center gap-4">
            <i class="bi bi-journal-medical text-3xl text-green-600"></i>
            <div>
              <h3 class="text-lg font-semibold">Medical Records</h3>
              <p class="text-sm text-gray-500">Access patient histories</p>
            </div>
          </Link>
        </div>

        <div class="dashboard-card border-l-4 border-red-600">
          <Link :href="route('billing.index')" class="flex items-center gap-4">
            <i class="bi bi-receipt text-3xl text-red-600"></i>
            <div>
              <h3 class="text-lg font-semibold">Billing</h3>
              <p class="text-sm text-gray-500">Review payment data</p>
            </div>
          </Link>
        </div>

        <div class="dashboard-card border-l-4 border-gray-600">
          <Link href="/user/profile" class="flex items-center gap-4">
            <i class="bi bi-person-circle text-3xl text-gray-700"></i>
            <div>
              <h3 class="text-lg font-semibold">My Profile</h3>
              <p class="text-sm text-gray-500">Update admin account</p>
            </div>
          </Link>
        </div>
      </section>
    </div>
  </AppLayout>
</template>

<style scoped>
.nav-link {
  @apply flex items-center px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 hover:text-indigo-600 transition;
}
.dashboard-card {
  @apply bg-white p-5 rounded-xl shadow hover:shadow-lg transition-all;
}
</style>

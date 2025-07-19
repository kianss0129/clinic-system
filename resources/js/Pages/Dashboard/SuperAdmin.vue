<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, usePage } from '@inertiajs/vue3';

const user = usePage().props.auth.user;
</script>

<template>
  <AppLayout title="Super Admin Dashboard">
    <template #header>
      <h2 class="font-bold text-3xl text-gray-800">Welcome, {{ user.name }}!</h2>
      <p class="text-gray-500 text-sm">Full system control</p>
    </template>

    <div class="flex flex-col md:flex-row p-6 gap-6">
      <!-- Sidebar -->
      <aside class="w-full md:w-64 bg-white border rounded-xl shadow-sm p-4 space-y-2">
        <nav class="flex flex-col gap-2">
          <div class="nav-link bg-gray-100 cursor-default text-indigo-600 font-semibold">
            <i class="bi bi-house-door-fill mr-2"></i> Dashboard
          </div>

          <Link :href="route('appointments.index')" class="nav-link">
            <i class="bi bi-calendar4-week mr-2"></i> Appointments
          </Link>

          <Link :href="route('medical-records.index')" class="nav-link">
            <i class="bi bi-journals mr-2"></i> Medical Records
          </Link>

          <Link :href="route('doctor.prescriptions.index')" class="nav-link">
            <i class="bi bi-file-medical mr-2"></i> Prescriptions
          </Link>

          <Link :href="route('billing.index')" class="nav-link">
            <i class="bi bi-cash-stack mr-2"></i> Billing
          </Link>

          <Link :href="route('roles.index')" class="nav-link">
            <i class="bi bi-person-gear mr-2"></i> Role Management
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
        <div class="dashboard-card border-l-4 border-blue-700">
          <Link :href="route('appointments.index')" class="flex items-center gap-4">
            <i class="bi bi-calendar4-week text-3xl text-blue-700"></i>
            <div>
              <h3 class="text-lg font-semibold">Appointments Overview</h3>
              <p class="text-sm text-gray-500">Full appointment data</p>
            </div>
          </Link>
        </div>

        <div class="dashboard-card border-l-4 border-green-700">
          <Link :href="route('medical-records.index')" class="flex items-center gap-4">
            <i class="bi bi-journals text-3xl text-green-700"></i>
            <div>
              <h3 class="text-lg font-semibold">Medical Records</h3>
              <p class="text-sm text-gray-500">Browse and manage records</p>
            </div>
          </Link>
        </div>

        <div class="dashboard-card border-l-4 border-purple-700">
          <Link :href="route('doctor.prescriptions.index')" class="flex items-center gap-4">
            <i class="bi bi-file-medical text-3xl text-purple-700"></i>
            <div>
              <h3 class="text-lg font-semibold">Prescriptions</h3>
              <p class="text-sm text-gray-500">System-wide meds</p>
            </div>
          </Link>
        </div>

        <div class="dashboard-card border-l-4 border-red-700">
          <Link :href="route('billing.index')" class="flex items-center gap-4">
            <i class="bi bi-cash-stack text-3xl text-red-700"></i>
            <div>
              <h3 class="text-lg font-semibold">All Billing</h3>
              <p class="text-sm text-gray-500">System financials</p>
            </div>
          </Link>
        </div>

        <div class="dashboard-card border-l-4 border-indigo-700">
          <Link :href="route('roles.index')" class="flex items-center gap-4">
            <i class="bi bi-person-gear text-3xl text-indigo-700"></i>
            <div>
              <h3 class="text-lg font-semibold">Role Management</h3>
              <p class="text-sm text-gray-500">Assign and manage user roles</p>
            </div>
          </Link>
        </div>

        <div class="dashboard-card border-l-4 border-gray-700">
          <Link href="/user/profile" class="flex items-center gap-4">
            <i class="bi bi-person-circle text-3xl text-gray-700"></i>
            <div>
              <h3 class="text-lg font-semibold">My Profile</h3>
              <p class="text-sm text-gray-500">Manage your account</p>
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

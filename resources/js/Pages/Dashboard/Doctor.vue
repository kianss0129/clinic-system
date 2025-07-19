<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, usePage } from '@inertiajs/vue3';

const user = usePage().props.auth.user;
</script>

<template>
  <AppLayout title="Doctor Dashboard">
    <template #header>
      <h2 class="font-bold text-3xl text-gray-800">Welcome, {{ user.name }}!</h2>
      <p class="text-gray-500 text-sm">Your personalized doctor dashboard</p>
    </template>

    <div class="flex flex-col md:flex-row p-6 gap-6">
      <!-- Sidebar -->
      <aside class="w-full md:w-64 bg-white border rounded-xl shadow-sm p-4 space-y-2">
        <nav class="flex flex-col gap-2">
          <div class="nav-link bg-gray-100 cursor-default text-indigo-600 font-semibold">
            <i class="bi bi-house-door-fill mr-2"></i> Dashboard
          </div>

          <Link :href="route('doctor.appointments.index')" class="nav-link">
            <i class="bi bi-calendar-check mr-2"></i> My Appointments
          </Link>

          <Link :href="route('doctor.records.index')" class="nav-link">
            <i class="bi bi-folder2-open mr-2"></i> Update Records
          </Link>

          <Link :href="route('doctor.prescriptions.index')" class="nav-link">
            <i class="bi bi-file-medical mr-2"></i> Prescriptions
          </Link>

          <Link :href="route('doctor.records.create')" class="nav-link">
            <i class="bi bi-file-earmark-plus mr-2"></i> Add Record
          </Link>

          <Link href="/user/profile" class="nav-link">
            <i class="bi bi-person-circle mr-2"></i> My Profile
          </Link>

          <Link method="post" href="/logout" class="nav-link text-red-500 hover:text-red-600">
            <i class="bi bi-box-arrow-right mr-2"></i> Logout
          </Link>
        </nav>
      </aside>

      <!-- Main Dashboard Cards -->
      <section class="flex-1 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Appointments -->
        <div class="dashboard-card border-l-4 border-purple-600">
          <Link :href="route('doctor.appointments.index')" class="flex items-center gap-4">
            <i class="bi bi-calendar-check text-3xl text-purple-600"></i>
            <div>
              <h3 class="text-lg font-semibold">My Appointments</h3>
              <p class="text-sm text-gray-500">Review upcoming schedules</p>
            </div>
          </Link>
        </div>

        <!-- Update Records -->
        <div class="dashboard-card border-l-4 border-yellow-500">
          <Link :href="route('doctor.records.index')" class="flex items-center gap-4">
            <i class="bi bi-pencil-square text-3xl text-yellow-600"></i>
            <div>
              <h3 class="text-lg font-semibold">Update Records</h3>
              <p class="text-sm text-gray-500">Edit patient history</p>
            </div>
          </Link>
        </div>

        <!-- Prescriptions -->
        <div class="dashboard-card border-l-4 border-cyan-600">
          <Link :href="route('doctor.prescriptions.index')" class="flex items-center gap-4">
            <i class="bi bi-file-earmark-medical text-3xl text-cyan-600"></i>
            <div>
              <h3 class="text-lg font-semibold">Prescriptions</h3>
              <p class="text-sm text-gray-500">Manage and view meds</p>
            </div>
          </Link>
        </div>

        <!-- Add Record -->
        <div class="dashboard-card border-l-4 border-blue-600">
          <Link :href="route('doctor.records.create')" class="flex items-center gap-4">
            <i class="bi bi-file-earmark-plus text-3xl text-blue-600"></i>
            <div>
              <h3 class="text-lg font-semibold">Add Medical Record</h3>
              <p class="text-sm text-gray-500">Create new diagnosis</p>
            </div>
          </Link>
        </div>

        <!-- Profile -->
        <div class="dashboard-card border-l-4 border-gray-600">
          <Link href="/user/profile" class="flex items-center gap-4">
            <i class="bi bi-person-circle text-3xl text-gray-700"></i>
            <div>
              <h3 class="text-lg font-semibold">My Profile</h3>
              <p class="text-sm text-gray-500">Update your details</p>
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

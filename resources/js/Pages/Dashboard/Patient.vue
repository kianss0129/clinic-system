<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, usePage } from '@inertiajs/vue3';

const user = usePage().props.auth.user;
</script>

<template>
  <AppLayout title="Patient Dashboard">
    <template #header>
      <h2 class="font-bold text-3xl text-gray-800">Welcome, {{ user.name }}!</h2>
      <p class="text-gray-500 text-sm">Your personalized patient dashboard</p>
    </template>

    <div class="flex flex-col md:flex-row p-6 gap-6">
      <!-- Sidebar Navigation -->
      <aside class="w-full md:w-64 bg-white border rounded-xl shadow-sm p-4 space-y-2">
        <nav class="flex flex-col gap-2">
          <div class="nav-link bg-gray-100 cursor-default text-indigo-600 font-semibold">
  <i class="bi bi-house-door-fill mr-2"></i> Dashboard
</div>

          <Link href="/patient/appointments/create" class="nav-link">
            <i class="bi bi-calendar-plus mr-2"></i> Book Appointment
          </Link>
          <Link href="/patient/appointments" class="nav-link">
            <i class="bi bi-calendar-check mr-2"></i> View Appointments
          </Link>
          <Link href="/patient/records" class="nav-link">
            <i class="bi bi-folder2-open mr-2"></i> My Medical Records
          </Link>
          <Link href="/patient/prescriptions" class="nav-link">
            <i class="bi bi-file-medical mr-2"></i> My Prescriptions
          </Link>
          <Link href="/patient/billings" class="nav-link">
            <i class="bi bi-receipt-cutoff mr-2"></i> My Billings
          </Link>
          <Link href="/patient/support" class="nav-link">
            <i class="bi bi-question-circle mr-2"></i> Support
          </Link>
          <Link href="/user/profile" class="nav-link">
            <i class="bi bi-person-circle mr-2"></i> My Profile
          </Link>
          <Link method="post" href="/logout" class="nav-link text-red-500 hover:text-red-600">
            <i class="bi bi-box-arrow-right mr-2"></i> Logout
          </Link>
        </nav>
      </aside>

      <!-- Main Content Cards -->
      <section class="flex-1 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Book Appointment -->
        <div class="dashboard-card border-l-4 border-indigo-500">
          <Link :href="route('patient.appointments.create')" class="flex items-center gap-4">
            <i class="bi bi-calendar-plus text-3xl text-indigo-600"></i>
            <div>
              <h3 class="text-lg font-semibold">Book Appointment</h3>
              <p class="text-sm text-gray-500">Schedule a visit</p>
            </div>
          </Link>
        </div>

        <!-- View Appointments -->
        <div class="dashboard-card border-l-4 border-green-500">
          <Link :href="route('patient.appointments.index')" class="flex items-center gap-4">
            <i class="bi bi-calendar-check text-3xl text-green-600"></i>
            <div>
              <h3 class="text-lg font-semibold">View Appointments</h3>
              <p class="text-sm text-gray-500">Check your bookings</p>
            </div>
          </Link>
        </div>

        <!-- My Profile -->
        <div class="dashboard-card border-l-4 border-gray-500">
          <Link href="/user/profile" class="flex items-center gap-4">
            <i class="bi bi-person-circle text-3xl text-gray-700"></i>
            <div>
              <h3 class="text-lg font-semibold">My Profile</h3>
              <p class="text-sm text-gray-500">Update personal info</p>
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

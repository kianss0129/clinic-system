  <!-- Sidebar Menu Items -->
  <template>
    <div>
      <h1 class="text-xl font-bold mb-4">Clinic System</h1>
      <p class="mb-4">{{ $page.props.auth.user.name }}</p>

      <nav class="space-y-2">
        <Link href="/patient/dashboard" class="block text-blue-700">Patient Dashboard</Link>
        <Link href="/patient/appointments/create" class="block text-blue-700">Book Appointment</Link>
        <Link href="/patient/appointments" class="block text-blue-700">View Appointments</Link>
        <Link href="/patient/records" class="block text-blue-700">My Medical Records</Link>
        <Link href="/patient/prescriptions" class="block text-blue-700">My Prescriptions</Link>
        <Link href="/patient/billings" class="block text-blue-700">My Billings</Link>
        <Link href="/patient/support" class="block text-blue-700">Support</Link>
        <Link href="/user/profile" class="block text-blue-700">My Profile</Link>
        <Link method="post" href="/logout" class="block text-red-500">Logout</Link>
      </nav>
    </div>
  </template>

  <script setup>
  import { Link } from '@inertiajs/vue3'
  </script>

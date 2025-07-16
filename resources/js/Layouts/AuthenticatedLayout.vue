<template>
  <div>
    <!-- Toast Notification for Success Message -->
    <div v-if="$page.props.flash.success" class="bg-green-200 text-green-900 px-4 py-2 rounded mb-4">
      {{ $page.props.flash.success }}
    </div>

    <!-- Topbar -->
    <div class="flex items-center justify-between bg-white shadow px-6 py-4">
      <div class="text-sm text-gray-700">
        Logged in as: {{ $page.props.auth.user.name }} ({{ $page.props.auth.user.roles[0].name }})
      </div>

      <!-- Logout -->
      <form method="POST" :action="route('logout')">
        <input type="hidden" name="_token" :value="$page.props.csrf_token" />
        <button type="submit" class="text-red-600 hover:underline text-sm">Logout</button>
      </form>
    </div>

    <div class="flex">
      <!-- Sidebar -->
      <aside class="w-64 bg-gray-800 text-white min-h-screen">
        <nav class="p-4 space-y-2">
          <ul>
            <li><inertia-link href="/dashboard" class="text-white">Dashboard</inertia-link></li>
            <li><inertia-link href="/appointments" class="text-white">Appointments</inertia-link></li>
            <li><inertia-link href="/medical-records" class="text-white">Medical Records</inertia-link></li>
            <li><inertia-link href="/billing" class="text-white">Billing</inertia-link></li>
            <li><inertia-link href="/prescriptions" class="text-white">Prescriptions</inertia-link></li>
          </ul>
        </nav>
      </aside>

      <!-- Main Content -->
      <main class="flex-1 p-6">
        <header class="mb-6">
          <h1 class="text-3xl font-semibold text-gray-900">
            <slot name="header"></slot>
          </h1>
        </header>

        <div>
          <slot></slot>
        </div>
      </main>
    </div>
  </div>
</template>

<script setup>
// No script changes needed
</script>

<style scoped>
/* Optional: Add hover effects or styling if needed */
</style>

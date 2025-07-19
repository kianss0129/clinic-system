<template>
  <div>
    <!-- Toast Notification -->
    <div v-if="$page.props.flash.success" class="bg-green-200 text-green-900 px-4 py-2 rounded mb-4">
      {{ $page.props.flash.success }}
    </div>

    <!-- Topbar -->
    <div class="flex items-center justify-between bg-white shadow px-6 py-4">
      <div class="flex items-center gap-2 text-sm text-gray-700">
        Logged in as: {{ $page.props.auth.user.name }} ({{ $page.props.auth.user.roles[0].name }})
      </div>
      <form method="POST" :action="route('logout')">
        <input type="hidden" name="_token" :value="$page.props.csrf_token" />
        <button type="submit" class="text-red-600 hover:underline text-sm">Logout</button>
      </form>
    </div>

    <div class="flex">
      <!-- Sidebar -->
      <aside class="w-64 bg-gray-800 text-white min-h-screen">
        <div class="p-4 flex items-center space-x-2">
          <img :src="'/logo.png'" alt="Clinic Logo" class="h-10 w-auto rounded" />
          <span class="text-xl font-bold">MyClinic</span>
        </div>
        <nav class="p-4 space-y-2">
          <ul class="space-y-1">
            <li><Link href="/dashboard" class="text-white hover:underline">Dashboard</Link></li>
            <li><Link href="/appointments" class="text-white hover:underline">Appointments</Link></li>
            <li><Link href="/medical-records" class="text-white hover:underline">Medical Records</Link></li>
            <li><Link href="/billing" class="text-white hover:underline">Billing</Link></li>
            <li><Link href="/prescriptions" class="text-white hover:underline">Prescriptions</Link></li>
          </ul>
        </nav>
      </aside>

      <!-- Main -->
      <main class="flex-1 p-6">
        <header class="mb-6">
          <h1 class="text-3xl font-semibold text-gray-900">
            <slot name="header"></slot>
          </h1>
        </header>
        <div><slot></slot></div>
      </main>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>

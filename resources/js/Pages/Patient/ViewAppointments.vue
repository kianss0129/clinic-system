<script setup>
defineProps(['appointments']);
</script>

<template>
  <div class="p-4 max-w-5xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">My Appointments</h1>
    <table class="w-full border-collapse border text-left">
      <thead>
        <tr>
          <th class="border p-2">Doctor</th>
          <th class="border p-2">Date</th>
          <th class="border p-2">Status</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="appt in appointments" :key="appt.id">
          <td class="border p-2">{{ appt.doctor.name }}</td>
          <td class="border p-2">{{ appt.appointment_date }}</td>
          <td class="border p-2">{{ appt.status }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

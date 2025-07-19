<script setup>
import { router } from '@inertiajs/vue3';

defineProps({
  appointments: Array,
});

function cancelAppointment(id) {
  if (confirm('Are you sure you want to cancel this appointment?')) {
    router.post(`/patient/appointments/${id}/cancel`, {}, {
      preserveScroll: true,
      onSuccess: () => {
        alert('Appointment cancelled successfully.');
      },
      onError: () => {
        alert('Failed to cancel appointment.');
      },
    });
  }
}
</script>

<template>
  <div class="p-6 max-w-5xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">My Appointments</h1>

    <table class="w-full border-collapse border text-left">
      <thead>
        <tr>
          <th class="border p-2">Doctor</th>
          <th class="border p-2">Date</th>
          <th class="border p-2">Status</th>
          <th class="border p-2">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="appt in appointments" :key="appt.id">
          <td class="border p-2">{{ appt.doctor.name }}</td>
          <td class="border p-2">{{ appt.appointment_date }}</td>
          <td class="border p-2">{{ appt.status }}</td>
          <td class="border p-2">
            <button
              v-if="appt.status === 'confirmed'"
              @click="cancelAppointment(appt.id)"
              class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded"
            >
              Cancel
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

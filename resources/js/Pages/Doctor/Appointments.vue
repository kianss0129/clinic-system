<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { router } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  appointments: Array,
})

function confirmAppointment(id) {
  if (confirm('Confirm this appointment?')) {
    router.post(route('doctor.appointments.confirm', id), {}, {
      preserveScroll: true,
      onSuccess: () => {
        alert('✅ Appointment confirmed!')
      },
    })
  }
}
</script>

<template>
  <AppLayout title="Doctor Appointments">
    <template #header>
      <h2 class="text-2xl font-bold text-gray-800">My Appointments</h2>
    </template>

    <div class="p-6 bg-white rounded shadow">
      <table class="w-full table-auto border">
        <thead class="bg-gray-100">
          <tr>
            <th class="p-2 border">Patient</th>
            <th class="p-2 border">Date & Time</th>
            <th class="p-2 border">Status</th>
            <th class="p-2 border">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="appt in appointments" :key="appt.id" class="border">
            <td class="p-2 border">{{ appt.patient?.name ?? 'N/A' }}</td>
            <td class="p-2 border">{{ new Date(appt.appointment_date).toLocaleString() }}</td>
            <td class="p-2 border">
              <span :class="{
                'text-yellow-600': appt.status === 'Pending',
                'text-green-600': appt.status === 'confirmed',
                'text-red-600': appt.status === 'Cancelled',
              }">
                {{ appt.status }}
              </span>
            </td>
            <td class="p-2 border">
              <Link
                v-if="appt.medical_record"
                :href="route('doctor.records.edit', appt.medical_record.id)"
                class="text-blue-600 hover:underline"
              >
                Edit Record
              </Link>

              <button
                v-else-if="appt.status !== 'confirmed'"
                @click="confirmAppointment(appt.id)"
                class="ml-2 px-2 py-1 text-sm text-white bg-green-600 rounded hover:bg-green-700"
              >
                Confirm
              </button>

              <span v-else class="italic text-gray-500">No record</span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </AppLayout>
</template>

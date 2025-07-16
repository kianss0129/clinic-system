<script setup>
import { Link } from '@inertiajs/vue3';
import dayjs from 'dayjs'; // Make sure dayjs is installed (npm install dayjs)

defineProps(['records']);
</script>

<template>
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Medical Records</h1>

    <div v-if="records.length === 0" class="text-gray-600">
      No medical records found.
    </div>

    <div v-else class="overflow-x-auto">
      <table class="table-auto w-full border border-gray-300">
        <thead class="bg-gray-100">
          <tr>
            <th class="border p-2 text-left">Record Date</th>
            <th class="border p-2 text-left">Patient</th>
            <th class="border p-2 text-left">Doctor</th>
            <th class="border p-2 text-left">Diagnosis</th>
            <th class="border p-2 text-left">Notes</th>
            <th class="border p-2 text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="record in records" :key="record.id" class="hover:bg-gray-50">
            <td class="border p-2">{{ formatDate(record.record_date) }}</td>
            <td class="border p-2">{{ record.patient?.name || 'N/A' }}</td>
            <td class="border p-2">{{ record.doctor?.name || 'N/A' }}</td>
            <td class="border p-2">{{ record.diagnosis }}</td>
            <td class="border p-2">{{ record.notes }}</td>
            <td class="border p-2 text-center space-x-2">
              <Link
                :href="route('doctor.records.edit', record.id)"
                class="text-blue-600 hover:underline"
              >
                Edit
              </Link>
              <!-- Uncomment if you add View button -->
              <!--
              <Link
                :href="route('prescriptions.show', record.latest_prescription_id)"
                class="text-green-600 hover:underline"
              >
                View
              </Link>
              -->
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
function formatDate(date) {
  return dayjs(date).format('MMM DD, YYYY');
}
</script>

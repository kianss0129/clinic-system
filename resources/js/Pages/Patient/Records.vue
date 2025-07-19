<template>
  <div>
    <h1 class="text-2xl font-bold mb-4">My Medical Records</h1>
    <div v-if="medicalRecords && medicalRecords.length">
      <table class="table-auto w-full border">
        <thead>
          <tr>
            <th class="border px-4 py-2">Date</th>
            <th class="border px-4 py-2">Doctor</th>
            <th class="border px-4 py-2">Diagnosis</th>
            <th class="border px-4 py-2">Notes</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="record in medicalRecords" :key="record.id">
            <td class="border px-4 py-2">{{ new Date(record.created_at).toLocaleDateString() }}</td>
            <td class="border px-4 py-2">{{ record.doctor?.name || 'N/A' }}</td>
            <td class="border px-4 py-2">{{ record.diagnosis }}</td>
            <td class="border px-4 py-2">{{ record.notes }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div v-else>
      <p>No medical records found.</p>
    </div>
  </div>
</template>

<script setup>
defineProps({ medicalRecords: Array });
</script>

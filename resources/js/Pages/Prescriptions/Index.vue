<script setup>
import { Link } from '@inertiajs/vue3';
import { route } from 'ziggy-js';
defineProps(['prescriptions']);
</script>

<template>
  <div class="p-4">
    <h1 class="text-2xl font-bold mb-4">Prescriptions</h1>

    <Link
      :href="route('doctor.prescriptions.create')"
      class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block"
    >
      Add Prescription
    </Link>

    <table class="table-auto w-full border">
      <thead>
        <tr>
          <th class="border p-2">Record ID</th>
          <th class="border p-2">Medicine</th>
          <th class="border p-2">Dosage</th>
          <th class="border p-2">Instructions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="prescription in prescriptions" :key="prescription.id">
          <td class="border p-2">{{ prescription.medical_record_id }}</td>
          <td class="border p-2">{{ prescription.medicine_name }}</td>
          <td class="border p-2">{{ prescription.dosage }}</td>
          <td class="border p-2">{{ prescription.instructions }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

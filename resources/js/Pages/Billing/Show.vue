<script setup>
defineProps({ billing: Object })
</script>

<template>
  <div class="max-w-3xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Billing Details</h1>

    <div class="border rounded p-4 mb-4 bg-white shadow">
      <p><strong>Invoice No:</strong> {{ billing.invoice_number }}</p>
      <p><strong>Patient:</strong> {{ billing.patient.name }}</p>
      <p><strong>Status:</strong> {{ billing.status }}</p>
      <p><strong>Total:</strong> ₱{{ billing.total_amount.toLocaleString() }}</p>
    </div>

    <h2 class="text-lg font-semibold mb-2">Prescriptions</h2>
    <table class="w-full table-auto border">
      <thead>
        <tr class="bg-gray-100">
          <th class="border px-2 py-1">#</th>
          <th class="border px-2 py-1">Medicine</th>
          <th class="border px-2 py-1">Dosage</th>
          <th class="border px-2 py-1">Instructions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(p, index) in billing.prescriptions" :key="p.id">
          <td class="border px-2 py-1">{{ index + 1 }}</td>
          <td class="border px-2 py-1">{{ p.medicine_name }}</td>
          <td class="border px-2 py-1">{{ p.dosage }}</td>
          <td class="border px-2 py-1">{{ p.instructions }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

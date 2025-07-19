<template>
  <div>
    <h1 class="text-2xl font-bold mb-4">My Billings</h1>

    <div v-if="billings.length">
      <table class="table-auto w-full border text-sm">
        <thead>
          <tr>
            <th class="border px-4 py-2">Invoice #</th>
            <th class="border px-4 py-2">Amount</th>
            <th class="border px-4 py-2">Status</th>
            <th class="border px-4 py-2">Date</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="billing in billings" :key="billing.id">
            <td class="border px-4 py-2">{{ billing.invoice_no || 'N/A' }}</td>
            <td class="border px-4 py-2">₱{{ billing.amount.toFixed(2) }}</td>
            <td class="border px-4 py-2">
              <span :class="{
                'text-green-600': billing.status === 'Paid',
                'text-red-600': billing.status !== 'Paid'
              }">
                {{ billing.status }}
              </span>
            </td>
            <td class="border px-4 py-2">{{ new Date(billing.billing_date).toLocaleDateString() }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div v-else>
      <p>No billing records found.</p>
    </div>
  </div>
</template>

<script setup>
defineProps({ billings: Array });
</script>

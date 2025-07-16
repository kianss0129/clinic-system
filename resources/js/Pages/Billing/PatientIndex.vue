<script setup>
defineProps({ billings: Array })
</script>

<template>
  <div class="max-w-5xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">My Billings</h1>

    <table class="w-full table-auto border">
      <thead>
        <tr class="bg-gray-100">
          <th class="border px-3 py-2">Invoice No</th>
          <th class="border px-3 py-2">Total</th>
          <th class="border px-3 py-2">Status</th>
          <th class="border px-3 py-2">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="b in billings" :key="b.id">
          <td class="border px-3 py-2">{{ b.invoice_number }}</td>
          <td class="border px-3 py-2">₱{{ b.total_amount.toLocaleString() }}</td>
          <td class="border px-3 py-2">{{ b.status }}</td>
          <td class="border px-3 py-2">
            <Link :href="route('billing.show', b.id)" class="text-blue-600 hover:underline">View</Link>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

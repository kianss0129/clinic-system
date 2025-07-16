<script setup>
import { ref, computed } from 'vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
  billings: {
    type: Array,
    default: () => [],
  },
  filters: {
    type: Object,
    default: () => ({ status: '' }),
  },
})

const selectedStatus = ref(props.filters.status ?? '')

// Format PHP currency
function formatAmount(amount) {
  const num = parseFloat(amount)
  return isNaN(num)
    ? '₱0.00'
    : num.toLocaleString('en-PH', {
        style: 'currency',
        currency: 'PHP',
        minimumFractionDigits: 2,
      })
}

// Totals
const totalPaid = computed(() =>
  props.billings
    .filter(b => b.status === 'Paid')
    .reduce((sum, b) => sum + (parseFloat(b.amount) || 0), 0)
)

const totalUnpaid = computed(() =>
  props.billings
    .filter(b => b.status === 'Unpaid')
    .reduce((sum, b) => sum + (parseFloat(b.amount) || 0), 0)
)

// Filter by status
function filterStatus() {
  router.get('/billing', { status: selectedStatus.value }, {
    preserveState: true,
    replace: true,
  })
}

// Mark bill as paid
function markAsPaid(id) {
  router.post(`/billing/${id}/status`, { status: 'Paid' }, {
    preserveScroll: true,
    onSuccess: () => {
      const bill = props.billings.find(b => b.id === id)
      if (bill) bill.status = 'Paid'
    }
  })
}
</script>

<template>
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Billing Records</h1>

    <!-- Actions -->
    <div class="flex justify-between items-center mb-4">
      <a href="/billing/pdf/export" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        Download PDF Report
      </a>

      <div class="flex items-center gap-2">
        <label for="status" class="font-semibold">Filter:</label>
        <select
          id="status"
          v-model="selectedStatus"
          @change="filterStatus"
          class="border rounded px-2 py-1"
        >
          <option value="">All</option>
          <option value="Paid">Paid</option>
          <option value="Unpaid">Unpaid</option>
        </select>
      </div>
    </div>

    <!-- Totals -->
    <div class="mb-4 flex gap-6">
      <p class="text-green-600 font-semibold">
        ✅ Total Paid: {{ formatAmount(totalPaid) }}
      </p>
      <p class="text-red-600 font-semibold">
        ❌ Total Unpaid: {{ formatAmount(totalUnpaid) }}
      </p>
    </div>

    <!-- Table -->
    <table class="table-auto w-full border shadow">
      <thead class="bg-gray-100">
        <tr>
          <th class="border px-4 py-2">Invoice No</th>
          <th class="border px-4 py-2">Patient</th>
          <th class="border px-4 py-2">Amount</th>
          <th class="border px-4 py-2">Status</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="bill in props.billings" :key="bill.id">
          <td class="border px-4 py-2">{{ bill.invoice_no }}</td>
          <td class="border px-4 py-2">{{ bill.patient?.name ?? 'Unknown' }}</td>
          <td class="border px-4 py-2">{{ formatAmount(bill.amount) }}</td>
          <td class="border px-4 py-2">
            <span
              :class="{
                'text-green-600 font-semibold': bill.status === 'Paid',
                'text-red-600 font-semibold': bill.status === 'Unpaid',
                'text-yellow-600 font-semibold': bill.status === 'Pending',
              }"
            >
              {{ bill.status }}
            </span>
            <button
              v-if="bill.status !== 'Paid'"
              @click="markAsPaid(bill.id)"
              class="ml-2 bg-green-500 text-white px-2 py-1 rounded text-sm hover:bg-green-600"
            >
              Mark as Paid
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({ doctors: Array });

const form = useForm({
  doctor_id: '',
  appointment_date: '',
});
</script>

<template>
  <AppLayout title="Book Appointment">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Book Appointment</h2>
    </template>

    <div class="p-4 max-w-xl mx-auto bg-white rounded shadow">
      <form @submit.prevent="form.post(route('patient.appointments.store'))">
        <div class="mb-4">
          <label class="block mb-1 font-medium">Doctor:</label>
          <select v-model="form.doctor_id" class="border rounded p-2 w-full">
            <option value="">Select Doctor</option>
            <option v-for="doc in doctors" :key="doc.id" :value="doc.id">{{ doc.name }}</option>
          </select>
          <div v-if="form.errors.doctor_id" class="text-red-600 text-sm">{{ form.errors.doctor_id }}</div>
        </div>

        <div class="mb-4">
          <label class="block mb-1 font-medium">Appointment Date:</label>
          <input
            type="datetime-local"
            v-model="form.appointment_date"
            class="border rounded p-2 w-full"
          />
          <div v-if="form.errors.appointment_date" class="text-red-600 text-sm">{{ form.errors.appointment_date }}</div>
        </div>

        <button
          type="submit"
          class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
          :disabled="form.processing"
        >
          {{ form.processing ? 'Booking...' : 'Book' }}
        </button>
      </form>
    </div>
  </AppLayout>
</template>

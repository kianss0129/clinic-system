<script setup>
import { useForm } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';
defineProps(['patients', 'doctors']);

const form = useForm({
  patient_id: '',
  doctor_id: '',
  appointment_date: '',
});
</script>

<template>
  <div class="p-4">
    <h1 class="text-2xl font-bold mb-4">Book Appointment</h1>

    <form @submit.prevent="form.post('/appointments')">
      <div class="mb-2">
        <label>Patient:</label>
        <select v-model="form.patient_id" class="border rounded p-1 w-full">
          <option value="">Select Patient</option>
          <option v-for="p in patients" :value="p.id" :key="p.id">{{ p.name }}</option>
        </select>
      </div>

      <div class="mb-2">
        <label>Doctor:</label>
        <select v-model="form.doctor_id" class="border rounded p-1 w-full">
          <option value="">Select Doctor</option>
          <option v-for="d in doctors" :value="d.id" :key="d.id">{{ d.name }}</option>
        </select>
      </div>

      <div class="mb-2">
        <label>Date:</label>
        <input type="datetime-local" v-model="form.appointment_date" class="border rounded p-1 w-full">
      </div>

      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Submit</button>
    </form>
  </div>
</template>

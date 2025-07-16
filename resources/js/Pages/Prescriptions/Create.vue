<script setup>
import { useForm } from '@inertiajs/vue3'
defineProps(['records'])

const form = useForm({
  medical_record_id: '',
  medicine_name: '',
  dosage: '',
  instructions: '',
  medications: '',
  prescribed_date: '',
})

function submit() {
  if (!form.medical_record_id) {
    alert('Please select a medical record.')
    return
  }

  form.post(route('doctor.prescriptions.store'))
}
</script>

<template>
  <div class="p-6 max-w-xl mx-auto bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Add Prescription</h1>

    <form @submit.prevent="submit" class="space-y-4">
      <!-- Medical Record Dropdown -->
      <div>
        <label class="block font-medium text-sm text-gray-700 mb-1">Medical Record:</label>
        <select v-model="form.medical_record_id" class="border rounded w-full p-2">
          <option value="" disabled>Select Record</option>
          <option
            v-for="rec in records"
            :value="rec.id"
            :key="rec.id"
          >
            {{ rec.patient?.name }} | {{ rec.doctor?.name }} | {{ rec.diagnosis }} (ID: {{ rec.id }})
          </option>
        </select>
        <div class="text-red-500 text-sm mt-1" v-if="form.errors.medical_record_id">{{ form.errors.medical_record_id }}</div>
      </div>

      <!-- Medicine Name -->
      <div>
        <label class="block font-medium text-sm text-gray-700 mb-1">Medicine Name:</label>
        <input type="text" v-model="form.medicine_name" class="border rounded w-full p-2" />
        <div class="text-red-500 text-sm mt-1" v-if="form.errors.medicine_name">{{ form.errors.medicine_name }}</div>
      </div>

      <!-- Dosage -->
      <div>
        <label class="block font-medium text-sm text-gray-700 mb-1">Dosage:</label>
        <input type="text" v-model="form.dosage" class="border rounded w-full p-2" />
        <div class="text-red-500 text-sm mt-1" v-if="form.errors.dosage">{{ form.errors.dosage }}</div>
      </div>

      <!-- Instructions -->
      <div>
        <label class="block font-medium text-sm text-gray-700 mb-1">Instructions:</label>
        <textarea v-model="form.instructions" class="border rounded w-full p-2"></textarea>
        <div class="text-red-500 text-sm mt-1" v-if="form.errors.instructions">{{ form.errors.instructions }}</div>
      </div>

      <!-- Medications -->
      <div>
        <label class="block font-medium text-sm text-gray-700 mb-1">Medications:</label>
        <textarea v-model="form.medications" class="border rounded w-full p-2"></textarea>
        <div class="text-red-500 text-sm mt-1" v-if="form.errors.medications">{{ form.errors.medications }}</div>
      </div>

      <!-- Prescribed Date -->
      <div>
        <label class="block font-medium text-sm text-gray-700 mb-1">Prescribed Date:</label>
        <input type="date" v-model="form.prescribed_date" class="border rounded w-full p-2" />
        <div class="text-red-500 text-sm mt-1" v-if="form.errors.prescribed_date">{{ form.errors.prescribed_date }}</div>
      </div>

      <!-- Submit -->
      <div>
        <button
          type="submit"
          class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded"
          :disabled="form.processing"
        >
          Submit
        </button>
      </div>
    </form>
  </div>
</template>

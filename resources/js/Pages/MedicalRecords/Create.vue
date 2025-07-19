<script setup>
import { useForm } from '@inertiajs/vue3'

const { patients, doctors, appointments } = defineProps({
  patients: Array,
  doctors: Array,
  appointments: Array,
})

const form = useForm({
  patient_id: '',
  doctor_id: '',
  appointment_id: '',
  diagnosis: '',
  notes: '',
  record_date: new Date().toISOString().slice(0, 10), // Default to today
})

function submit() {
  form.post(route('doctor.records.store'))
}
</script>

<template>
  <div class="p-6 max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Add Medical Record</h1>
    <form @submit.prevent="submit" class="space-y-4">
      <div>
        <label class="block mb-1 font-medium">Patient</label>
        <select v-model="form.patient_id" class="w-full border rounded p-2">
          <option value="">— Select Patient —</option>
          <option v-for="p in patients" :key="p.id" :value="p.id">
            {{ p.name }}
          </option>
        </select>
        <p v-if="form.errors.patient_id" class="text-xs text-red-600 mt-1">
          {{ form.errors.patient_id }}
        </p>
      </div>

      <div>
        <label class="block mb-1 font-medium">Doctor</label>
        <select v-model="form.doctor_id" class="w-full border rounded p-2">
          <option value="">— Select Doctor —</option>
          <option v-for="d in doctors" :key="d.id" :value="d.id">
            {{ d.name }}
          </option>
        </select>
        <p v-if="form.errors.doctor_id" class="text-xs text-red-600 mt-1">
          {{ form.errors.doctor_id }}
        </p>
      </div>

      <div>
        <label class="block mb-1 font-medium">Appointment</label>
        <select v-model="form.appointment_id" class="w-full border rounded p-2">
          <option value="">— Select Appointment —</option>
          <option v-for="a in appointments" :key="a.id" :value="a.id">
            {{ a.patient?.name }} – {{ a.appointment_date }} ({{ a.status }})
          </option>
        </select>
        <p v-if="form.errors.appointment_id" class="text-xs text-red-600 mt-1">
          {{ form.errors.appointment_id }}
        </p>
      </div>

      <div>
        <label class="block mb-1 font-medium">Diagnosis</label>
        <input type="text" v-model="form.diagnosis" class="w-full border rounded p-2" placeholder="e.g. Hypertension" />
        <p v-if="form.errors.diagnosis" class="text-xs text-red-600 mt-1">
          {{ form.errors.diagnosis }}
        </p>
      </div>

      <div>
        <label class="block mb-1 font-medium">Notes</label>
        <textarea v-model="form.notes" rows="4" class="w-full border rounded p-2" placeholder="Optional notes …" />
        <p v-if="form.errors.notes" class="text-xs text-red-600 mt-1">
          {{ form.errors.notes }}
        </p>
      </div>

      <div>
        <label class="block mb-1 font-medium">Record Date</label>
        <input type="date" v-model="form.record_date" class="w-full border rounded p-2" />
        <p v-if="form.errors.record_date" class="text-xs text-red-600 mt-1">
          {{ form.errors.record_date }}
        </p>
      </div>

      <div class="text-right">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded disabled:opacity-50" :disabled="form.processing">
          Save
        </button>
      </div>
    </form>
  </div>
</template>

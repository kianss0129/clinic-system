<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

const props = defineProps({
  record: Object,
});

const form = useForm({
  diagnosis: props.record.diagnosis,
  treatment: props.record.treatment,
  notes: props.record.notes,
});
</script>

<template>
  <AppLayout title="Edit Medical Record">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Medical Record</h2>
    </template>

    <div class="p-6 bg-white rounded shadow">
      <form @submit.prevent="form.put(route('doctor.records.update', record.id))">
        <div class="mb-4">
          <label class="block font-medium">Diagnosis</label>
          <input v-model="form.diagnosis" type="text" class="mt-1 block w-full border p-2 rounded" />
        </div>

        <div class="mb-4">
          <label class="block font-medium">Treatment</label>
          <input v-model="form.treatment" type="text" class="mt-1 block w-full border p-2 rounded" />
        </div>

        <div class="mb-4">
          <label class="block font-medium">Notes</label>
          <textarea v-model="form.notes" class="mt-1 block w-full border p-2 rounded"></textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update Record</button>
      </form>
    </div>
  </AppLayout>
</template>

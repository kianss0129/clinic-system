<script setup>
defineProps(['prescription']);
</script>

<template>
  <div class="p-6 max-w-3xl mx-auto">
    <h1 class="text-3xl font-bold mb-6 text-blue-700">Latest Prescription</h1>

    <div class="bg-white p-6 shadow-md rounded-lg space-y-4">
      <p><strong>👤 Patient:</strong> {{ prescription.patient.name }}</p>
      <p><strong>🩺 Doctor:</strong> {{ prescription.doctor.name }}</p>
      <p><strong>💊 Medicine:</strong> {{ prescription.medicine_name }}</p>
      <p><strong>📏 Dosage:</strong> {{ prescription.dosage }}</p>
      <p><strong>📘 Instructions:</strong> {{ prescription.instructions || 'N/A' }}</p>
      <p><strong>🧾 Medications:</strong> {{ prescription.medications }}</p>
      <p><strong>🗓️ Prescribed Date:</strong> {{ new Date(prescription.prescribed_date).toLocaleDateString() }}</p>
      <p><strong>📅 Created At:</strong> {{ new Date(prescription.created_at).toLocaleString() }}</p>
    </div>

    <div class="mt-6">
      <Link
        href="/doctor/prescriptions"
        class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800"
      >
        ← Back to Prescriptions
      </Link>
    </div>
  </div>
</template>

<style scoped>
p {
  font-size: 1rem;
  color: #333;
}
</style>

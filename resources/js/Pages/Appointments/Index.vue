    <script setup>
    defineProps(['appointments']);
    </script>

    <template>
      <div class="p-4">
        <h1 class="text-2xl font-bold mb-4">Appointments</h1>
        <table class="table-auto w-full border">
          <thead>
            <tr>
              <th class="border p-2">Patient</th>
              <th class="border p-2">Doctor</th>
              <th class="border p-2">Date</th>
              <th class="border p-2">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="appt in appointments" :key="appt.id">
              <td class="border p-2">{{ appt.patient.name }}</td>
              <td class="border p-2">{{ appt.doctor.name }}</td>
              <td class="border p-2">{{ appt.appointment_date }}</td>
              <td class="border p-2">{{ appt.status }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </template>

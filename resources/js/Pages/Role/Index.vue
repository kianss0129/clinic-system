<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { useForm } from '@inertiajs/vue3'
import { ref } from 'vue'

const props = defineProps({
  users: Array,
  roles: Array
})

const form = useForm({
  user_id: '',
  role: ''
})

function assignRole() {
  if (!form.user_id || !form.role) return alert('Select both user and role');
  form.post(route('roles.assign'), {
    preserveScroll: true,
    onSuccess: () => {
      form.reset()
      alert('Role updated successfully!')
    }
  })
}
</script>

<template>
  <AppLayout title="Role Management">
    <template #header>
      <h2 class="font-bold text-3xl text-gray-800">Role Management</h2>
      <p class="text-gray-500 text-sm">Assign and manage user roles</p>
    </template>

    <div class="p-6 bg-white shadow rounded-xl">
      <div class="mb-6 flex gap-4 flex-col sm:flex-row items-center">
        <select v-model="form.user_id" class="border p-2 rounded w-full sm:w-64">
          <option disabled value="">Select User</option>
          <option v-for="user in props.users" :key="user.id" :value="user.id">
            {{ user.name }} ({{ user.email }})
          </option>
        </select>

        <select v-model="form.role" class="border p-2 rounded w-full sm:w-64">
          <option disabled value="">Select Role</option>
          <option v-for="role in props.roles" :key="role" :value="role">{{ role }}</option>
        </select>

        <button
          @click="assignRole"
          class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded"
        >
          Assign Role
        </button>
      </div>

      <hr class="mb-4" />

      <div>
        <h3 class="font-semibold mb-2">Current Users & Roles</h3>
        <table class="min-w-full bg-white text-sm border">
          <thead class="bg-gray-100 text-left">
            <tr>
              <th class="p-2 border-b">Name</th>
              <th class="p-2 border-b">Email</th>
              <th class="p-2 border-b">Current Role</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="user in props.users" :key="user.id" class="hover:bg-gray-50">
              <td class="p-2 border-b">{{ user.name }}</td>
              <td class="p-2 border-b">{{ user.email }}</td>
              <td class="p-2 border-b text-indigo-700 font-medium">{{ user.role }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AppLayout>
</template>

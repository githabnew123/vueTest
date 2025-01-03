<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import axios from 'axios';

const users = ref([]);
const pagination = ref({});
const currentPage = ref(1);

const fetchUsers = async (page = 1) => {
  try {
    const response = await axios.get(`/selftest?page=${page}`);
    users.value = response.data.data;
    pagination.value = {
      currentPage: response.data.current_page,
      lastPage: response.data.last_page,
    };
  } catch (error) {
    console.error('Error fetching users:', error);
  }
};

const changePage = (page) => {
  currentPage.value = page;
  fetchUsers(page);
};

// Fetch users when the component mounts
onMounted(() => fetchUsers());
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="p-6 text-gray-900">
            <a href="calculator">Calculator</a> <br class="break">
            <a href="tictactoe">Tictactoe</a> <br class="break">
            <a href="custom">Custom</a>
        </div>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1 class="text-xl font-bold mb-4">Users</h1>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            <!-- Cards for Users -->
                            <div
                                v-for="user in users"
                                :key="user.id"
                                class="p-4 bg-gray-100 border rounded-lg shadow"
                            >
                                <h2 class="text-lg font-semibold">
                                    ID: {{ user.id }}
                                </h2>
                                <p>Name: {{ user.name }}</p>
                                <p>Email: {{ user.email }}</p>
                            </div>
                        </div>

                        <!-- Pagination Controls -->
                        <div class="mt-6 flex justify-center space-x-4">
                            <button
                                v-if="pagination.currentPage > 1"
                                @click="changePage(pagination.currentPage - 1)"
                                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
                            >
                                Previous
                            </button>
                            <span>
                                Page {{ pagination.currentPage }} of
                                {{ pagination.lastPage }}
                            </span>
                            <button
                                v-if="pagination.currentPage < pagination.lastPage"
                                @click="changePage(pagination.currentPage + 1)"
                                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
                            >
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
.break {
  margin-top: 5%;
}
.grid {
  margin-top: 20px;
}
</style>

<template>
    <AppLayout>
        <template>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table id="adminUserTable" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">ID</th>
                                <th scope="col" class="px-6 py-3">Name</th>
                                <th scope="col" class="px-6 py-3">Email</th>
                                <th scope="col" class="px-6 py-3">Created At</th>
                                <th scope="col" class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(user, index) in users.data" :key="index"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ user.id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ user.name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ user.email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ time(user.created_at) }}
                                </td>
                                <td>
                                    <button type="button" @click="userEdit(user.id)"
                                        class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">
                                        Edit
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class=" w-full flex justify-end my-1">
                        <TailwindPagination class="flex justify-center mt-4 space-x-1" :data="users"
                            @pagination-change-page="getUsers">
                        </TailwindPagination>
                    </div>
                    <div class="pagination-info">
                        <p>Total data: {{ users.total }}</p>
                        <p>Current page: {{ users.current_page }}</p>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import { TailwindPagination } from 'laravel-vue-pagination';

export default {
    name: 'UserTablePage',
    props: {
        users: Object,
        require: true,
    },
    components: {
        AppLayout, TailwindPagination
    },
    mounted() {
        console.log(this.users);
    },
    methods: {
        getUsers(page) {
            this.$inertia.get(route('admin.user.index'), { page });
        },
        userEdit(id){
            this.$inertia.get(route('admin.user.edit',id))
        }
    },
}
</script>

<style lang="scss" scoped></style>

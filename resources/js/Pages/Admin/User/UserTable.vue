<template>
    <App>
        <BreadCrumb :titles=breadCrumbs></BreadCrumb>
        <div class="relative overflow-auto">
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
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Edit
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class=" w-full flex justify-end my-1">
            <TailwindPagination class="flex justify-center mt-4 space-x-1" :data="users" @pagination-change-page="getUsers">
            </TailwindPagination>
        </div>
    </App>
</template>

<script>
import App from '@/Layouts/App.vue';
import BreadCrumb from '@/Components/Application/BreadCrumb.vue';
import { TailwindPagination } from 'laravel-vue-pagination';
export default {
    name: 'UserTable',
    props: ['users','auth'],
    data() {
        return {
            breadCrumbs: [
                'Dashboard:route("dashboard"),fa-solid fa-house',
                'User Table:route("dashboard"),icon',
            ]
        }
    },
    components: {
        App, BreadCrumb, TailwindPagination
    },
    methods: {
        getUsers(page) {
            this.$inertia.get(route('admin.user.index'), { page })
        }
    },
    mounted () {
console.log(this.auth.user.all_teams);
    },
}
</script>

<style lang="scss" scoped></style>

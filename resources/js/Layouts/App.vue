<template>
    <div>
        <NavBarVue></NavBarVue>
        <SideBar></SideBar>
        <div class="p-4 sm:ml-64">
            <div class="p-4   rounded-lg dark:border-gray-700 mt-14">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
import NavBarVue from '../Components/Application/NavBar.vue'
import SideBar from '../Components/Application/SideBar.vue';
import { initFlowbite } from 'flowbite';
export default {
    name: 'App',
    components: {
        NavBarVue, SideBar
    },
    mounted() {
        initFlowbite();
    },
}
</script>

<style lang="scss" scoped></style>

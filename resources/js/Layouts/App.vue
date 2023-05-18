<template>
    <div>
        <NavBarVue></NavBarVue>
        <SideBar></SideBar>
        <div class="p-4 sm:ml-64">
            <slot></slot>
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
        NavBarVue,SideBar
    },
    mounted () {
        initFlowbite();
    },
}
</script>

<style lang="scss" scoped></style>

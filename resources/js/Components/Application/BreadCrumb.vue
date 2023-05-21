<template>
    <!-- Breadcrumb -->

    <!-- Breadcrumb -->
    <nav v-if="links.length > 0"
        class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700 mb-2"
        aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center" v-for="(link, index) in getBreadLinks" :key="index">
                <Link :href="link.link"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <div class="flex items-baseline">
                    <i class=" mr-1" :class="link.icon"></i>
                {{ link.name }}
                </div>
                </Link>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg v-if="links.length > 1" aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">{{ activeBread.name
                    }}</span>
                </div>
            </li>
        </ol>
    </nav>
</template>

<script>
import { Link } from '@inertiajs/vue3';
export default {
    name: 'BreadCrumb',
    props: {
        titles: {
            type: Array,
            default: []
        },
    },
    data() {
        return {
            links: []
        }
    },
    components: {
        Link,
    },
    computed: {
        getBreadLinks() {
            let myArray = this.links.slice();
            myArray.pop();
            return myArray;
        },
        activeBread() {
            let active = this.links[this.titles.length - 1];
            return active
        },
    },
    methods: {
        spliceLinks(string) {
            let myArray = string.split(":");
            let secondArray = myArray[1].split(',');
            let name = myArray[0];
            let icon = secondArray[1];
            let link = secondArray[0];
            if (link.includes('route(')) {
                link = eval(link);
            }
            return { name, icon, link };
        },
    },
    mounted() {
        this.titles.forEach(e => {
            this.links.push(this.spliceLinks(e))
        })
    },

}
</script>

<style lang="scss" scoped></style>

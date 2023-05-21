    <template>
        <App>
        <BreadCrumb :titles = breadCrumbs></BreadCrumb>
        </App>
    </template>

<script>
import BreadCrumb from '@/Components/Application/BreadCrumb.vue';
import App from '@/Layouts/App.vue';
export default {
    name: 'UserEdit',
    data() {
        return {
            breadCrumbs:[
                "UserEdit:route('dashboard'),fa-solid fa-house",
            ]
        }
    },
    components: {
        App,BreadCrumb
    },
}
</script>

<style lang="scss" scoped></style>

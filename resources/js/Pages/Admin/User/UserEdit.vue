    <template>
    <AppLayout>
        <template>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               {{  'ucfirst(basename(User/UserEdit))' }}
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <!--  Code Here  -->
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
export default {
    name: 'UserEdit',
    components: {
        AppLayout,
    },
}
</script>

<style lang="scss" scoped></style>
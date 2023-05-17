<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CrateAdminPage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:crate-admin-page {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin page';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $pageName = $this->argument('name');
        $fileName = ucfirst(basename($pageName)) . '.vue';
        $pathName = str_replace(basename($pageName),'',$pageName);
        $filePath = resource_path('js/Pages/Admin/').$pathName.$fileName;

        $stub = <<<STUB
        <template>
        <AppLayout>
            <template>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                   {{  'ucfirst(basename($pageName))' }}
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
    STUB;
        File::makeDirectory(dirname($filePath), 0755, true, true);
        File::put($filePath, $stub);
        $this->info("Admin page component created: $filePath");
    }

}

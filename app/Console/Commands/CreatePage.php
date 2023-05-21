<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreatePage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-page {name}';

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
        $name = ucfirst(basename($pageName));
        $fileName = $name . '.vue';
        $pathName = str_replace(basename($pageName), '', $pageName);
        $filePath = resource_path('js/Pages/') . $pathName . $fileName;

        if (File::exists($filePath)) {
            $this->error("The file already exists: $filePath");
            return;
        }

        $stub = <<<STUB
        <template>
            <App>
            <BreadCrumb :titles = breadCrumbs></BreadCrumb>
            </App>
        </template>

    <script>
    import BreadCrumb from '@/Components/Application/BreadCrumb.vue';
    import App from '@/Layouts/App.vue';
    export default {
        name: '{$name}',
        data() {
            return {
                breadCrumbs:[
                    "{$name}:route('dashboard'),fa-solid fa-house",
                ]
            }
        },
        components: {
            App,BreadCrumb
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

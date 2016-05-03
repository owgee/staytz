<?php namespace App\Console\Commands;

use File;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class JoshCrudRouteCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'crud:route';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Append crud name to custom_routes.php file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $crudName = strtolower($this->argument('name'));
        $crudNamePlural = str_plural($crudName);
        $crudNamePluralCap = ucwords($crudNamePlural);
        $crudController = $crudNamePluralCap."Controller";
        $path = $this->laravel['path'].'/Http/custom_routes.php';
        $content = "";

        //determine laravel version to add web middleware for 5.2+
        if (\App::VERSION() >= '5.2') {
            $content .= "Route::group(array('prefix' => 'admin', 'middleware' => ['web','SentinelAdmin']), function () {";
        } else {
            $content .= "Route::group(array('prefix' => 'admin', 'middleware' => 'SentinelAdmin'), function () {";
        }

        $content .= "Route::resource('$crudNamePlural', '$crudController');\n";
        $content .= "\tRoute::get('$crudNamePlural/{id}/delete', array('as' => 'admin.$crudNamePlural.delete', 'uses' => '$crudController@getDelete'));\n";
        $content .= "\tRoute::get('$crudNamePlural/{id}/confirm-delete', array('as' => 'admin.$crudNamePlural.confirm-delete', 'uses' => '$crudController@getModalDelete'));\n";
        $content .= "});";

        $bytesWritten = File::append($path, $content);
        if ($bytesWritten === false)
        {
            die("Couldn't write to the file.");
        }

        $this->info('cutom_routes.php modified successfully.');

    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'Name of the Crud.'],
        ];
    }

    /*
     * Get the console command options.
     *
     * @return array
     */

    protected function getOptions()
    {
        return [
            ['fields', null, InputOption::VALUE_OPTIONAL, 'The fields of the form.', null],
        ];
    }

}

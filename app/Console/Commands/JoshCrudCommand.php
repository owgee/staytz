<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class JoshCrudCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'crud:generate';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Crud Generator including controller, model, view';

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
		$name = ucwords(strtolower($this->argument('name')));
		if( $this->option('fields') ) {
			$fields = $this->option('fields');			
			
			$fillable_array = explode(',', $fields);
			foreach ($fillable_array as $value) {
				$data[] = preg_replace("/(.*?):(.*)/", "$1", trim($value));	
			}

			$comma_separeted_str = implode("', '", $data);
			$fillable = "['";
			$fillable .= $comma_separeted_str; 			
			$fillable .= "']"; 

			$this->call('crud:controller', ['name' => str_plural($name) . 'Controller', '--crud-name' => $name]);
			$this->call('crud:model', ['name' => str_singular($name), '--fillable' => $fillable]);
			$this->call('crud:migration', ['name' => str_plural(strtolower($name)), '--schema' => $fields]);
			$this->call('crud:view', ['name' => $name, '--fields' => $fields]);

			//add CrudName to left menu
			$this->call('crud:menu',['name' => $name]);

            //append crudName to routes.php
            $this->call('crud:route',['name' => $name]);
		} else {
			$this->call('make:controller', ['name' => $name.'Controller']);
			$this->call('make:model', ['name' => $name]);
		}
		// Commit Database migration
		$this->call('migrate');
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
			['fields', null, InputOption::VALUE_OPTIONAL, 'Fields of form & model.', null],
		];
	}

}

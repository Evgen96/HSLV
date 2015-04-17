<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);
		if ($this->app->environment() == 'local') {
			$this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
		}


        $this->app->alias('App\Welcome', 'User');
        //Event callback before creating object
        $this->app->resolving('App\Welcome', function($object, $app){
            echo "I just instantiated a " . get_class($object) . "\n<br>\n";
        });

        $this->app->bindShared('helloworld',
            function(){
                $implementation = new \App\Example;
                $implementation->message = 'Hello world, we meet again (time number %d)';
                return $implementation;
            });

	}

}

<?php

namespace Nijwel\MakeService\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class MakeService extends Command {
    protected $signature = 'make:service {name : The name of the service}';

    protected $description = 'Create a new service class';

    public function __construct() {
        parent::__construct();
    }

    public function handle() {
        $name = $this->argument( 'name' );
        $name = Str::studly( $name );
        $path = base_path( 'app/Services/' . $name . '.php' );

        if ( file_exists( $path ) ) {
            $this->error( 'Service already exists!' );
            return;
        }

        $stub = file_get_contents( __DIR__ . '/stubs/service.stub' );
        $stub = str_replace( '{{ class }}', $name, $stub );

        file_put_contents( $path, $stub );

        $this->info( 'Service created successfully.' );
    }
}

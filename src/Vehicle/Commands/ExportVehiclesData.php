<?php

namespace Fruitware\Vehicle\Commands;

use Illuminate\Console\Command;

class ExportVehiclesData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vehicle:export
                            {path? : Path where you want to export the CSV file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export CSV file so you can make changes.';

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
    public function handle()
    {
        $path = ($this->argument('path') ? $this->argument('path') : base_path('VEHICLES.csv'));

        copy(__DIR__.'/../Data/vehicles.csv', $path);

        $this->line("<info>Exported to:</info> ".$path);
    }
}

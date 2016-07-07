<?php

namespace Gerardojbaez\Vehicle\Commands;

use Illuminate\Console\Command;

class GenerateVehiclesData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vehicle:generate
                            {path? : Path to source CSV file - Leave blank to update from package CSV file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate vehicles data files from CSV.';

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
        $csvFile = ($this->argument('path') ? $this->argument('path') : __DIR__.'/../Data/vehicles.csv');
        $isFirstRow = true;
        $headers = [];
        $rowNum = 1;
        $makes = [];
        $models = [];
        $years = [];
        $options = [];

        if (file_exists($csvFile) AND ($handle = fopen($csvFile, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, ",")) !== FALSE)
            {
                if (empty($headers))
                {
                    $headers = array_flip($row);
                    continue;
                }

                // Define some variables...
                $makeAndModel = $row[$headers['make']].' '.$row[$headers['model']];
                $makeModelAndYear = $makeAndModel.' '.$row[$headers['year']];

                // Add Makes
                if ( ! array_key_exists($row[$headers['make']], $makes))
                {
                    $makes[$row[$headers['make']]] = [
                        'id' => $rowNum,
                        'name' => $row[$headers['make']]
                    ];
                }

                // Add Models
                if ( ! array_key_exists($makeAndModel, $models))
                {
                    $models[$makeAndModel] = [
                        'id' => $rowNum,
                        'make_id' => $makes[$row[$headers['make']]]['id'],
                        'name' => $row[$headers['model']],
                        'class' => $row[$headers['class']]
                    ];
                }

                // Add Years
                if ( ! array_key_exists($makeModelAndYear, $years))
                {
                    $years[$makeModelAndYear] = [
                        'id' => $rowNum,
                        'model_id' => $models[$makeAndModel]['id'],
                        'year' => $row[$headers['year']],
                    ];
                }

                $options[] = [
                    'id' => $rowNum,
                    'make_id' => (int) $makes[$row[$headers['make']]]['id'],
                    'model_id' => (int) $models[$makeAndModel]['id'],
                    'year_id' => (int) $years[$makeModelAndYear]['id'],
                    'cylinders' => (int) $row[$headers['cylinders']],
                    'displacement' => (float) $row[$headers['displacement']],
                    'drive' => $row[$headers['drive']],
                    'transmission' => $row[$headers['transmission']],
                ];

                $rowNum++;
            }

            fclose($handle);

            // Store files
            $this->generate('makes.json', array_values($makes));
            $this->generate('models.json', array_values($models));
            $this->generate('years.json', array_values($years));
            $this->generate('options.json', array_values($options));

            return;
        }
        
        $this->error("Cannot open file. Are you sure that {$csvFile} exists?");
    }

    /**
     * Generate files.
     *
     * @param string $fileName
     * @param array $data
     * @return void
     */
    protected function generate($fileName, $data)
    {
        $handle = fopen(__DIR__.'/../Data/'.$fileName, 'w');
        fwrite($handle, json_encode($data, JSON_PRETTY_PRINT));
        fclose($handle);

        $this->line("<info>Generated:</info> {$fileName}");
    }
}

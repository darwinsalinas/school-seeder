<?php

namespace App\Console\Commands;

use Database\Seeders\SchoolSeeder;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class SeedModel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:model {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    /**
     * Available models to seed
     * Register available models to seed with this command
     *
     * @var array<string>
     */
    protected $availableModels = [
        'school' => SchoolSeeder::class,
    ];

    /**
     * Execute the seeder for the specified model.
     *
     * @return int
     */
    public function handle()
    {
        $model = Str::lower($this->argument('model'));

        if ($this->isNotAvailableModel($model)) {
            $this->error("Model: {$model} is not available");
            $this->info("Available models: " . $this->getAvailableModelNamesString());

            return Command::FAILURE;
        }

        $this->info("Seeding data for model: {$model}");

        $this->call('db:seed', [
            '--class' => $this->availableModels[$model],
        ]);

        return Command::SUCCESS;
    }

    /**
     * Return an array of available model names
     *
     * @return array
     */
    private function getAvailableModelNamesArray()
    {
        $modelNames = array_keys($this->availableModels);

        return $modelNames;
    }

    /**
     * Return a string of available model names
     *
     * @return string
     */
    private function getAvailableModelNamesString()
    {
        $modelNames = $this->getAvailableModelNamesArray();

        return "[" . implode(', ', $modelNames) . "]";
    }

    /**
     * Check if the model is available
     *
     * @param string $model
     *
     * @return boolean
     */
    private function isAvailableModel($model)
    {
        $modelNames = array_keys($this->availableModels);

        return in_array($model, $modelNames);
    }

    /**
     * Check if the model is not available
     *
     * @param string $model
     *
     * @return boolean
     */
    private function isNotAvailableModel($model)
    {
        return !$this->isAvailableModel($model);
    }
}

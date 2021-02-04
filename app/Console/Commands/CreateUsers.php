<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Console\Command;

class CreateUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Users';

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
     * @return int
     */
    public function handle()
    {
        $faker = Factory::create();
        $limit = 100;
        $collection = (new \MongoDB\Client)->sanjaghPro->users;
        for ($i = 0; $i < $limit; $i++) {
            $insertResult = $collection->insertOne([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => $faker->password(10),
                'created_at' => Carbon::now()
            ]);
        }
        $this->line("Users created successfully.");
    }
}

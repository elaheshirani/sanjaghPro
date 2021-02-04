<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use MongoDB\BSON\ObjectId;

class UpdateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:user {id} {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update User';

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
        $collection = (new \MongoDB\Client)->test->users;
        $updateResult = $collection->updateOne(
            ['_id' => ObjectId($this->argument('id'))],
            ['$set' => ['name' => $this->argument('name')]]
        );
    }
}

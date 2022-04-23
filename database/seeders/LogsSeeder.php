<?php

namespace Database\Seeders;

use App\Models\Log;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $filename='logs';
        $path = storage_path() . "/json/${filename}.json"; // ie: /var/www/laravel/app/storage/json/filename.json
$logs = json_decode(file_get_contents($path), true);

foreach ($logs as $log) {

    Log::create([
        'type' => $log['type'],
        'user_id' => $log['user_id'],
        'revenue' => $log['revenue'],
        'time' => $log['time']
    ]);

}
    }
}

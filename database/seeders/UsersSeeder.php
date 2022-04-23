<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filename='users';
        $path = storage_path() . "/json/${filename}.json"; // ie: /var/www/laravel/app/storage/json/filename.json
$users = json_decode(file_get_contents($path), true);

foreach ($users as $key => $user) {

    User::create([
        'name' => $user['name'],
        'avatar' => $user['avatar'],
        'occupation' => $user['occupation'],
    ]);

}
    }
}

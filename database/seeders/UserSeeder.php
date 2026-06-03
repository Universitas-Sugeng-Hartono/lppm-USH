<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{

    public function run()
    {
        User::create([
            'name' => 'Imam Syafii',
            'email' => 'imamsyafii@itsk.ac.id',
            'password' => bcrypt('12345678'),
            'email_verified_at' => Carbon::now()->toDateTimeString(),
        ]);
    }
}

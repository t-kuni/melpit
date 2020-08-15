<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'id' => 1,
                'name' => 'めるぴっと太郎',
                'email' => 'test@test.test',
                'email_verified_at' => now(),
                'password' => Hash::make('testtest'),
            ]
        ];

        foreach ($users as $user)
        {
            factory(User::class)->create($user);
        }
    }
}

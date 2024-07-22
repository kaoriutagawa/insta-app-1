<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name'     => 'Andrei',
                'email'    => 'andrei@mail.com',
                'password' => Hash::make('aaaaaaaa'),
                'role_id'  => '1',
                'created_at'     => NOW(),
                'updated_at'    => NOW()

            ],
            [
                'name'     => 'Emma',
                'email'    => 'emma@mail.com',
                'password' => Hash::make('eeeeeeee'),
                'role_id'  => '2',
                'created_at'     => NOW(),
                'updated_at'    => NOW()
            ],
            [
                'name'     => 'Kenken',
                'email'    => 'kenken@mail.com',
                'password' => Hash::make('kkkkkkkk'),
                'role_id'  => '2',
                'created_at'     => NOW(),
                'updated_at'    => NOW()
            ]

        ];

        $this->user->insert($user);
    }
}

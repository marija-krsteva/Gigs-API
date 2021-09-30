<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Gig;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 0;
        while($i < 1000) {
            User::factory()
                ->count(10)
                ->has(
                    Company::factory()
                        ->count(rand(1,5))
                        ->has(
                            Gig::factory()
                                ->count(rand(1,10))
                        )
                )->create();
            $i++;
        }
    }
}

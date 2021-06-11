<?php

namespace Database\Seeders;

use App\Modules\KanBan\Core\Domain\Model\Owner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Owner::create(
            [
                'name' => 'Frederick William Edlim',
                'email' => 'frederickwilliamedlim@gmail.com',
                'password' => Hash::make('{kKZw%99k4DZ+WwU')
            ]
        );

        Owner::create(
            [
                'name' => 'Avei Liiara',
                'email' => 'araiilieva@gmail.com',
                'password' => Hash::make('g,)k{qvn$rkF;6p2')
            ]
        );
    }
}

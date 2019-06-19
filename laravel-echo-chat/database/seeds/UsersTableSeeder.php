<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create();
        
        factory(User::class)->create([
            'name'  => 'Ezequiel Burg',
            'email' => 'ezekiel_sci@hotmail.com'
        ]);

        factory(User::class)->create([
            'name'  => 'Ezequiel Goncavez',
            'email' => 'ezequiel.goncalvez@lotsystem.com.br'
        ]);
    }
}

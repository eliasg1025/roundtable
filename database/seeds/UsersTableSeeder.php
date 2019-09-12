<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 29)->create();

        App\User::create([
            'name' => 'Surandina Peru',
            'email' => 'contacto@surandinaperu.pe',
            'password' => bcrypt('12345678'),
            'ruc' => '20602926061',
            'legal_registration' => '20602926061',
            'phone' => '957181383',
            'profile_img' => '/img/empresa/empresa1-logo.png',
            'cover_img' => '/img/empresa/empresa1/productos/producto1.jpg',
            'description' => 'Producimos, cosechamos y empacamos alimentos 100% orgánicos siguiendo estrictos estándares de calidad, inocuidad y seguridad, en armonía con el medio ambiente y convirtiendo pequeñas comunidades en polos de desarrollo. De la costa y sierra del norte del Perú para el mundo.',
            'coins' => 40,
            'views' => 60,
            'type_id' => 1,
        ])->categories()->attach([1, 2, 3]);
    }
}

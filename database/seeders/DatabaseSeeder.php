<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Paquete;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the applications database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'gerente';
        $user->email = 'gerente@gmail.com';
        $user->password = '12345';
        $user->role = 'gerente';
        $user->save();

        $user = new User;
        $user->name = 'alan';
        $user->email = 'alan@gmail.com';
        $user->password = '12345';
        $user->role = 'gerente';
        $user->save();

        $user = new User;
        $user->name = 'empleado';
        $user->email = 'empleado@gmail.com';
        $user->password = '12345';
        $user->role = 'empleado';
        $user->save();

        $user = new User;
        $user->name = 'ivana';
        $user->email = 'ivana@gmail.com';
        $user->password = '12345';
        $user->role = 'empleado';
        $user->save();

        $user = new User;
        $user->name = 'angela';
        $user->email = 'angela@gmail.com';
        $user->password = '12345';
        $user->role = 'cliente';
        $user->save();

        $user = new User;
        $user->name = 'romeo';
        $user->email = 'romeo@gmail.com';
        $user->password = '12345';
        $user->role = 'cliente';
        $user->save();

        $paquete = new Paquete();
        $paquete->paquete = 'XV Años';
        $paquete->descripcion = 'tenia tu hermana';
        $paquete->precio = '200';
        $paquete->activo = '0';
        $paquete->save();
        
        $paquete = new Paquete();
        $paquete->paquete = 'Boda';
        $paquete->descripcion = 'no te cases';
        $paquete->precio = '500';
        $paquete->activo = '0';
        $paquete->save();
        
        $paquete = new Paquete();
        $paquete->paquete = 'Bautizo';
        $paquete->descripcion = 'jijiji';
        $paquete->precio = '300';
        $paquete->activo = '0';
        $paquete->save();
        
        $paquete = new Paquete();
        $paquete->paquete = 'Primera Comunion';
        $paquete->descripcion = 'eale';
        $paquete->precio = '800';
        $paquete->activo = '0';
        $paquete->save();

        // $evento = new Evento();
        // $evento->evento = 'Primera Comunion';
        // $evento->descripcion = 'eale';
        // $evento->precio = '800';
        // $evento->activo = '0';
        // $evento->save();
        
        
    }
}

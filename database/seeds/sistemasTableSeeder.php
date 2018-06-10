<?php

use Illuminate\Database\Seeder;
use App\sistema;

class sistemasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('sistemas')->delete();
  //	Añadimos	una	entrada	a	esta	tabla
      sistema::create(array('nombre'	=>	'testSystem',
        'identificacion'	=>	'1A2B3C4D5E',
        'descripcion'	=>	'Sistema de pruebas',
        'prioridad'	=>	5)
      );
      sistema::create(array('nombre'	=>	'testSystem2',
        'identificacion'	=>	'2A2B3C4D5E',
        'descripcion'	=>	'Sistema de pruebas 2',
        'prioridad'	=>	3)
      );
      sistema::create(array('nombre'	=>	'testSystem3',
        'identificacion'	=>	'3A2B3C4D5E',
        'descripcion'	=>	'Sistema de pruebas 3',
        'prioridad'	=>	2)
      );

      // $sistemas	=	DB::table('sistemas')->get();
      // echo $sistemas;

      // sistema::create(array('identificacion'	=>	'1A2B3C4D5E'));
      // sistema::create(array('descripcion'	=>	'Sistema de pruebas'));
      // sistema::create(array('prioridad'	=>	5));
    }
}

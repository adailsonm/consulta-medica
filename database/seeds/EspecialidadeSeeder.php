<?php

use Illuminate\Database\Seeder;

class EspecialidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('especialidades')->insert([
            'nome' => 'Clínico'
        ]);

        DB::table('especialidades')->insert([
            'nome' => 'Cardiologista'
        ]);

        DB::table('especialidades')->insert([
            'nome' => 'Oncologista'
        ]);
    }
}

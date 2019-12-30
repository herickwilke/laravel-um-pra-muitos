<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert(
            ['nome'         => 'Camiseta Polo', 
            'preco'         =>  100,
            'estoque'       => 3,
            'categoria_id'  => 1
            ]);
        DB::table('produtos')->insert(
            ['nome'         => 'Calça Jeans', 
            'preco'         =>  80,
            'estoque'       => 4,
            'categoria_id'  => 1
            ]);
        DB::table('produtos')->insert(
            ['nome'         => 'Camisa Esporte', 
            'preco'         =>  150,
            'estoque'       => 5,
            'categoria_id'  => 1
            ]);
        DB::table('produtos')->insert(
            ['nome'         => 'PC Gamer', 
            'preco'         =>  5000,
            'estoque'       => 10,
            'categoria_id'  => 2
            ]);
        DB::table('produtos')->insert(
            ['nome'         => 'Impressora HP Laserjet', 
            'preco'         =>  800,
            'estoque'       => 2,
            'categoria_id'  => 6
            ]);
        DB::table('produtos')->insert(
            ['nome'         => 'Perfume', 
            'preco'         =>  200,
            'estoque'       => 2,
            'categoria_id'  => 3
            ]);            
        DB::table('produtos')->insert(
            ['nome'         => 'Cama de Casal', 
            'preco'         =>  800,
            'estoque'       => 1,
            'categoria_id'  => 4
            ]);
        DB::table('produtos')->insert(
            ['nome'         => 'Guarda Roupa', 
            'preco'         =>  800,
            'estoque'       => 1,
            'categoria_id'  => 4
            ]);          
    }
}

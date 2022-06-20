<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\AreaSeeder;
use App\Model\Area;

class DatabaseSeeder extends Seeder
{
    /**実行したいSeederを登録*/
    private const SEEDERS = [
        AreaSeeder::class,
    ];
    
    
    
    /**
     * Seed the application's database.
     * 登録したSeederファイルの登録
     * @return void
     */
    public function run()
    {
        foreach(self::SEEDERS as $seeder){
            $this->call($seeder);
        }
    }
}

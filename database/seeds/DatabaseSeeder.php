<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('config')->insert([
            'name' => 'email',
            'value' => 'yermolaeva.lana@gmail.com'
        ]);
    }
}

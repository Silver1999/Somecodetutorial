<?php

use Illuminate\Database\Seeder;

class TasktableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task')->insert(
            [
                'name'    => Str::random(10),
                'counter' => 0,
            ]
        );
    }

}

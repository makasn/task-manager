<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            [
                'user_id' => 1,
                'name' => 'テスト'
            ],[
                'user_id' => 1,
                'name' => 'テスト2'
            ]
        ]);
    }
}

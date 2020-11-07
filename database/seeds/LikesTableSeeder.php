<?php

use App\Like;
use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            [ 'user_id' => 33,'target_user_id'=>29,'like_status'=>1 ],
            [ 'user_id' => 33,'target_user_id'=>25,'like_status'=>1 ],
            [ 'user_id' => 33,'target_user_id'=>27,'like_status'=>1 ],
        ];
        Like::insert($records);
    }
}

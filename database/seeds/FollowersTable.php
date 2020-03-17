<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class FollowersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $user = $users->first();
        $user_id = $user->id;

        //查找除第一个意外的所有id集合
        $followers = $users->slice($user_id);
        $follower_ids = $followers->pluck('id')->toArray();

        // 关注除一号用户以外的所有用户
        $user->follow($follower_ids);

        // 除了一号 其他所有人都来关注一
        foreach($followers as $follower){
            $follower->follow($user_id);
        }
    }
}

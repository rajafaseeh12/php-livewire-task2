<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserConnection;
class ConnectionsInCommonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $users=User::all()->take(20);
        foreach ($users as $key => $user) {
                    foreach($users->reverse() as $revuser ){
                    if($user->id<>$revuser->id){
                        UserConnection::create([
                        'user_id'=>$user->id, 
                        'connection_id'=>$revuser->id,
                        ]);
                    }
            }
        }
    }
}

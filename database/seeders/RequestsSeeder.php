<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserRequest;

class RequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=User::all()->take(10);
        foreach ($users as $key => $user) {
                    foreach($users->reverse() as $revuser ){
                    if($user->id <>$revuser->id){
                        UserRequest::create([
                        'request_to'=>$revuser->id,  
                        'request_from'=>$user->id,
                            'status'=>'pending'
                        ]);
                    }
            }
        }
    }
}

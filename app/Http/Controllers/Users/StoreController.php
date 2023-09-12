<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $user = User::where('email',$data['email'])->first();
        if ($user)
            return response(['error'=>'users with this email already exists'],403);
       else{
           $user = User::create(
               ['email'=>$data['email'],
                'name'=>$data['name'],
                'password'=>$data['password'],
                'password_confirmation'=>$data['password_confirmation']
               ]

           );
           $access_token = auth()->tokenById($user->id);
           return response(compact('access_token'));
       }


    }
}

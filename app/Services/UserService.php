<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;

class UserService{

    private $user ;

    public function __construct()
    {
        $this->user = new User();
    }

    public function getAll(Request $request)
    {
       return  $this->user->when($request->s,function($query) use ($request){
        $query->where('name','like','%'.$request->s.'%')
        ->orWhere('email','like','%'.$request->s.'%');
       })->paginate(5);
    }

    public function getUserData()
    {

    }
}

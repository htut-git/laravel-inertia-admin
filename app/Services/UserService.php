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

    public function getAllByPaginate(Request $request,$paginate = 5)
    {
       return  $this->user->when($request->s,function($query) use ($request){
        $query->where('name','like','%'.$request->s.'%')
        ->orWhere('email','like','%'.$request->s.'%');
       })->paginate($paginate);
    }

    public function getUserData()
    {

    }
}

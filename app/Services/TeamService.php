<?php

namespace App\Services;

use App\Models\Team;

class TeamService{
    private $team ;

    public function __construct()
    {
        $this->team = new Team();
    }

    public function getByName($name)
    {
       return  $this->team->where('name',$name)->first();
    }
}

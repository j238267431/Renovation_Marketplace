<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevelopersController extends Controller
{

    public function index()
    {
        $developers = $this->getDevelopers();
        return view('developers.index', ['developers' => $developers]);
    }
    private function getDevelopers()
    {
        return [
            ['id' => 1, 'name' => 'Ravshan', 'phone' => '+7 777 77 77', 'image' => 'img/house_1.jpeg'],
            ['id' => 2, 'name' => 'Dzhumshut', 'phone' => '+7 888 88 88', 'image' => 'img/house_2.jpeg'],
            ['id' => 3, 'name' => 'StroyDvor', 'phone' => '+7 999 99 99', 'image' => 'img/house_3.jpeg'],
        ];
    }
}





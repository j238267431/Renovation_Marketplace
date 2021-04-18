<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function hasCompany($user)
    {
        return true; // todo метод даёт ошибку Undefined offset: 0, надо исправить

      $companies = $user->companies;
      if($companies[0]->id){
        return true;
      }
      return false;
    }
}

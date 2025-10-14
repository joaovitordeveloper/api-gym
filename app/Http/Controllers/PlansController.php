<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Plans\PlansRegisterRequest;

class PlansController extends Controller
{
    public function index()
    {
        echo "aki";exit;
    }

    public function create(PlansRegisterRequest $plansRegisterRequest)
    {
        try {
            var_dump('Olá mundo');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

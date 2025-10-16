<?php

namespace App\Http\Controllers;

use App\Helpers\Messages;
use Illuminate\Http\Request;
use App\Services\PlansService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Plans\PlansRegisterRequest;
use App\Http\Requests\Plans\PlansUpdateRequest;

class PlansController extends Controller
{
    protected PlansService $plansService;

    public function __construct(PlansService $plansService)
    {
        $this->plansService = $plansService;
    }
    
    public function index()
    {
        echo "aki";exit;
    }

    public function create(PlansRegisterRequest $plansRegisterRequest)
    {
        try {
            $planId = $this->plansService->register($plansRegisterRequest);
            $return = [
                'user_id' => $planId,
                'message' => Messages::success('Plano')
            ];

            return $this->getResponseJson($return);
        } catch (\Throwable $th) {
            return $this->getResponseJson(['message' => $th->getMessage()], 400);
        }
    }

    public function update(PlansUpdateRequest $plansUpdateRequest)
    {
        try {
            $this->plansService->update($plansUpdateRequest);
            $return = [
                'message' => Messages::updated('Plano')
            ];

            return $this->getResponseJson($return);
        } catch (\Throwable $th) {
            return $this->getResponseJson(['message' => $th->getMessage()], 400);
        }
    }
}

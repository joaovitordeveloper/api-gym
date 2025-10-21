<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Helpers\Messages;
use Illuminate\Http\Request;
use App\Services\PlansService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Plans\PlansDeleteRequest;
use App\Http\Requests\Plans\PlansUpdateRequest;
use App\Http\Requests\Plans\PlansRegisterRequest;

class PlansController extends Controller
{
    protected PlansService $plansService;

    public function __construct(PlansService $plansService)
    {
        $this->plansService = $plansService;
    }
    
    /**
     * Método que busca todos os planos
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $planModel = new Plan();
            $plans = $this->plansService->selectAll($planModel);
            $return = [
                'planos' => $plans
            ];

            return $this->getResponseJson($return);
        } catch (\Exception $e) {
            return $this->getResponseJson(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * Método que cria os planos
     *
     * @param PlansRegisterRequest $plansRegisterRequest
     * @return JsonResponse
     */
    public function create(PlansRegisterRequest $plansRegisterRequest): JsonResponse
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

    /**
     * Metodo que atualiza os planos
     *
     * @param PlansUpdateRequest $plansUpdateRequest
     * @return JsonResponse
     */
    public function update(PlansUpdateRequest $plansUpdateRequest): JsonResponse
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

    /**
     * Método que remove os planos
     *
     * @param PlansDeleteRequest $request
     * @return JsonResponse
     */
    public function delete(PlansDeleteRequest $request): JsonResponse
    {
        try {
            $this->plansService->delete($request);
            $return = [
                'message' => Messages::deleted('Plano')
            ];
            return $this->getResponseJson($return);
        } catch (\Throwable $th) {
            return $this->getResponseJson(['message' => $th->getMessage()], 400);
        }
    }

    /**
     * Método de busca dos planos
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function search(Request $request): JsonResponse
    {
        try {
            $data = $request->input('data', []);
            $user = $this->plansService->search($data);
            $return = [
                'plan' => $user
            ];
            return $this->getResponseJson($return);
        } catch (\Throwable $th) {
            return $this->getResponseJson(['message' => $th->getMessage()], 400);
        }
    }
}

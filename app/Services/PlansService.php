<?php

namespace App\Services;

use Exception;
use App\Models\Plan;
use App\Services\BaseService;
use App\Http\Requests\Plans\PlansDeleteRequest;
use App\Http\Requests\Plans\PlansUpdateRequest;
use App\Http\Requests\Plans\PlansRegisterRequest;

/**
 * @author João Vitor Botelho <developer.joaovitor@gmail.com>
 */
class PlansService extends BaseService
{
    /**
     * Método de cadastro dos planos
     *
     * @param PlansRegisterRequest $plansRegisterRequest
     * @return void
     */
    public function Register(PlansRegisterRequest $plansRegisterRequest)
    {
        $data = $plansRegisterRequest['data'];
        $plan = Plan::create([
            'name' => $data['name'],
            'value' => $data['value'],
            'limit_users' => $data['limit_users'],
        ]);

        return $plan->id;
    }

    /**
     * Método que atualiza os planos
     *
     * @param PlansUpdateRequest $plansUpdateRequest
     * @return void
     */
    public function update(PlansUpdateRequest $plansUpdateRequest)
    {
        $data = $plansUpdateRequest['data'];
        $plan = Plan::find($data['id']);

        if (!$plan) {
            throw new Exception('Plano não encontrado!');
        }

        $plan->update([
            'name' => $data['name'],
            'value' => $data['value'],
            'limit_users' => $data['limit_users'],
        ]);
    }

    /**
     * método que remove os planos
     *
     * @param PlansDeleteRequest $plansDeleteRequest
     * @return void
     */
    public function delete(PlansDeleteRequest $plansDeleteRequest)
    {
        $data = $plansDeleteRequest['data'];
        $plan = Plan::find($data['id']);

        if (!$plan) {
            throw new Exception('Plano não encontrado!');
        }
        
        if (!$plan->delete()) {
            throw new Exception('Ocorreu um erro ao tentar remover o plano.');
        }
    }

    /**
     * Metodo que busca o plano
     *
     * @param array $data
     * @return array
     */
    public function search(array $data)
    {
        return Plan::query()
            ->when(isset($data['name']), function ($query) use ($data) {
                $query->where('name', 'like', '%' . $data['name'] . '%');
            })
            ->when(isset($data['value']), function ($query) use ($data) {
                $query->where('value', 'like', '%' . $data['value'] . '%');
            })
            ->when(isset($data['limit_users']), function ($query) use ($data) {
                $query->where('limit_users', $data['limit_users']);
            })
            ->get();
    }
}

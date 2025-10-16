<?php

namespace App\Services;

use Exception;
use App\Models\Plan;
use App\Services\BaseService;
use App\Http\Requests\Plans\PlansUpdateRequest;
use App\Http\Requests\Plans\PlansRegisterRequest;

class PlansService extends BaseService
{
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

    public function update(PlansUpdateRequest $plansUpdateRequest)
    {
        $data = $plansUpdateRequest['data'];
        $plan = Plan::find($data['id']);

        if (!$plan) {
            throw new Exception('Plan not found!');
        }

        $plan->update([
            'name' => $data['name'],
            'value' => $data['value'],
            'limit_users' => $data['limit_users'],
        ]);
    }
}

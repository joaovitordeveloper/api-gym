<?php

namespace App\Http\Controllers;

use App\Helpers\Messages;
use App\Http\Controllers\Controller;
use App\Services\InstitutionsService;
use App\Http\Requests\Institutions\InstitutionsRegisterRequest;

class InstitutionsController extends Controller
{
    protected InstitutionsService $institutionsService;

    public function __construct(InstitutionsService $institutionsService)
    {
        $this->institutionsService = $institutionsService;
    }

    public function create(InstitutionsRegisterRequest $institutionsRegisterRequest)
    {
        try {
            $institutionId = $this->institutionsService->register($institutionsRegisterRequest);
            $return = [
                'institution_id' => $institutionId,
                'message' => Messages::success('Instituição')
            ];

            return $this->getResponseJson($return);
        } catch (\Exception $e) {
            return $this->getResponseJson(['message' => $e->getMessage()], 400);
        }
    }
}

<?php

namespace App\Services;

use Exception;
use App\Models\Institution;
use App\Services\BaseService;
use App\Models\InstitutionModel;
use App\Http\Requests\Institutions\InstitutionsDeleteRequest;
use App\Http\Requests\Institutions\InstitutionsUpdateRequest;
use App\Http\Requests\Institutions\InstitutionsRegisterRequest;

class InstitutionsService extends BaseService
{
    /**
     * Method for institution creation
     *
     * @param InstitutionsRegisterRequest $data
     * @return int
     */
    public function register(InstitutionsRegisterRequest $institutionsRegisterRequest)
    {
        $data = $institutionsRegisterRequest['data'];
        $institution = Institution::create([
            'name' => $data['name'],
            'document' => $data['document'],
            'document_type' => $data['document_type'],
            'address' => $data['address'],
            'complement' => $data['complement'],
            'zip_code' => $data['zip_code'],
        ]);

        return $institution->id;
    }

    public function update(InstitutionsUpdateRequest $institutionsUpdateRequest)
    {
        $data = $institutionsUpdateRequest['data'];
        $institution = Institution::find($data['id']);

        if (!$institution) {
            throw new Exception('Instituição não encontrado!');
        }

        $institution->update([
            'name' => $data['name'],
            'document' => $data['document'],
            'document_type' => $data['document_type'],
            'address' => $data['address'],
            'complement' => $data['complement'],
            'zip_code' => $data['zip_code'],
        ]);
    }

    /**
     * método que remove as instituições
     *
     * @param InstitutionsDeleteRequest $institutionsDeleteRequest
     * @return void
     */
    public function delete(InstitutionsDeleteRequest $institutionsDeleteRequest)
    {
        $data = $institutionsDeleteRequest['data'];
        $institution = Institution::find($data['id']);

        if (!$institution) {
            throw new Exception('Instituição não encontrada!');
        }
        
        if (!$institution->delete()) {
            throw new Exception('Ocorreu um erro ao tentar remover o instituição.');
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
        return Institution::query()
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
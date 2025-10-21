<?php

namespace App\Services;

class BaseService
{
    /**
     * Método que retorna todos os dados da model passada
     *
     * @param [type] $model
     * @return void
     */
    public function selectAll($model)
    {
        return $model::all();
    }
}

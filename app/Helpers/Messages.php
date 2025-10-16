<?php

namespace App\Helpers;

/**
 * @author João Vitor Botelho <developer.joaovitor@gmail.com>
 */
class Messages
{
    /**
     * @param string $entity
     * @return string
     */
    public static function success($entity = 'Registro')
    {
        return "{$entity} criado com sucesso!";
    }

    /**
     * @param string $entity
     * @return string
     */
    public static function updated($entity = 'Registro')
    {
        return "{$entity} atualizado com sucesso!";
    }

    /**
     * @param string $entity
     * @return string
     */
    public static function deleted($entity = 'Registro')
    {
        return "{$entity} removido com sucesso!";
    }

    /**
     * @param string $entity
     * @return string
     */
    public static function error($entity = 'registro')
    {
        return "Ocorreu um erro ao processar o {$entity}.";
    }

    /**
     * @param string $entity
     * @return string
     */
    public static function custom($message)
    {
        return $message;
    }
}

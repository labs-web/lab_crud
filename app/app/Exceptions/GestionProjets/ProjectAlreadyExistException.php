<?php

namespace App\Exceptions\GestionProjets;

use App\Exceptions\BusinessException;

class ProjectAlreadyExistException extends BusinessException
{
    public static function createProject()
    {
        return new self(__('GestionProjets/projet/message.createProjectException'));
    }
}
<?php

namespace App\Exceptions\GestionProjets;

use App\Exceptions\BusinessException;

class TagAlreadyExistException extends BusinessException
{
    public static function createTag()
    {
        return new self(__('GestionProjets/tag/message.createTagException'));
    }
}
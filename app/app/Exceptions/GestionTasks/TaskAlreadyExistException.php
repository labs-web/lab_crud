<?php

namespace App\Exceptions\GestionTasks;

use App\Exceptions\BusinessException;

class TaskAlreadyExistException extends BusinessException
{
    public static function createTask()
    {
        return new self(__('GestionTasks/task/message.createTaskException'));
    }
}
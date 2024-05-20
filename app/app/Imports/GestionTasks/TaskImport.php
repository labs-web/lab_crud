<?php

namespace App\Imports\GestionTasks;

use Carbon\Carbon;
use App\Models\GestionTasks\Task;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TaskImport implements ToModel, WithHeadingRow
{
    // Implement the method to check if a task already exists in the application
    private function taskExists(array $row): bool
    {
        // Logic to check if a task with the same attributes exists in the database
        // For example, you can check if a task with the same name and dates already exists
        $existingTask = Task::where('nom', $row['nom'])
            ->exists();
        return $existingTask;
    }

    // Implement the model() method to import tasks
    public function model(array $row)
    {
        // Check if the task already exists in the application
        if ($this->taskExists($row)) {
            // Task already exists, skip importing it
            return null;
        }

        // Task doesn't exist, proceed with importing it
        return new Task([
            'nom' => $row["nom"],
            'description' => $row["description"],
            'project_id' => $row["project_id"],
        ]);
    }

    // Implement the validate() method to validate row data (as shown in your original code)
    // ...
}
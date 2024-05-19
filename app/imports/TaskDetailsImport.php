<?php 


namespace App\Imports;

use App\Models\TaskDetail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TaskDetailsImport implements ToModel, WithHeadingRow
{
    private $taskId;

    public function __construct($taskId)
    {
        $this->taskId = $taskId;
    }

    public function model(array $row)
    {
        return new TaskDetail([
            'task_id' => $this->taskId,
            'questions' => $row['question'],
            'answers' => $row['answers'],
        ]);
    }
}


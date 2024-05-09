<?php

namespace App\Http\Controllers\GestionTasks;

use App\Exceptions\GestionTasks\ProjectAlreadyExistException;
use App\Http\Controllers\Controller;
use App\Imports\GestionTasks\TaskImport;
use App\Models\GestionTasks\Task;
use Illuminate\Http\Request;
use App\Http\Requests\GestionTasks\taskRequest;
use App\Repositories\GestionTasks\TaskRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use App\Exports\GestionTasks\taskExport;
use Maatwebsite\Excel\Facades\Excel;

class TaskController extends AppBaseController
{
    protected $projectRepository;
    public function __construct(TaskRepository $taskRepository)
    {
        $this->projectRepository = $taskRepository;
    }

    public function index(Request $request)
    {
       
        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $searchQuery = str_replace(' ', '%', $searchValue);
                $projectData = $this->projectRepository->searchData($searchQuery);
                return view('GestionTasks.task.index', compact('projectData'))->render();
            }
        }
        $projectData = $this->projectRepository->paginate();
        return view('GestionTasks.task.index', compact('projectData'));
    }


    public function create()
    {
        $dataToEdit = null;
        return view('GestionTasks.task.create', compact('dataToEdit'));
    }


    public function store(taskRequest $request)
    {

        try {
            $validatedData = $request->validated();
            $this->projectRepository->create($validatedData);
            return redirect()->route('tasks.index')->with('success', 'Le task a été ajouté avec succès.');

        } catch (ProjectAlreadyExistException $e) {
            return back()->withInput()->withErrors(['project_exists' => __('GestionTasks/task/message.createProjectException')]);
        } catch (\Exception $e) {
            return abort(500);
        }
    }


    public function show(string $id)
    {
        $fetchedData = $this->projectRepository->find($id);
        return view('GestionTasks.task.show', compact('fetchedData'));
    }


    public function edit(string $id)
    {
        $dataToEdit = $this->projectRepository->find($id);
        $dataToEdit->date_debut = Carbon::parse($dataToEdit->date_debut)->format('Y-m-d');
        $dataToEdit->date_de_fin = Carbon::parse($dataToEdit->date_de_fin)->format('Y-m-d');

        return view('GestionTasks.task.edit', compact('dataToEdit'));
    }


    public function update(taskRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $this->projectRepository->update($id, $validatedData);
        return redirect()->route('tasks.index', $id)->with('success', 'Le task a été modifier avec succès.');
    }


    public function destroy(string $id)
    {
        $this->projectRepository->destroy($id);
        $projectData = $this->projectRepository->paginate();
        return view('GestionTasks.task.index', compact('projectData'))->with('succes', 'Le task a été supprimer avec succés.');
    }


    public function export()
    {
        $projects = task::all();

        return Excel::download(new TaskExport($projects), 'task_export.xlsx');
    }


    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new TaskImport, $request->file('file'));
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('tasks.index')->withError('Le symbole de séparation est introuvable. Pas assez de données disponibles pour satisfaire au format.');
        }
        return redirect()->route('tasks.index')->with('success', 'Task a ajouté avec succès');
    }
}
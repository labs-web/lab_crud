<?php

namespace App\Http\Controllers\GestionProjets;

use App\Exceptions\GestionProjets\ProjectAlreadyExistException;
use App\Http\Controllers\Controller;
use App\Imports\GestionProjets\ProjetImport;
use App\Models\GestionProjets\Projet;
use Illuminate\Http\Request;
use App\Http\Requests\GestionProjets\projetRequest;
use App\Repositories\GestionProjets\ProjetRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use App\Exports\GestionProjets\projetExport;
use App\Repositories\GestionProjets\TagRepository;
use Maatwebsite\Excel\Facades\Excel;

class ProjetController extends AppBaseController
{
    protected $projectRepository;
    public function __construct(ProjetRepository $projetRepository)
    {
        $this->projectRepository = $projetRepository;
    }

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $searchQuery = str_replace(' ', '%', $searchValue);
                $projectData = $this->projectRepository->searchData($searchQuery);
                return view('GestionProjets.projet.index', compact('projectData'))->render();
            }
        }
        $projectData = $this->projectRepository->paginate();

        return view('GestionProjets.projet.index', compact('projectData'));
    }


    public function create(TagRepository $tagRepository)
    {
        $dataToEdit = null;
        $tags = $tagRepository->all();
        return view('GestionProjets.projet.create', compact('dataToEdit', 'tags'));
    }


    public function store(projetRequest $request)
    {

        try {
            $validatedData = $request->validated();
            $this->projectRepository->create($validatedData);
            return redirect()->route('projets.index')->with('success', __('GestionProjets/projet.singular') . ' ' . __('app.addSucées'));
        } catch (ProjectAlreadyExistException $e) {
            return back()->withInput()->withErrors(['project_exists' => __('GestionProjets/projet.singular') . ' ' . __('app.existdeja')]);
        } catch (\Exception $e) {
            return abort(500);
        }
    }


    public function show(string $id)
    {
        $fetchedData = $this->projectRepository->find($id);
        return view('GestionProjets.projet.show', compact('fetchedData'));
    }


    public function edit(string $id,TagRepository $tagRepository)
    {
        $dataToEdit = $this->projectRepository->find($id);
        $dataToEdit->date_debut = Carbon::parse($dataToEdit->date_debut)->format('Y-m-d');
        $dataToEdit->date_de_fin = Carbon::parse($dataToEdit->date_de_fin)->format('Y-m-d');
        $tags = $tagRepository->all();

        return view('GestionProjets.projet.edit', compact('dataToEdit','tags'));
    }


    public function update(projetRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $this->projectRepository->update($id, $validatedData);
        return redirect()->route('projets.index', $id)->with('success', __('GestionProjets/projet.singular') . ' ' . __('app.updateSucées'));
    }


    public function destroy(string $id)
    {
        $this->projectRepository->destroy($id);
        return redirect()->route('projets.index')->with('success', __('GestionProjets/projet.singular') . ' ' . __('app.deleteSucées'));
    }


    public function export()
    {
        $projects = projet::all();

        return Excel::download(new ProjetExport($projects), 'projet_export.xlsx');
    }


    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new ProjetImport, $request->file('file'));
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('projets.index')->withError('Le symbole de séparation est introuvable. Pas assez de données disponibles pour satisfaire au format.');
        }
        return redirect()->route('projets.index')->with('success', __('GestionProjets/projet.singular') . ' ' . __('app.addSucées'));
    }
}

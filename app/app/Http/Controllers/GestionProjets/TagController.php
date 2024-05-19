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
use Maatwebsite\Excel\Facades\Excel;

class TagController extends AppBaseController
{
    protected $tagRepository;
    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function index(Request $request)
    {
       
        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $searchQuery = str_replace(' ', '%', $searchValue);
                $projectData = $this->tagRepository->searchData($searchQuery);
                return view('GestionProjets.tag.index', compact('projectData'))->render();
            }
        }
        $projectData = $this->tagRepository->paginate();
        return view('GestionProjets.tag.index', compact('projectData'));
    }


    public function create()
    {
        $dataToEdit = null;
        return view('GestionProjets.tag.create', compact('dataToEdit'));
    }


    public function store(projetRequest $request)
    {

        try {
            $validatedData = $request->validated();
            $this->tagRepository->create($validatedData);
            return redirect()->route('tags.index')->with('success',__('GestionProjets/tag.singular').' '.__('app.addSucées'));

        } catch (ProjectAlreadyExistException $e) {
            return back()->withInput()->withErrors(['tag_exists' => __('GestionProjets/projet/message.createProjectException')]);
        } catch (\Exception $e) {
            return abort(500);
        }
    }


    public function show(string $id)
    {
        $fetchedData = $this->tagRepository->find($id);
        return view('GestionProjets.tag.show', compact('fetchedData'));
    }


    public function edit(string $id)
    {
        $dataToEdit = $this->tagRepository->find($id);
        $dataToEdit->date_debut = Carbon::parse($dataToEdit->date_debut)->format('Y-m-d');
        $dataToEdit->date_de_fin = Carbon::parse($dataToEdit->date_de_fin)->format('Y-m-d');

        return view('GestionProjets.tag.edit', compact('dataToEdit'));
    }


    public function update(projetRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $this->tagRepository->update($id, $validatedData);
        return redirect()->route('tags.index', $id)->with('success',__('GestionProjets/tag.singular').' '.__('app.updateSucées'));
    }


    public function destroy(string $id)
    {
        $this->tagRepository->destroy($id);
        return redirect()->route('tags.index')->with('success', 'Le tag a été supprimer avec succés.');
    }


    public function export()
    {
        $projects = projet::all();

        return Excel::download(new ProjetExport($projects), 'tag_export.xlsx');
    }


    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new ProjetImport, $request->file('file'));
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('tags.index')->withError('Le symbole de séparation est introuvable. Pas assez de données disponibles pour satisfaire au format.');
        }
        return redirect()->route('tags.index')->with('success',__('GestionProjets/tag.singular').' '.__('app.addSucées'));
    }
}
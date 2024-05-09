<?php
namespace App\Repositories\GestionProjets;

use App\Models\GestionProjets\Projet;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\GestionProjets\ProjectAlreadyExistException;

class ProjetRepository extends BaseRepository
{
    protected $model;

    protected $fieldsSearchable = [
        'name'
    ];
    
    public function getFieldsSearchable(): array
    {
        return $this->fieldsSearchable;
    }

    public function __construct()
    {
        parent::__construct(new Projet());
    }

    public function create(array $data)
    {
        $nom = $data['nom'];

        $existingProject = Projet::where('nom', $nom)->exists();

        if ($existingProject) {
            throw ProjectAlreadyExistException::createProject();
        } else {
            return parent::create($data);
        }
    }
    
    public function searchData($searchableData, $perPage = 4)
    {
        return $this->model->where(function ($query) use ($searchableData) {
            $query->where('nom', 'like', '%' . $searchableData . '%')
                ->orWhere('description', 'like', '%' . $searchableData . '%');
        })->paginate($perPage);
    }
}

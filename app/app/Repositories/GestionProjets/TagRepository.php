<?php
namespace App\Repositories\GestionProjets;

use App\Models\GestionProjets\Tag;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\GestionProjets\TagAlreadyExistException;

/**
 * Classe TagRepository qui gère la persistance des tags dans la base de données.
 */
class TagRepository extends BaseRepository
{
    /**
     * Les champs de recherche disponibles pour les tags.
     *
     * @var array
     */
    protected $fieldsSearchable = [
        'name'
    ];

    /**
     * Renvoie les champs de recherche disponibles.
     *
     * @return array
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldsSearchable;
    }

    /**
     * Constructeur de la classe TagRepository.
     */
    public function __construct()
    {
        parent::__construct(new Tag());
    }

    /**
     * Crée un nouveau tag.
     *
     * @param array $data Données du tag à créer.
     * @return mixed
     * @throws TagAlreadyExistException Si le tag existe déjà.
     */
    public function create(array $data)
    {
        $nom = $data['nom'];

        $existingTag =  $this->model->where('nom', $nom)->exists();

        if ($existingTag) {
            throw TagAlreadyExistException::createTag();
        } else {
            return parent::create($data);
        }
    }

    /**
     * Recherche les tag correspondants aux critères spécifiés.
     *
     * @param mixed $searchableData Données de recherche.
     * @param int $perPage Nombre d'éléments par page.
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function searchData($searchableData, $perPage = 4)
    {
        return $this->model->where(function ($query) use ($searchableData) {
            $query->where('nom', 'like', '%' . $searchableData . '%')
                ->orWhere('description', 'like', '%' . $searchableData . '%');
        })->paginate($perPage);
    }
}

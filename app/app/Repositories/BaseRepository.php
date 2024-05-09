<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

/**
 * TODO : comments
 */
abstract class BaseRepository implements RepositoryInterface
{

    /**
     * TODO : comments
     */
    protected $model;

    /**
     * TODO : comments
     */
    protected $paginationLimit = 10;

    /**
     * TODO : comments
     */
    abstract public function getFieldsSearchable(): array;

    /**
     * TODO : comments
     */
    public function __construct(Model $model){
        $this->model = $model;
    }

    /**
     * TODO : comments
     * @param 
     */
    public function paginate($search = [], $perPage = 0, array $columns = ['*']): LengthAwarePaginator
    {
        if( $perPage == 0) { $perPage = $this->paginationLimit;}

        $query = $this->allQuery($search);

        if (is_null($perPage)) {
            $perPage = $this->paginationLimit;
        }
        return $query->paginate($perPage, $columns);
    }

    /**
     * TODO : comments
     */
    public function allQuery($search = [], int $skip = null, int $limit = null): Builder
    {
        $query = $this->model->newQuery();

        if (is_array($search)) {
            if (count($search)) {
                foreach ($search as $key => $value) {
                    if (in_array($key, $this->getFieldsSearchable())) {
                        if (!is_null($value)) {
                            $query->where($key, $value);
                        }
                    }
                }
            }
        } else {
            if (!is_null($search)) {
                foreach ($this->getFieldsSearchable() as $searchKey) {
                    $query->orWhere($searchKey, 'LIKE', '%' . $search . '%');
                }
            }
        }

        if (!is_null($skip)) {
            $query->skip($skip);
        }

        if (!is_null($limit)) {
            $query->limit($limit);
        }

        return $query;
    }

    /**
     * TODO : comments
     */
    public function searchData($searchableData, $perPage = 0)
    {   
        if( $perPage == 0) { $perPage = $this->paginationLimit;}
        $query =  $this->allQuery($searchableData);
    }

    /**
     * TODO : comments
     */
    public function all(array $search = [], int $skip = null, int $limit = null, array $columns = ['*']): Collection
    {
        $query = $this->allQuery($search, $skip, $limit);

        return $query->get($columns);
    }

    /**
     * TODO : comments
     */
    public function find(int $id, array $columns = ['*']){
        return $this->model->find($id, $columns);
    }

    /**
     * TODO : comments
     */
    public function create(array $data){
        return $this->model->create($data);
    }

    /**
     * TODO : comments
     */
    public function update($id, array $data)
    {
        $record = $this->model->find($id);

        if (!$record) {
            return false;
        }

        return $record->update($data);
    }

    /**
     * TODO : comments
     */
    public function destroy($id){
        $record = $this->model->find($id);
        return $record->delete();
    }


}

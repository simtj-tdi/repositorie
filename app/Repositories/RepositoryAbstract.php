<?php


namespace App\Repositories;


use App\Repositories\Exceptions\NoEntityDefined;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class RepositoryAbstract implements RepositoryInterface
{
    protected $entity;

    public function __construct()
    {
        $this->entity = $this->resolveEntity();
    }

//    public function all()
//    {
//        return $this->entity->get();
//    }
//
//    public function find($id)
//    {
//        $model = $this->entity->find($id);
//
//        if (!$model) {
//            throw (new ModelNotFoundException)->setModel(
//                get_class($this->entity->getModel()), $id
//            );
//        }
//
//        return $model;
//    }
//
//    public function findWhere($column, $value)
//    {
//        return $this->entity->where($column, $value)->get();
//    }
//
//    public function findWhereFirst($column, $value)
//    {
//        $model = $this->entity->where($column, $value)->first();
//
//        if (!$model) {
//            throw (new ModelNotFoundException)->setModel(
//                get_class($this->entity->getModel())
//            );
//        }
//
//        return $model;
//    }
//
//    public function paginate($perPage = 10)
//    {
//        return $this->entity->paginate($perPage);
//    }
//
//    public function create(array $properties)
//    {
//        return $this->entity->create($properties);
//    }
//
//    public function update($id, array $properties)
//    {
//        return $this->find($id)->update($properties);
//    }
//
//    public function delete($id)
//    {
//        return $this->find($id)->delete();
//    }
//
//
//
    protected function resolveEntity()
    {
        if (!method_exists($this, 'entity')) {
            throw new NoEntityDefined();
        }

        return app()->make($this->entity());
    }


}

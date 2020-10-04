<?php


namespace App\Repositories;


use App\Customer;

class CustomerRepository extends RepositoryAbstract implements CustomerRepositoryInterface
{
    public function entity()
    {
        return Customer::class;
    }

    public function all()
    {
        return $this->entity::orderBy('name')
            ->where('active', 1)
            ->with('user')
            ->get();

    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }

    public function findWhere($column, $value)
    {
        // TODO: Implement findWhere() method.
    }

    public function findWhereFirst($column, $value)
    {
        // TODO: Implement findWhereFirst() method.
    }

    public function paginate($perPage = 10)
    {
//        vendor/laravel/framework/src/Illuminate/Pagination/Paginator.php
        return $this->entity::orderBy('name')
            ->where('active', 1)
            ->with('user')
            ->paginate($perPage);

    }

    public function create(array $properties)
    {
        // TODO: Implement create() method.
    }

    public function update($id, array $properties)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

//    public function all()
//    {
//        return Customer::orderBy('name')
//            ->where('active', 1)
//            ->with('user')
//            ->get()
//            ->map->format();
//
////        return Customer::orderBy('name')
////            ->where('active', 1)
////            ->with('user')
////            ->get()
////            ->map(function ($customer) {
////                return $customer->format();
////            });
//
//    }
    public function format2($customer)
    {
        return $customer->map(function ($item) {
            return [
                'customer_id' => $item->id,
                'name' => $item->name,
                'create_by' => $item->user->email,
                'last_updated' => $item->updated_at->diffForHumans()
            ];
        });
    }

    public function attributes()
    {

        return \Schema::getColumnListing($this->entity->getTable());

    }
}

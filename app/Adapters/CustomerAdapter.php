<?php


namespace App\Adapters;


use App\Customer;
use Illuminate\Support\Collection;

class CustomerAdapter implements CustomerAdapterInterface
{
    protected $customer;

    public function __construct( $customer)
    {
//        dd(get_class($customer));
//        dd($customer instanceof \Illuminate\Pagination\LengthAwarePaginator);
//        dd($customer instanceof Collection);

        $this->customer = $customer;
    }

    public function format()
    {
        return $this->customer->map(function($item) {
            return [
                'customer_id' => $item->id,
                'name' => $item->name,
                'create_by' => $item->user->email,
                'last_updated' => $item->updated_at->diffForHumans()
            ];
        });
    }
}

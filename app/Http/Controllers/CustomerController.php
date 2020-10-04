<?php

namespace App\Http\Controllers;

use App\Adapters\CustomerAdapter;
use App\Adapters\CustomerAdapterInterface;
use App\Repositories\CustomerRepositoryInterface;
use Schema;
use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    //
    private  $customerRepository;
    private  $customerAdapter;

    public function __construct(CustomerRepositoryInterface $customerRepository, CustomerAdapterInterface $customerAdapter)
    {
        $this->customerRepository = $customerRepository;
        $this->customerAdapter = $customerAdapter;
    }

    public function test()
    {
        //dd(Schema::getColumnListing(($this->customerRepository->entity())->getTable()));
        dd($this->customerRepository->attributes());
        exit;
        $customers = $this->customerRepository->all();
        $a = $this->customerRepository->format2($customers);
        dd($a);
    }

    public function index()
    {
//        $customers = $this->customerRepository->all();
        $customers = $this->customerRepository->paginate();
        $c = new CustomerAdapter($customers);
        return $c->format();

//        return $customers;
//        return view('welcome');
    }

    public function show($customerId)
    {
        $customer = $this->customerRepository->findById($customerId);

        return $customer;
    }

    public function update($customerId)
    {
        $this->customerRepository->update($customerId);

        return redirect('/customer/'.$customerId);
    }

    public function destory($customerId)
    {
        $this->customerRepository->destory($customerId);

        return redirect('/');
    }

}

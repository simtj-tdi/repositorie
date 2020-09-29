<?php

namespace App\Http\Controllers;

use App\Adapters\CustomerAdapter;
use App\Repositories\CustomerRepositoryInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    private  $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
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

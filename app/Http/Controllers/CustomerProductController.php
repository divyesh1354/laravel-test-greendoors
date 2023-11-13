<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerResource;
use App\Http\Resources\CustomerResourceCollection;
use App\Models\Customer;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CustomerProductController extends Controller
{
    public function index()
    {
        return view('customer-product.index');
    }

    /**
     * @return CustomerResourceCollection
     */
    public function fetchCustomerProducts(): CustomerResourceCollection
    {
        $customers = Customer::withCount('products')->paginate(10);

        return new CustomerResourceCollection($customers);
    }

}

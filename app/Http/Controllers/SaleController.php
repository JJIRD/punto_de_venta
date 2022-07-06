<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Client;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Sale\StoreRequest;
use App\Http\Requests\Sale\UpdateRequest;

class SaleController extends Controller
{
     public function index()
    {
        $sales=Sale::get();
        return view('admin.sale.index',compact('sales'));
    }

    public function create()
    {
        $clients = Client::get();
        $products = Product::where('status', 'ACTIVE')->get();
        return view('admin.sale.create', compact('clients', 'products'));
    }

    public function store(StoreRequest $request)
    {
        $Sale=Sale::create($request->all());
        foreach ($request->product_id as $key => $product) {
            $results[]=array(
                'product_id'=>$request->product_id[$key],
                'quantity'=>$request->quantity[$key],
                'price'=>$request->price[$key],
                'discount'=>$request->discount[$key]
            );
        }
        $Sale->saleDetails()->createMany($results);
        return redirect()->route('sales.index');
    }

    public function show(Sale $sale)
    {
        return view('admin.sale.show',compact('sale'));
    }

    public function edit(Sale $sale)
    {
        $clients=Client::get();
        return view('admin.sale.show',compact('sale'));
    }

    public function update(UpdateRequest $request, Sale $sale)
    {
        //$sale->update($request->all());
        //return redirect()->route('sales.index');
    }

    public function destroy(Sale $sale)
    {
       //$sale->delete();
        //return redirect()->route('sales.index');
    }
}


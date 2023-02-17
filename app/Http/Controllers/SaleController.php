<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SaleController extends Controller
{
    public function create(): View
    {
        $products = Product::query()->get();
        $customers = Customer::query()->get();

        return view('sales.create', compact('products', 'customers'));
    }

    public function store(Request $request)
    {
        $sale = new Sale();
        $sale->customer_id = $request->get('customer_id');
        $sale->product_id = $request->get('product_id');
        $sale->quantity = $request->get('quantity');
        $sale->save();

        $invoiceNumber = "INV-" . sprintf("%03d", $sale->id);
        $sale->invoice_number = $invoiceNumber;
        $sale->save();

        return redirect()->route('reports.index');
    }
}

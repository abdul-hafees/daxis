<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Sale;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function index(): View
    {
        return \view('reports.index');
    }

    public function noSales(): JsonResponse
    {
        $customers = Customer::query()->whereDoesntHave('sales')->get();

        return response()->json($customers);
    }

    public function allSales(): JsonResponse
    {
        $sales = Sale::query()
            ->with(['customer:id,name,email', 'product'])
            ->get();

        return response()->json($sales);
    }

    public function itemSales(): JsonResponse
    {
        $sales = Sale::query()
            ->join('products', 'sales.product_id', '=', 'products.id')
            ->select('product_name', DB::raw('count(*) as number_of_sales'))
            ->groupBy('product_id')
            ->get();

        return response()->json($sales);
    }

    public function salesCount(): JsonResponse
    {
        $customer = Customer::query()->withCount('sales')->get();

        return response()->json($customer);
    }
}

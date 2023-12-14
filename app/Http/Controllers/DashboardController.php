<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Importa el modelo Product
use App\Models\Supplier;
use App\Models\Cliente;

class DashboardController extends Controller
{
    public function index()
    {
        $productsCount = Product::count();
        $suppliersCount = Supplier::count();
        $clientesCount = Cliente::count();

        return view('dashboard.index', compact('productsCount', 'suppliersCount', 'clientesCount'));
    }
}

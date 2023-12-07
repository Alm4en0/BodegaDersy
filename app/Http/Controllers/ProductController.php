<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required','max:2020', 'image'],
            'name' => ['required'],
            'description' => ['required'],
            'category_id' => ['required'],
            'p_price' => ['required', 'numeric'],
            's_price' => ['required', 'numeric']
        ]);
    
        $fileName = time() . '_' . $request->image->getClientOriginalName();
        $filePath = $request->image->move(public_path('assets/img'), $fileName);
    
        $product = new Product();
        $product->image = 'assets/img/' . $fileName; 
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->p_price = $request->p_price;
        $product->s_price = $request->s_price;
        $product->save();
    
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'image' => ['required', 'max:2020', 'image'],
            'name' => ['required'],
            'description' => ['required'],
            'category_id' => ['required'],
            'p_price' => ['required','numeric'],
            's_price' => ['required','numeric']

        ]);
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}

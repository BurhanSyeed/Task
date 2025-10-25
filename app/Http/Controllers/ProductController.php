<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = ProductModel::get();
        if ($request->expectsJson()) {
            return response()->json([
                'status' => true,
                'products' => $products,
            ], 200);
        }
        return view('products.product_list',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = ProductModel::create($request->validated());

        $response = [
            'status' => true,
            'message' => 'Product created successfully',
            'product' => $product,
        ];

        return $request->expectsJson()
            ? response()->json($response, 201)
            : redirect('product')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductModel $productModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $product = ProductModel::find($id);
        if ($request->expectsJson()) {
            return response()->json([
                'status' => true,
                'message' => 'Product fetched successfully',
                'product' => $product,
            ], 200);
        }

        return view('products.edit_product', compact('product'))
            ->with('success', 'Product fetched successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, ProductModel $product)
    {
        $product->update($request->validated());

        $response = [
            'status' => true,
            'message' => 'Product updated successfully',
            'product' => $product,
        ];

        return $request->expectsJson()
            ? response()->json($response, 200)
            : redirect()->route('product.index')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $product = ProductModel::find($id);
        if (!$product) {
            $response = [
                'status' => false,
                'message' => 'Product not found',
            ];

            return $request->expectsJson()
                ? response()->json($response, 404)
                : redirect()->route('product.index')->with('error', 'Product not found.');
        }
        $product->delete();
        $response = [
            'status' => true,
            'message' => 'Product deleted successfully',
        ];

        return $request->expectsJson()
            ? response()->json($response, 200)
            : redirect("product")->with('success', 'Product deleted successfully.');
    }
}

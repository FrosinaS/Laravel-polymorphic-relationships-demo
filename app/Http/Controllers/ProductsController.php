<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Photo;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('photos')->get();
        return view('products.index', compact('products'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apiGet()
    {
        $products = Product::all();

        foreach ($products as $product){
            $product->photos = $product->photos()->pluck('filename')->toArray();
        }

        return response()->json(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ['Home', 'Office', 'Yard'];

        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create($request->only(['name', 'category']));
        $photos = explode(",", $request->get('photos'));

        foreach ($photos as $photo) {
            Photo::create([
                'imageable_id' => $product->id,
                'imageable_type' => 'App\Product',
                'filename' => $photo
            ]);
        }
        return redirect()->route('products.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function apiStore(Request $request)
    {
        $product = Product::create($request->only(['name', 'category']));
        $photos = explode(",", $request->get('photos'));

        foreach ($photos as $photo) {
            Photo::create([
                'imageable_id' => $product->id,
                'imageable_type' => 'App\Product',
                'filename' => $photo
            ]);
        }
        return response()->json(['message' => 'Product successfully created.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

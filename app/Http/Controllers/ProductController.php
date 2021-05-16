<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Sub;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();
        $limit = Arr::get($params, 'limit', 12);
        $searchKey = Arr::get($params, 'search_key', null);

        $products = Product::query();
        if ($searchKey) {
            $products->where('products.name', 'like', '%' . $searchKey . '%')
                ->orWhere('products.code', 'like', '%' . $searchKey . '%');
        }
        $products = $products->join('categories', 'categories.id', 'products.category_id')
            ->join('subs', 'subs.id', 'products.sub_id')
            ->join('providers', 'providers.id', 'products.provider_id')
            ->select('products.*', 'subs.name as sub_name', 'categories.name as category_name', 'providers.name as provider_name', 'providers.address as provider_address')
            ->orderBy('created_at', 'desc')
            ->paginate($limit);
        return view('product.index')->with(['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $subs = Sub::all();
        $providers = Provider::all();
        return view('product.create')->with([
            'categories' => $categories,
            'subs' => $subs,
            'providers' => $providers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->validated());
        return redirect(route('product.show', ['product' => $product]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $provider = Provider::findOrFail($product->provider_id);
        $category = Category::findOrFail($product->category_id);
        $sub = Sub::findOrFail($product->sub_id);
        $images = Image::where('product_id', $product->id)->get();
        return view('product.show')->with([
            'product' => $product,
            'provider' => $provider,
            'category' => $category,
            'images' => $images,
            'sub' => $sub,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $subs = Sub::all();
        $providers = Provider::all();
        return view('product.edit')->with([
            'product' => $product,
            'categories' => $categories,
            'subs' => $subs,
            'providers' => $providers
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->save($request->validated());
        return redirect(route('product.show', ['product' => $product]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Sub;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class DashboardController extends Controller
{
    public function index()
    {
        $productCount = Product::all()->count();
        $providerCount = Provider::all()->count();
        $categoryCount = Category::all()->count();
        $subCount = Sub::all()->count();
        return view('welcome')->with([
            'productCount' => $productCount,
            'providerCount' => $providerCount,
            'categoryCount' => $categoryCount,
            'subCount' => $subCount,
        ]);
    }

    public function search(Request $request)
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
            ->paginate($limit);
        return view('product.search')->with(['products' => $products]);
    }

    public function upload(UploadRequest $request, Product $product)
    {
        if ($request->hasFile('file')) {
            $fileUploaded = $request->file('file');
            $folder = '/images/products/' . $product->id;
            $name = $fileUploaded->getClientOriginalName();
            $ext = $fileUploaded->getClientOriginalExtension();
            $fileUploaded->storeAs('public' . $folder, $name);
            Image::create([
                'name' => $name,
                'ext' => $ext,
                'folder' => 'storage' . $folder,
                'product_id' => $product->id
            ]);
        }
    }
}

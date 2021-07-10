<?php

namespace App\Http\Controllers;

use App\Imports\PartsImport;
use App\Models\Part;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function index()
    {
        Excel::import(new PartsImport, 'mahang2.xlsx', null, \Maatwebsite\Excel\Excel::XLSX);

        return response()->json([
            'status' => 'SUCCESS'
        ]);
    }

    public function web(Request $request)
    {
        $params = $request->all();
        $search = Arr::get($params, 'search', null);
        $name = Arr::get($params, 'name', null);
        $code = Arr::get($params, 'code', null);
        $description = Arr::get($params, 'description', null);
        $alias = Arr::get($params, 'alias', null);
        $category = Arr::get($params, 'category', null);

        $parts = Part::query();
        if ($search) {
            $search = '%' . $search . '%';
            $parts = $parts->where(function ($query) use ($search) {
                $query->where('name', 'like', $search)
                    ->orWhere('alias', 'like', $search)
                    ->orWhere('code', 'like', $search)
                    ->orWhere('category', 'like', $search)
                    ->orWhere('description', 'like', $search);
            });
        }
        if ($name) {
            $name = '%' . $name . '%';
            $parts = $parts->where('name', 'like', $name);
        }
        if ($code) {
            $code = '%' . $code . '%';
            $parts = $parts->where('code', 'like', $code);
        }
        if ($description) {
            $description = '%' . $description . '%';
            $parts = $parts->where('description', 'like', $description);
        }
        if ($alias) {
            $alias = '%' . $alias . '%';
            $parts = $parts->where('alias', 'like', $alias);
        }
        if ($category) {
            $category = '%' . $category . '%';
            $parts = $parts->where('category', 'like', $category);
        }

        $parts = $parts->paginate(20);
        return view('import.index')->with([
            'parts' => $parts
        ]);
    }
}

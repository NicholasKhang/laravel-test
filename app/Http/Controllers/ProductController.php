<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


class ProductController extends Controller
{
	public function viewIndex(Request $request)
	{
		$perPage = $request->get('per_page', 10);
		$page = $request->get('page', 1);
		$products = Product::paginate($perPage);
		$route = Route::current()->uri;

		return view('index', [
			'route' => $route,
			'products' => $products->appends(['per_page' => $perPage]),
			'perPage' => $perPage,
			'page' => $page,
		]);
	}

	public function viewCreate()
	{
		$route = Route::current()->uri;
		return view('create', ['route' => $route]);
	}

	public function create(Request $request)
	{
		$this->validate($request, [
			'code' => 'required|unique:products|alpha_dash',
			'name' => 'required',
			'category' => 'required',
		]);

		try {
			$product = Product::create($request->all());
		} catch (\Exception $e) {
			return back()->with('fail', $e->getMessage());
		}
		
		$msg = 'Product code [' . $product->code . '] has been successfully created.';
		return back()->with('success', $msg);
	}

	public function viewUpdate(Request $request)
	{
		$id = $request->get('id');
		$product = Product::find($id);
		$route = Route::current()->uri;

		return view('create', [
			'route' => $route,
			'product' => $product,
		]);
	}

	public function update(Request $request)
	{
		$this->validate($request, [
			'name' => 'required',
			'category' => 'required',
		]);

		$product = Product::find($request->get('id'));

		try {
			$product->update($request->all());
		} catch (\Exception $e) {
			return back()->with('fail', $e->getMessage());
		}

		$msg = 'Product code [' . $product->code . '] has been successfully updated.';
		return back()->with('success', $msg);
	}
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		if (isset($request->size)) {
			$result = Product::paginate($request->size, ['*'], 'page', $request->page)->toArray();
			$data = $result['data'];
		} else {
			$data = Product::all();
		}

		return $data;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'code' => 'required|unique:products|alpha_dash',
			'name' => 'required',
			'category' => 'required',
		]);

		$product = Product::create($request->all());

		return [
			'message' => 'The product has been successfully created',
			'product' => $product,
		];
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($code)
	{
		return Product::where('code', $code)->get();
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $code)
	{
		$product = Product::where('code', $code)->first();
		if (!$product)
			return response(['error' => 'Product not found'], 404);

		if (!empty($request['code']))
			unset($request['code']);

		$product->update($request->all());

		return [
			'message' => 'Product has been successfully updated',
			'product' => $product,
		];
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($code)
	{
		$product = Product::where('code', $code)->first();
		if (!$product)
			return response(['error' => 'Product not found'], 404);

		$product->delete();

		return [
			'message' => 'Product has been successfully deleted',
			'product' => $product,
		];
	}
}

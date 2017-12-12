<?php

class ProductController extends BaseController {

	public function showProduct($name)
	{
		$product = Product:: where('name', $name)->first();
		return View::make('common.showPage')->withPage($product);
	}

	public function adminShowProduct($id)
	{
		$product = Product:: where('id', $id)->first();
		return View::make('products.adminShowProduct')->withProduct($product);
	}

	
	public function listProducts()
	{
		$products = Product::orderBY('id', 'desc')->paginate(10);
		return View::make('products.listProducts')->withProducts($products);
	}

	public function createProduct()
	{
		return View::make('products.createProduct');
	}
	public function postCreateProduct()
	{
		$messages = array(
			
			'name.unique'=> 'product already exists',
			
			'image' => 'du skal vælg en billedefil'
			);

		$validator = Validator::make(Input::All(),
			array(
				'name' =>'unique:products,name',
				
				'picture' => 'image'
					), $messages);

		if ($validator->fails())
		{
			return Redirect::back()
			->withErrors($validator->messages())
			->withInput(Input::all());
		}else
		{	
			
			$product 	= new Product;
			$product->name = Input::get('name');
			$cat_id = Category::where('id',Input::get('category'))->first()->id;
			$product->cat_id = $cat_id;
			$product->description = Input::get('description');
			$product->price = Input::get('price');
			$product->offerprice = Input::get('offer');
			
			
			if(Input::hasFile('picture'))
			{
			$filename = md5(microtime());
			Image::make(Input::file('picture'))->save(public_path() . '/products/' . $filename);
			Image::make(Input::file('picture'))->resize(120,120)->save(public_path() . '/products/' . $filename . '_thumb');
			$product->image = $filename;
		    }
			$product->save() ;
			
			return Redirect::to('/admin/listProducts')->withSuccess('Ny product blev oprettet');
		}

	}

	public function editProduct($id)
	{
		$product = Product::where('id',$id)->first();
		return View::make('products.editProduct')->withProduct($product);
	}

	public function postEditProduct()
	{
		
		$id = Input::get('id');
		
				$messages = array(
			
			'name.unique'=> 'product already exists',
			
			'image' => 'du skal vælg en billedefil'
			);
	
		$validator = Validator::make(Input::All(),
			array(
				'name' =>'unique:products,name,'.$id,
				
				'picture' => 'image'
					), $messages);

		if ($validator->fails())
		{
			return Redirect::back()
			->withErrors($validator->messages())
			->withInput(Input::all());
		}else
		{	

			$product	= Product::where('id',Input::get('id'))->first();
			
			$product->name = Input::get('name');
			$cat_id = Category::where('id',Input::get('category'))->first()->id;
			$product->cat_id = $cat_id;

			$product->description = Input::get('description');
			$product->price = Input::get('price');
			$product->offerprice = Input::get('offer');
			
			
			if(Input::hasFile('picture'))
			{
			$filename = md5(microtime());
			Image::make(Input::file('picture'))->save(public_path() . '/products/' . $filename);
			Image::make(Input::file('picture'))->resize(120,120)->save(public_path() . '/products/' . $filename . '_thumb');
			$product->image = $filename;
		    }
			$product->save() ;
			
			return Redirect::to('/admin/listProducts')->withSuccess(' product blev rettet');
		}


	}

	public function deleteProduct($id)
	{
		$product = Product::where('id', $id)->first();
		if($product->image){
		 unlink(public_path(). '/products/' . $product->image);
		 unlink(public_path(). '/products/' . $product->image. '_thumb');
		}
		
		Product::destroy($id);
		
		return Redirect::to('/admin/listProducts')->withSuccess('produkt blev slettet');
	}


}

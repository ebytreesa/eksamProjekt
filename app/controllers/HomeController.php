<?php

class HomeController extends BaseController {

	

	public function index()
	{
		return View::make('index');
	}

	public function page($slug)
	{
		$page = Page::where('slug', $slug)->first();
		return View::make('page')->withPage($page);
	}

	public function contact()
	{
		return View::make('contact');
	}

	public function offer()
	{

		return View::make('offer');
	}

	public function showCat($id)
	{
		$cat = Category::where('id',$id)->first();
		$product = Product::where('cat_id', $cat->id)->get();
		return View::make('showCat')->withCat($cat)->withProduct($product);
	}

	public function showProduct($id)
	{
		
		$product = Product::where('id', $id)->first();
		return View::make('showProduct')->withProduct($product);
	}

	public function postSearch(){
		
		$search = Input::get('search');
		if(empty($search)){
			return Redirect::to('/');
		}else{
		$products = DB::table('products')
				->join('categories', 'categories.id', '=','products.cat_id' )
				->select('products.*','categories.name as catname')
				->where('categories.name', 'like', '%'.$search.'%')
				->orWhere('products.name', 'like', '%'.$search.'%')
				->orWhere('description', 'like', '%'.$search.'%')
				->get();
				// var_dump($products);

		return View::make('search')->withProducts($products);
		}
	}

	public function postContact(){

	
    $data = [
    	 'fromEmail' => Input::get('email'), 
    	'fromName' => Input::get('name'),
    	'subject' => Input::get('subject'),
    	'bodyMessage' => Input::get('message')
    ];

    $toEmail = 'examfisk@gmail.com';
    $toName = 'eby';

    Mail::send('emails.contacts', $data , function($message) use ($data, $toEmail)
    {
        $message->to($toEmail);

        $message->from($data['fromEmail']);

        $message->subject($data['subject']);
    });
       

        return Redirect::to('/')
            ->withSuccess( 'Your message was successfully sent!');
    }

}

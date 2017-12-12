<?php

class AdminController extends BaseController {

	public function register(){
		return View::make('admin.register');
	}

	public function postRegister()
	{
		$messages	= array(
			'unique'=> 'brugernavnet er optaget',
			'image' => 'du skal vælg en billedefil'
			);
		$validator	= Validator::make(Input::All(), array(
			'username' => 'unique:users',
			'picture' => 'image'
			
			), $messages);
		if ($validator->fails())
		{
			return Redirect::to('/register')
					->withErrors($validator->messages())
					->withInput(Input::all());
		}else
		{
			
			$user = new User;
			$user->username= Input::get('username');
			$user->email= Input::get('email');
			$user->password	= Hash::make(Input::get('pass1'));
			$user->admin     = Input::get('role');		
			
			$user->save();
		}
		if ($user)
		{
			return Redirect::to('/admin')->withSuccess('Brugeren blev oprettet');
		}else
		{
			return "der opstod en fejl";
		}

	}
	

	public function admin()
	{
		if(Auth::user() && Auth::user()->admin == 1){
			return View::make('admin.dashboard');
		}else{
			return View::make('admin.login');
		}
	}

	public function dashboard()
	{
		
		return View::make('admin.dashboard');
	}	

	public function adminLogin()
	{
		
		return View::make('admin.login');
	}

	public function postLogin()
	{
		$userdata = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
		);
		if(Auth::attempt($userdata))
		{
			$name = Auth::user()->username;
			return Redirect::to('/admin/dashboard')->withSuccess('You are now logged in');
		}else
		{
			return Redirect::back()->withError('username or password invalid');
		}				
		
	}


	public function logout()
		{
			Auth::logout();

			return Redirect::to('/')->withSuccess('Du er logged out');
			
		}	

	public function contact()
		{
			$address = Address::first();
			return View::make('admin.address')->withAddress($address);			
			
		}	


	public function editContact($id)
		{
			$address = Address::where('id', $id)->first();
			return View::make('admin.editAddress')->withAddress($address);			
			
		}	

	public function postEditContact(){
		$address = Address::where('id', Input::get('id'))->first();
		$address->name = Input::get('name');
		$address->street = Input::get('street');
		$address->city = Input::get('city');
		$address->email = Input::get('email');
		$address->phone = Input::get('phone');
		$address->gps = Input::get('gps');
		$address->link = Input::get('link');
		$address->save();
		return Redirect::to('/admin/contact')->withSuccess('Kontakt blev rettet');
		

	}

	public function slides()
		{
			$slides = Slide::get();
			return View::make('slides.slides')->withSlides($slides);			
			
		}

	public function createSlide()
		{
			
			return View::make('slides.createSlide');			
			
		}

	public function postCreateSlide(){

			if(Input::hasFile('picture'))
			{
				$messages = array(
			
				'image' => 'du skal vælg en billedefil'
				);

				$validator = Validator::make(Input::All(),
					array(
				'picture' => 'image'				
					), $messages);

			if ($validator->fails())
			{ 
				return Redirect::back()
				->withErrors($validator->messages())
				->withInput(Input::all());
			}else
			{	

				$slide = new Slide;
					$filename = md5(microtime());
					Image::make(Input::file('picture'))->save(public_path() . '/slides/' . $filename);
					Image::make(Input::file('picture'))->resize(120,120)->save(public_path() . '/slides/' . $filename . '_thumb');
					$slide->image = $filename;
					$slide->save();
			    }
			}

		 return Redirect::to('admin/slides')->withSuccess('billeder er uploadet');	
		// }
			
	}		


	public function editSlide($id)
		{
			$slide = Slide::where('id', $id)->first();
			return View::make('slides.editSlide')->withSlide($slide);			
			
		}	

	public function postEditSlide(){
		$id = Input::get('id');
		$slide = Slide::where('id', $id)->first();
		
			if(Input::hasFile('picture'))
			{
				$messages = array(
			
				'image' => 'du skal vælg en billedefil'
				);

				$validator = Validator::make(Input::All(),
					array(
				'picture' => 'image'				
					), $messages);

			if ($validator->fails())
			{ 
				return Redirect::back()
				->withErrors($validator->messages())
				->withInput(Input::all());
			}else
			{	

				
					$filename = md5(microtime());
					Image::make(Input::file('picture'))->save(public_path() . '/slides/' . $filename);
					Image::make(Input::file('picture'))->resize(120,120)->save(public_path() . '/slides/' . $filename . '_thumb');
					$slide->image = $filename;
					$slide->save();
			    }
			}

		 return Redirect::to('admin/slides')->withSuccess('billeder er uploadet');

	}

	public function deleteSlide($id)
	{
		
		$slide = Slide::where('id', $id)->first();
		unlink(public_path(). '/slides/' . $slide->image);
		unlink(public_path(). '/slides/' . $slide->image. '_thumb');
		Slide::destroy($id);
		
		return Redirect::back()->withSuccess('billede blev slettet');
	}
	


	public function boxes()
		{
			$boxes = Box::get();
			return View::make('admin.boxes')->withBoxes($boxes);			
			
		}	


	public function editBox($id)
		{
			$box = Box::where('id', $id)->first();
			return View::make('admin.editBox')->withBox($box);			
			
		}	

	public function postEditBox(){
		$box = Box::where('id', Input::get('id'))->first();
		$box->title = Input::get('title');
		$box->content = Input::get('content');
		$box->link = Input::get('link');
		
		$box->save();
		return Redirect::to('/admin/boxes')->withSuccess('Boks blev rettet');
		

	}

	
	// public function deleteUser($id)
	// {
		
	// 	$user = User::where('id', $id)->first();
	// 	unlink(public_path(). '/users/' . $user->image);
	// 	unlink(public_path(). '/users/' . $user->image. '_thumb');
	// 	User::destroy($id);
		
	// 	return Redirect::back()->withSuccess('user blev slettet');
	// }

	// public function userProfile($id){
	// 	$user = User::where('id',$id)->first();
	// 	return View::make('admin.userProfile')->withUser($user);
	// }

	

	

	

}

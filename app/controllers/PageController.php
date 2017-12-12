<?php

class PageController extends BaseController {

	public function showPage($slug)
	{
		$page = Page:: where('slug', $slug)->first();
		return View::make('common.showPage')->withPage($page);
	}

	public function adminShowPage($id)
	{
		$page = Page:: where('id', $id)->first();
		return View::make('pages.adminShowPage')->withPage($page);
	}

	
	public function listPages()
	{
		$pages = Page::get();
		return View::make('pages.listPages')->withPages($pages);
	}

	public function createPage()
	{
		return View::make('pages.createPage');
	}
	public function postCreatePage()
	{
		$messages = array(
			
			'unique'=> 'page already exists',
			'image' => 'du skal vælg en billedefil'
			);

		$validator = Validator::make(Input::All(),
			array(
				'slug' =>'unique:pages',
				'picture' => 'image'
					), $messages);

		if ($validator->fails())
		{
			return Redirect::back()
			->withErrors($validator->messages())
			->withInput(Input::all());
		}else
		{	
			
			$page 	= new Page;
			$page->slug = Input::get('slug');
			$page->title = Input::get('title');
			$page->content = Input::get('content');
			if (Input::get('visible') ){
				$page->visible = 1;
			}else{
				$page->visible = 0;
			}
			if(Input::hasFile('picture'))
			{
			$filename = md5(microtime());
			Image::make(Input::file('picture'))->save(public_path() . '/images/' . $filename);
			Image::make(Input::file('picture'))->resize(120,120)->save(public_path() . '/images/' . $filename . '_thumb');
			$page->image = $filename;
		    }
			$page->save() ;
			
			return Redirect::to('/admin/listPages')->withSuccess('Ny page blev oprettet');
		}

	}

	public function editPage($id)
	{
		$page = Page::where('id',$id)->first();
		return View::make('pages.editPage')->withPage($page);
	}

	public function postEditPage()
	{
		$id = Input::get('id');
		$page 	= Page::where('id',$id)->first();
		$messages = array(
			
			'unique'=> 'page already exists',
			'image' => 'du skal vælg en billedefil'
			);

		$validator = Validator::make(Input::All(),
			array(
				'slug' =>'unique:pages,slug,'.$id,
				'picture' => 'image'
					), $messages);

		if ($validator->fails())
		{
			return Redirect::back()
			->withErrors($validator->messages())
			->withInput(Input::all());
		}else
		{	
			
			$page->slug = Input::get('slug');
			$page->title = Input::get('title');
			$page->content = Input::get('content');
			if (Input::get('visible') ){
				$page->visible = 1;
			}else{
				$page->visible = 0;
			}
			if(Input::hasFile('picture'))
			{
			$filename = md5(microtime());
			Image::make(Input::file('picture'))->save(public_path() . '/images/' . $filename);
			Image::make(Input::file('picture'))->resize(120,120)->save(public_path() . '/images/' . $filename . '_thumb');
			$page->image = $filename;
		    }
			$page->save() ;
			
			return Redirect::to('/admin/listPages')->withSuccess(' page blev  rettet');
		}

	}

	public function deletePage($id)
	{
		$page = Page::where('id', $id)->first();
		if($page->image){
		 unlink(public_path(). '/images/' . $page->image);
		 unlink(public_path(). '/images/' . $page->image. '_thumb');
		}
		
		Page::destroy($id);
		
		return Redirect::to('/admin/listPages')->withSuccess('page blev slettet');
	}


}

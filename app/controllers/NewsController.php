<?php

class NewsController extends BaseController {

	public function showCat()
	{
		$cat = Category::get();
		return View::make('cat.showcat')->withCat($cat);
	}

	public function showNewsPage($id,$title)
	{
		$news = News::where('id',$id)->where('title',$title)->first();
		return View::make('news.showNewsPage')->withNews($news);
	}

	public function createNews()
	{
		
		return View::make('news.createNews');
	}


	public function postCreateNews()
	{

		$messages	= array('required'	=> ':attribute feltet skal udfyldes');				
		$validator	= Validator::make(Input::All(), array(
			'title' => 'required',
			'description' => 'required'			
			), $messages);
		if ($validator->fails())
		{
			return Redirect::to('/admin/createNyhed')
					->withErrors($validator->messages())
					->withInput(Input::all());
		}else
		{
		$news = new News;
		$news->title = Input::get('title');
		$news->description = Input::get('description');
		$news->save();
		return Redirect::to('/admin/listNews')->withSuccess('news blev oprettet');
	    }
	}

	public function listNews()
	{
		$news = News::get();
		return View::make('admin.listNews')->withNews($news);
	}

	public function editNews($id)
	{
		$news 	= News::where('id', $id)->first();
		return View::make('admin.editNews')->withNews($news);

	}

	public function postEditNews()
	{ 
	   $id = Input::get('id');

		$messages	= array('required'	=> ':attribute feltet skal udfyldes');	
			
		$validator	= Validator::make(Input::All(), array(
			'title' => 'required',
			'description' => 'required'			
			), $messages);
		if ($validator->fails())
		{ 
			return Redirect::to('/admin/editNews/' .$id)
					->withErrors($validator->messages())
					->withInput(Input::all());
		}else
		{

			$news 	= News::where('id', $id)->first();
			$news->title = Input::get('title');
			$news->description = Input::get('description');
			$news->save();
			return Redirect::to('/admin/listNews')->withSuccess('news blev rettet');
	    }
	}

	public function deleteNews($id)
	{
		News::destroy($id);
		return Redirect::back()->withSuccess('News blev slettet');

	}
}

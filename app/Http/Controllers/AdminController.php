<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\News;
use App\User;
use App\Kategori;
use App\Comments;
use Illuminate\Http\Request;
use App\Http\Requests\CreateNewsRequest;
use DB;
use File;

class AdminController extends Controller {


	private $cat;
	private $news;

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
		$this->middleware('auth');
		$this->cat= Kategori::get();
	}

	public function index()
	{
		return view('admin.index');
	}

	public function posts(Request $request)
	{
		$stories = News::where('kategori_id', $request->cat )->paginate(20);
		//dd($stories->first()->kategori());
		return view('admin.posts',compact('stories'));
	}


	public function create()
	{
		$cat= $this->cat;
		return view('admin.create',compact('cat'));
	}

	public function store(News $news, CreateNewsRequest $request)
	{

		if ($request->hasFile('image'))
		{
			$news->slug = str_slug($request->judul,'-');
			$news->judul = $request->judul;
			$news->isi = $request->isi;
			$news->user_id = $request->user_id;
			$news->kategori_id = $request->kategori_id;
			$news->save();
			$id = $news->where('kategori_id',$request->kategori_id )->orderBy('created_at', 'DESC')->first()->id;
			$path = 'images/newstitle/';
			$filename = 'newstitle'.$id.'.jpg';
    		$request->file('image')->move($path, $filename);
    	} else
    	{
    		return Redirect::back()->withErrors(['image', 'Gambar tidak valid']);
    	}
    	return redirect('admin');

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(News $news)
	{
		$cat = $this->cat;
		return view('admin.edit', compact('news','cat'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(News $news, Request $request)
	{

		$input = ['slug'=> str_slug($request->judul,'-') ,
			'judul' => $request->judul,
			'isi' => $request->isi,
			'user_id' =>$request->user_id,
			'kategori_id'=> $request->kategori_id ];
		$news->fill($input)->save();
		if ($request->hasFile('image'))
		{
			$id = $news->id;
			$filename = 'newstitle'.$id.'.jpg';
			$filename1 = '\newstitle'.$id.'.jpg';
			$existfile = public_path().'\images\newstitle'.$filename1;
			File::delete($existfile);
			$path = 'images/newstitle/';
    		$request->file('image')->move($path, $filename);
		}
		return redirect('admin');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete(News $news)
	{
		return view('admin.delete', compact('news'));
	}
	public function destroy(News $news)
	{
		$id=$news->id;
		$news->delete();
		$filename1 = '\newstitle'.$id.'.jpg';
		$existfile = public_path().'\images\newstitle'.$filename1;
		File::delete($existfile);
		return redirect('admin');
	}

}

<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCommentRequest;
use Illuminate\Http\Request;
use App\News;
use App\Kategori;
use App\User;
use App\Comments;
use DB;

class HomeController extends Controller {

	private $news;

	public function __construct(News $news)
	{
		$this->news= $news;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(News $news)
	{

		$header1= $news->where('kategori_id',1 )->orderBy('created_at', 'DESC')->first();
		$header2= $news->where('kategori_id',2 )->orderBy('created_at', 'DESC')->first();
		$header3= $news->where('kategori_id',3 )->orderBy('created_at', 'DESC')->first();
		$headers= array($header1,$header2,$header3);

		$sidebar= $news->orderBy('dibaca', 'DESC')->limit(5)->get();

		$stories = $news->orderBy('created_at', 'DESC')->paginate(10);
		$title= 'home';
		return view('sowindows.home',compact(['stories', 'title','headers','sidebar']));
	}

	public function category(News $news, $kat_id)
	{	
		$title = Kategori::where('id', $kat_id)->first()->nama_kategori;
		$stories = $news->orderBy('created_at', 'DESC')->where('kategori_id', $kat_id)->paginate(10);
		$headers = null;
		$sidebar= $news->orderBy('dibaca', 'DESC')->limit(5)->get();
		return view('sowindows.home',compact(['stories', 'title', 'headers','sidebar']));
	}

	public function search(News $news, Request $request)
	{
		$title = 'Hasil pencarian "'.$request->key.'"';
		$stories = $news->where('judul','LIKE', '%'.$request->key.'%')->paginate(10);
		$headers = null;
		$sidebar= $news->orderBy('dibaca', 'DESC')->limit(5)->get();
		return view('sowindows.home', compact(['stories','title','headers','sidebar']));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function storeComment(Comments $comment, CreateCommentRequest $request)
	{
		/*$this->validate($request, [
				'nama' => 'required',
				'email' => 'required|email',
				'komentar' => 'required'
			]);*/
		$news_slug = News::where('id',$request->input('news_id'))->first()->slug;
		$comment->create($request->all());
		return redirect()->route('news_path',[$news_slug, '#comments-box']);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(News $news)
	{
		$news->increment('dibaca');
		$comments = Comments::orderBy('created_at', 'DESC')->get()->where('news_id',$news->id);
		$sidebar= $news->orderBy('dibaca', 'DESC')->limit(5)->get();
		$otherposts = News::orderBy('created_at', 'DESC')->where('kategori_id', $news->kategori_id)->limit(3)->get();
		return view('sowindows.show',compact(['news','otherposts','comments','sidebar']));

	}

}

<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class News extends Eloquent{

	protected $table = 'news';

	protected $fillable= [
		'slug','judul','isi', 'user_id' , 'kategori_id'
	];

	public function kategori()
	{
		return $this->belongsTo('App\Kategori');
	}
	public function user()
	{
		return $this->belongsTo('App\User');
	}
	public function comments()
	{
		return $this->hasMany('App\Comments');
	}

}
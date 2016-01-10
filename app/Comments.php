<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model {
	protected $table = 'Comments';

	protected $fillable= [
		'nama','email','komentar','news_id'
	];

	public function news()
	{
		return $this->belongsTo('App\News');
	}

}

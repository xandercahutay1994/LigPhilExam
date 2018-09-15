<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
	protected $table = 'posts';
    public $primaryKey = 'id';
    public $timestamps = false;	
    protected $dates = ['your_date'];

    /*
    *   A POST CAN ONLY HAVE 1 ADMIN REGISTER
    *   MANY TO ONE
    */
    public function admin(){
		return $this->belongsTo('App\User');
	}
}
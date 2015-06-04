<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model {

	protected $table = 'guest';
	protected $guarded=[];
	protected $fillable=['nama','email','pesan'];

}

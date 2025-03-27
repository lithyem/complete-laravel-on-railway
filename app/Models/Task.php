<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
	protected $table = 'tasks'; // Explicitly define the table name
    protected $fillable = ['title', 'status'];

	public function user()
	{
		return $this->belongsTo(User::class);
	}


}

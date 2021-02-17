<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'description', 'status'];

    public function tasks()
	{
		return $this->hasMany(Task::class);
	}
}

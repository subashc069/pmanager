<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;

class Task extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'days',
        'hours',
        'project_id',
        'company_id',
        'user_id',
    ];

    public  function complete($completed = true){
        $this->update(compact('completed'));
    }

    public function incomplete(){
        $this->complete(false);
    }

    public function project(){

        return $this->belongsTo(Project::class);
    }
}

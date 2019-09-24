<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;

class Task extends Model
{
    //
    protected $fillable = [
        'completed',
        'project_id',
        'description'
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

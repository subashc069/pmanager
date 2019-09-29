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

    public function project()
    {
        $this->belongsTo(Project::class);
    }

    public function companie()
    {
        $this->belongsTo(Company::class);
    }

    // public function user()
    // {
    //     $this->belongsTo(User::class);
    // }

    public function users()
    {
        $this->belongsToMany(User::class);
    }

    public  function complete($completed = true){
        $this->update(compact('completed'));
    }

    public function incomplete(){
        $this->complete(false);
    }

}

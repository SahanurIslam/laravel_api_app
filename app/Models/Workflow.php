<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workflow extends Model
{
    use HasFactory;
    protected $primaryKey = 'RecId';
    protected $fillable = [
        'RecId',
        'Description',
    ];
    // public function childworkflow()
    // {
    //     return $this->hasMany(Childworkflow::class, '');
    // }

}

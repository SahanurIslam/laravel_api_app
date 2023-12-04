<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Childworkflow extends Model
{
    use HasFactory;
    protected $primaryKey = 'RecId';

    protected $fillable = [
        'parent',
        'RecId',
        'DossierNumber',
        'TaskIds'
    ];
    protected $casts = [
        'TaskIds' => 'object'
    ];

    public function workflow()
    {
        return $this->belongsTo(Workflow::class, 'parent', 'RecId');
    }
}

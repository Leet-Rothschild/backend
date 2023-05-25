<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prompt extends Model
{
    use HasFactory;

    protected $primaryKey = 'prompt_id';

    protected $fillable = ['prompt_id', 'text', 'result', 'tools_type', 'created_at'];
    
    public $timestamps = false;
}

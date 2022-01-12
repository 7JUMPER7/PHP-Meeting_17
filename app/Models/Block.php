<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;
    protected $table = 'Block';
    protected $primaryKey = 'id';
    protected $fillable = ['topicId', 'title', 'content', 'imagePath', 'created_at', 'updated_at'];
}

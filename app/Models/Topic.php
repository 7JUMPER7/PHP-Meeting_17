<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $table = 'Topics';
    protected $primaryKey = 'id';
    protected $fillable = ['topicName', 'created_at', 'updated_at'];
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'text', 'date', 'created_at'];
    protected $skipValidation = true;
}

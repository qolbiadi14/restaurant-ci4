<?php

namespace App\Models;

use CodeIgniter\Model;

class M_slider extends Model
{
    protected $table = 'tblslider';
    protected $allowedFields = ['slider'];
    protected $primaryKey = 'idslider';
}

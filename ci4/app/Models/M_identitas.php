<?php

namespace App\Models;

use CodeIgniter\Model;

class M_identitas extends Model
{
    protected $table = 'tblidentitas';
    protected $allowedFields = ['idtoko', 'namatoko', 'title', 'alamattoko', 'emailtoko', 'nomortoko', 'deskripsitoko', 'icon', 'logo', 'hero'];
    protected $primaryKey = 'idtoko';
}

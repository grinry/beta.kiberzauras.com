<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Device
 * @package App\Models
 * @author Rytis Grincevičius <rytis.grincevicius@gmail.com>
 */
class Device extends Model
{
    protected $table = 'devices';
    protected $guarded = ['id'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 * @package App\Models
 * @author Rytis Grincevičius <rytis.grincevicius@gmail.com>
 */
class Country extends Model
{
    protected $table = 'countries';
    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * @author Rytis Grincevičius <rytis.grincevicius@gmail.com>
     */
    public function user()
    {
        return $this->hasMany(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';

    public $incrementing = false;
    
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'no_wa',
        'address'
    ];

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }
}

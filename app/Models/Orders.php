<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orders extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';

    public $incrementing = false;
    
    protected $keyType = 'string';

    protected $fillable = [
        'customer_id',
        'unique_code',
        'status',
        'total_price',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    
}

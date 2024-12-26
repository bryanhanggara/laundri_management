<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';

    public $incrementing = false;
    
    protected $keyType = 'string';

    protected $fillable = [
        'order_id',
        'payment_method',
        'amount',
        'status'
    ];

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }
}

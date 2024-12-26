<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetail extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';

    public $incrementing = false;
    
    protected $keyType = 'string';

    protected $fillable = [
        'order_id',
        'service_id',
        'qty',
        'price'
    ];

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }

    public function services()
    {
        return $this->belongsTo(Service::class);
    }

}

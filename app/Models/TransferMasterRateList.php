<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransferMasterRateList extends Model
{

    protected $table = 'transfer_master_rate_lists';

    protected $fillable = [
        'currency_id',
        'vehicle_id',
        'supplier_id',
        'start_date',
        'end_date',
        'adult',
        'child',
        'infant',
        'vehicle_cost',
        'transfer_type',
        'status',
        'added_by',
        'transfer_id'
    ];

    // 🔗 Relation with Transfer
    public function transfer()
    {
        return $this->belongsTo(TransferMaster::class, 'parent_id');
    }

    // 🔗 Optional relations
    // public function currency()
    // {
    //     return $this->belongsTo(Currency::class, 'currencyId');
    // }

    // public function vehicle()
    // {
    //     return $this->belongsTo(Vehicle::class, 'vehicleId');
    // }

    // public function supplier()
    // {
    //     return $this->belongsTo(Supplier::class, 'supplierId');
    // }

}

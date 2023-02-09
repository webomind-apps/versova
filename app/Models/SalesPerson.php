<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesPerson extends Model
{
    use HasFactory;

    protected $fillable = [
        'sales_person_id',
        'customer_company_id',
    ];

    public function customers()
    {
        return $this->hasMany(SalesPersonCustomer::class, 'sales_person_id');
    }
}

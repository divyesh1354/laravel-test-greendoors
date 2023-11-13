<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    /**
     * Array of mass assignable fields on product
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'type',
    ];

    /**
     * Relationship to the customer the product is assigned to.
     *
     * @return BelongsToMany
     */
    public function customers(): BelongsToMany
    {
        return $this->belongsToMany(Customer::class, 'customer_product');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Customer extends Model
{
    use HasFactory;

    /**
     * Array of mass assignable fields on customer
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email_address',
    ];

    /**
     * Relationship to the product assigned to the customer.
     *
     * @return BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'customer_product');
    }
}

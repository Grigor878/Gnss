<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['name', 'address'];

    /**
     * Get all of the opportunities for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function opportunities(): HasMany
    {
        return $this->hasMany(Opportunity::class);
    }

    /**
     * Get all of the orders for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get all of the contactPersons for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contactPersons(): HasMany
    {
        return $this->hasMany(CustomerContactPerson::class);
    }
}

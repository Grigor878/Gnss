<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partner extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['name', 'image', 'address'];

    /**
     * Get all of the contactPersons for the Partner
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contactPersons(): HasMany
    {
        return $this->hasMany(PartnerContactPerson::class);
    }
}

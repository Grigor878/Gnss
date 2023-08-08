<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImages extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['product_id', 'filename'];

    /**
     * Get the product that owns the ProductImages
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}

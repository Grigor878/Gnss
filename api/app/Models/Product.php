<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['name', 'price', 'description', 'count'];

    /**
     * Get all of the productTraslations for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productTraslations(): HasMany
    {
        return $this->hasMany(ProductTranslations::class);
    }

    /**
     * The category that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class); // 'category_products', 'product_id', 'category_id'
    }

    /**
     * The subcategory that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subcategory(): BelongsToMany
    {
        return $this->belongsToMany(Subcategory::class); // 'product_subcategory', 'product_id', 'subcategory_id'
    }

    /**
     * Get all of the images for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(ProductImages::class);
    }
}

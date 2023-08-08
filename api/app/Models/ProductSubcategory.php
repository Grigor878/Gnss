<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSubcategory extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * guarded
     *
     * @var bool
     */
    protected $guarded = false;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'product_subcategory';
}

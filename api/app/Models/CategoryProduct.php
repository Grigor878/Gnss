<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryProduct extends Model
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
    protected $table = 'category_product';
}

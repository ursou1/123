<?php

namespace App\Models;

use App\Models\Category;
use App\Orchid\Presenters\CategoryPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\File;
use Orchid\Screen\AsSource;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Filters\Filterable;
use Symfony\Component\String\Slugger;


class Product extends Model
{
    use HasFactory, AsSource, Attachable, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'image',
        'cost',
        'category_id',
        'slug'
    ];
    /**
 * Name of columns to which http sorting can be applied
 *
 * @var array
 */
    protected $allowedSorts = [
        'title',
        'created_at',
        'updated_at'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function sales(){
        return $this->HasMany(Sale::class);
    }
    public function presenter(): CategoryPresenter
    {
        return new CategoryPresenter($this);
    }
}

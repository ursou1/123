<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Status extends Model
{
    use HasFactory,AsSource, Filterable;
    protected $fillable = [
        'title'
    ];
    /**
     * Name of columns to which http sorting can be applied
     *
     * @var array
     */
    protected $allowedSorts = [
        'title',
    ];
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}

<?php

namespace App\Models;

use App\Orchid\Presenters\OrderPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use App\Models\Sale;
use App\Models\User;


class Order extends Model
{
    use HasFactory ,AsSource,  Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_date',
        'user_id',
        'status_id',
    ];
    /**
 * Name of columns to which http sorting can be applied
 *
 * @var array
 */
    protected $allowedSorts = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function status(){
        return $this->belongsTo(Status::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function sales(){
        return $this->HasMany(Sale::class);
    }
    public function presenter(): OrderPresenter
    {
        return new OrderPresenter($this);
    }
}

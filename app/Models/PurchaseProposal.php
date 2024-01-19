<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseProposal extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['email', 'amount'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'amount'
    ];

    /**
     * Get the article that the purchase proposal has
     */
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    /**
     * Order by the best amount
     */
    public function scopeOrderByBestAmount(Builder $query)
    {
        $query->orderBy('amount', 'DESC');
    }
}

<?php

namespace App\Models;

use App\Support\Packages;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable([
    'interest',
    'name',
    'phone',
    'note',
    'status',
    'rejection_note',
    'reviewed_at',
])]
class Lead extends Model
{
    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'reviewed_at' => 'datetime',
        ];
    }

    /**
     * @return HasOne<Client, $this>
     */
    public function client(): HasOne
    {
        return $this->hasOne(Client::class);
    }

    /**
     * @param  Builder<Lead>  $query
     * @return Builder<Lead>
     */
    public function scopePackages(Builder $query): Builder
    {
        return $query->whereIn('interest', Packages::names());
    }

    /**
     * @param  Builder<Lead>  $query
     * @return Builder<Lead>
     */
    public function scopeConsultations(Builder $query): Builder
    {
        return $query->whereNotIn('interest', Packages::names());
    }

    /**
     * @param  Builder<Lead>  $query
     * @return Builder<Lead>
     */
    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', 'new');
    }

    public function isPackageRequest(): bool
    {
        return Packages::isPackage($this->interest);
    }

    public function isPending(): bool
    {
        return $this->status === 'new';
    }
}

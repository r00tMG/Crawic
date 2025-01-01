<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DomainCategory;
class DomainExpired extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(DomainCategory::class, 'domain_expired_category', 'domain_expired_id', 'domain_category_id');
    }
}

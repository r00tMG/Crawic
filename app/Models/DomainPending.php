<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DomainCategory;
class DomainPending extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(DomainCategory::class, 'domain_pending_category', 'domain_pending_id', 'domain_category_id');
    }
}

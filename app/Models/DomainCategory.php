<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DomainExpired;
use App\Models\DomainPending;
class DomainCategory extends Model
{
    use HasFactory;
    protected $table = 'domain_categories';
    protected $guarded = [];

    public function expireds()
    {
        return $this->belongsToMany(DomainExpired::class, 'domain_expired_category', 'domain_category_id', 'domain_expired_id');
    }

    public function pending()
    {
        return $this->belongsToMany(DomainPending::class, 'domain_pending_category', 'domain_category_id', 'domain_pending_id');
    }
}

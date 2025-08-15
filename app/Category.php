<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'parent_id',
        'active',
    ];

    public function isMain()
    {
        return $this->parent_id == 0;
    }

    public function isActive()
    {
        return (bool)$this->active;
    }

    public function isSub()
    {
        return !$this->isMain();
    }

    public function scopeMain($query, $limit = null)
    {
        $query
        ->orderBy('order')
        ->where('parent_id', 0);
        if ($limit) {
            $query->take($limit);
        }
        return $query->get();
    }

    public function scopeDisplayed($query, $limit = 0)
    {
        if ($limit) {
            $query->limit($limit);
        }
        return $query
        ->has('subCategories')
        ->orderBy('order')
        ->where('active', 1)
        ->where('parent_id', 0)
        ->get();
    }

    public function scope_displayed($query)
    {
        return $query
        ->orderBy('order')
        ->where('active', 1)
        ->where('parent_id', $this->id)
        ->get();
    }

    public function scopeSub($query, $limit = null)
    {
        $query->orderBy('order')->where('parent_id', '<>', 0);
        if ($limit) {
            $query->take($limit);
        }
        return $query->get();
    }

    public function mainCategory()
    {
        return $this->belongsTo('App\Category', 'parent_id');
    }

    public function subCategories()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }
    
}

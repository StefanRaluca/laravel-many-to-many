<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'description', 'active'];
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

}
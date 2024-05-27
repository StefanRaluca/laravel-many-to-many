<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'type_id', 'image_cover', 'image_cover', 'description', 'start_date', 'preview_url', 'url_code', 'team_members'];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
    public function technologies(): BelongsToMany
{
    return $this->belongsToMany(Technology::class);
}

}
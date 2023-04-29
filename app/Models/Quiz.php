<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static find($quiz_id)
 * @method static whereId($quiz_id)
 * @method static where(string $string, int $id)
 * @method static create(array|string|null $post)
 * @method static paginate(int $int)
 */
class Quiz extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = ['title', 'description', 'status', 'slug', 'finished_at'];

    protected $dates = ['finished_at'];

    protected $appends = ['details'];

    public function getDetailsAttribute(): ?array
    {
        if($this->results()->count() > 0){
            return [
                'average' => round($this->results()->avg('point')),
                'join_count' => $this->results()->count()
            ];
        }
        return null;
    }

    public function getFinishedAtAttribute($date): ?Carbon
    {
        return $date ? Carbon::parse($date) : null;
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function my_result(): HasOne
    {
        return $this->hasOne(Result::class)->where('user_id', auth()->user()->id);
    }

    public function results(): HasMany
    {
        return $this->hasMany(Result::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    protected $fillable = ['title', 'description', 'finished_at'];

    protected $dates = ['finished_at'];

    public function getFinishedAtAttribute($date)
    {
        return $date ? Carbon::parse($date) : null;
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
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

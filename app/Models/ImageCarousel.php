<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ImageCarousel
 *
 * @property int $id
 * @property string $key
 * @property string $description
 * @property int $status
 * @property mixed $items
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ImageCarousel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ImageCarousel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ImageCarousel query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ImageCarousel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ImageCarousel whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ImageCarousel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ImageCarousel whereItems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ImageCarousel whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ImageCarousel whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ImageCarousel whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ImageCarousel published()
 */
class ImageCarousel extends Model
{
    const STATUS_NOT_PUBLISHED=0;
    const STATUS_PUBLISHED=1;
    const STATUSES = [self::STATUS_NOT_PUBLISHED => 'Disabled', self::STATUS_PUBLISHED => 'Enabled'];

    //const STATUSES = [1 => 'Enabled', 0 => 'Disabled'];

    protected $fillable=['key','description','status','items','title'];

    protected $casts=[
        'items'=>'array'
    ];
    protected $attributes=[
        'description'=>''
    ];
    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopePublished($query)
    {
        return $query->where('status',self::STATUS_PUBLISHED);
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ContactForm
 *
 * @property int $id
 * @property int $status
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactForm newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactForm newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactForm query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactForm whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactForm whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactForm whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactForm whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactForm whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactForm whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactForm whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactForm whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactForm notProcessed()
 */
class ContactForm extends Model
{
    const STATUS_NOT_PROCESSED=0;
    const STATUS_PROCESSED=1;
    const STATUSES = [self::STATUS_NOT_PROCESSED => 'Not Processed', self::STATUS_PROCESSED => 'Processed'];

    protected $guarded=['id','created_at','updated_at'];

    /**
     *
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotProcessed($query)
    {
        return $query->where('status',self::STATUS_NOT_PROCESSED);
    }
}


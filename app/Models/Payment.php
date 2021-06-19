<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model implements TranslatableContract
{
    use Translatable;

    protected $fillable = ['created_at', 'updated_at'];

    protected $translatedAttributes  = ['title', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentTranslation()
    {
        return $this->hasMany('App\Models\PaymentTranslation');
    }

    public static function getForSelect() {
        $payments = Payment::orderBy('created_at', 'desc')->get();
        $result = [];
        foreach ($payments as $payment) {
            $result[$payment->id] = $payment->title;
        }
        return($result);
    }

}

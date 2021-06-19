<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory, Sluggable;

    const STATUSES = [1 => 'Enabled', 0 => 'Disabled'];

    protected $fillable = [
        'image',
        'name',
        'slug',
        'opentime',
        'email',
        'address',
        'phone',
        'active'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public static function getForSelect() : array
    {

        //dd(Supplier::all());

        $suppliers = Supplier::orderBy('created_at', 'desc')->get();
        $result = [];
        foreach ($suppliers as $supplier) {
            $result[$supplier->id] = $supplier->name;
        }
        return($result);
    }

    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class);
    }
}

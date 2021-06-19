<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class ProductCategory extends Model implements TranslatableContract
{
    use  Sluggable, Translatable;

    const STATUSES = [1 => 'Enabled', 0 => 'Disabled'];

    protected $fillable = [
        'sort',
        'slug',
        'parent_id',
        'name',
    ];

    public $translatedAttributes = ['title', 'description'];

    public function resolveRouteBinding($slug, $field = null)
    {
        if ($product = ProductCategory::find($slug)) {
            return $product;
        }
        $slug = Product::published()->where('slug', $slug)->first()
            ?? ProductCategoryTranslation::where('slug', $slug)->firstOrFail()->product()->published()->first();

        return $slug;
    }

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
//commit99
    public static function getForSelect(): array
    {
        $product_categories = ProductCategory::orderBy('sort')->get();
        $result = [];
        foreach ($product_categories as $product_category) {
            $result[$product_category->id] = $product_category->title;
        }
        return($result);
    }

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function productCategoryTranslation(): HasMany
    {
        return $this->hasMany(ProductCategoryTranslation::class);
    }
}

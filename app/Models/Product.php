<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Product extends Model implements TranslatableContract
{
    use HasFactory, Sluggable, Translatable;

    const STATUSES = [1 => 'Enabled', 0 => 'Disabled'];

    protected $fillable = [

        'sort',
        'slug',
        'status',
        'product_category_id',
        'product_id',
        'supplier_id',
        'price',
        'image',
        'name'
    ];
    protected $translatedAttributes = ['title', 'description'];

    public function resolveRouteBinding($slug, $field = null)
    {
        if ($product = Product::find($slug)) {
            return $product;
        }
        $slug = Product::published()->where('slug', $slug)->first()
            ?? ProductTranslation::where('slug', $slug)->firstOrFail()->product()->published()->first();

        return $slug;
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopePublished($query)
    {
        return $query->where('status', self::STATUSES[1])->orderBy('sort', 'desc');
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

    public static function getForSelect() {
        $products = Product::all();
        $result = [];
        foreach ($products as $product) {
            $result[$product->id] = $product->name;
        }
        return($result);
    }

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * @return HasMany
     */
    public function productTranslation(): HasMany
    {
        return $this->hasMany('App\Models\ProductTranslation');
    }

    /**
     * @return string|null
     */
    public function getSlugByLang(): ?string
    {
        return $this->productTranslation()
            ->where('locale', LaravelLocalization::getCurrentLocale())->first()->slug;
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: hasasn
 * Date: 01/15/23
 * Time: 01:22 PM
 */

namespace App\Services\Traits;

use App\Models\Language;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

trait Translatable
{
    /**
     * @return BelongsToMany
     */
    public function translations(): BelongsToMany
    {
        $snake_class_name = Str::snake(str_replace('App\\Models\\', '', get_called_class()));
        $class_name = Str::lower($snake_class_name);
        $plural_model = Str::plural($class_name);

        return $this->belongsToMany(Language::class, "{$plural_model}_translations",
            "{$class_name}_id", 'translation_id')
            ->withPivot($this->translatable_attributes)->withTimestamps();
    }

    /**
     * @param $name
     * @return array|mixed|string
     */
    public function __get($name)
    {
        if (in_array($name, $this->translatable_attributes)) {
            return $this->castTranslatedAttribute($name);
        }

        return parent::__get($name);
    }

    /**
     * @param $name
     * @param $arguments
     * @return array|mixed|string
     */
    public function __call($name, $arguments)
    {
        if (in_array($name, $this->translatable_attributes)) {
            return $this->castTranslatedAttribute($name, $arguments[0] ?? NULL);
        }

        return parent::__call($name, $arguments);
    }

    /**
     * Cast any attribute to returned as array of all current languages.
     *
     * @param string $attribute
     * @return array|string
     */
    private function castTranslatedAttribute(string $attribute, $language = null)
    {
        $casted_attribute = [];
        $this->translations()->get()->each(function ($translation) use (&$casted_attribute, $attribute) {
            $casted_attribute[$translation->code] = $translation->pivot->{$attribute};
        });

        $local = request()->header('X-localization') ?? $language ?? Language::where('default', 1)->first()->code ?? Language::first()->code ?? '';

        return $casted_attribute[$local] ?? $casted_attribute['en'] ?? '';
    }


    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::deleted(function ($model) {
            if (method_exists($model, 'translations'))
                $model->translations()->detach();
        });
    }
}

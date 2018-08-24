<?php

namespace AvoRed\Framework\Models\Database;

use Illuminate\Database\Eloquent\Collection;

class Country extends BaseModel
{
    protected $fillable = [
        'name',
        'code',
        'phone_code',
        'currency_code',
        'lang_code',
        'is_active'
    ];

    public function states()
    {
        return $this->hasMany(State::class);
    }

    public static function options($empty = true) {

        $model = new static();

        $options = $model->all()->pluck('name', 'id');
        if(true === $empty) {
            $options->prepend('Please Select', null);
        }
        return $options;
    }
}

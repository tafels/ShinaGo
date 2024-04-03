<?php

namespace App\Services;

use App\Models\Characteristic;

class CharacteristicService extends BaseService
{
    public function getCharacteristic($groupId = null, $typeCharacteristic = null)
    {
        $builder = Characteristic::where('published', true);
        if ($groupId) {
            $builder->where('group_id', $groupId);
        }
        if ($typeCharacteristic) {
            $builder->where('short_name', $typeCharacteristic);
        }
        $builder = $builder->get();

        $builder = $builder->keyBy('short_name');

        $builder->map(function ($item, $key) {

            if ($item->slug == 'brand') {
                $map = $item->getBrands();
            } else {
                $map = $item->getCharacteristicValue()
                    ->where(function ($query) {
                        $query->where('language', '*')
                            ->orWhere('language', request()->getLocale());
                    });
            }
            $item->value = $map->where(['published' => true])->get();
        });

        return $builder;
    }
}

<?php

namespace App\Services;

use App\Models\Characteristic;

class CharacteristicService extends BaseService
{
    private $group_id;
    public $type_characteristic;
    public $popular;

    /**
     * @param $group_id
     * @return void
     */
    public function setGroupId($group_id)
    {
        $this->group_id = $group_id;
    }

    /**
     * @param $type
     * @return void
     */
    public function setTypeCharacteristic($type)
    {
        $this->type_characteristic = $type;
    }

    /**
     * @param $popular boolean
     * @return void
     */
    public function setPopular(bool $popular)
    {
        $this->popular = $popular;
    }

    public function getCharacteristic()
    {
        $builder = Characteristic::where('published', true);

        if (isset($this->group_id)) {
            $builder->where('group_id', $this->group_id);
        }
        if (isset($this->type_characteristic)) {
            $builder->where('short_name', $this->type_characteristic);
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



//            if (isset($this->popular)) {
//                $item->value->orderBy('popular','desc');
//            }
//            $item->value->orderBy('ordering')
//                ->orderBy('name')
//                ->get()->except(['updated_at', 'created_at']);
        });

        return $builder;
    }


}

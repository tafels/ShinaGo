<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \App\Services\CharacteristicService setGroupId(int $id)
 * @method static \App\Services\CharacteristicService setTypeCharacteristic(string $type)
 * @method static \App\Services\CharacteristicService CharacteristicService()
 * @see \App\Services\CharacteristicService
 */

class CharacteristicService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'CharacteristicService';
    }

}

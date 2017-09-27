<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 27.09.2017
 * Time: 13:26
 */

namespace App\Lib\Journal\Transformers;


use App\Lib\Journal\Interfaces\TransformerInterface;
use Illuminate\Support\Collection;

class DatabaseTransformer implements TransformerInterface
{
    /**
     * @param Collection|null $data
     *
     * @return array
     */
    function transform(Collection $data): array
    {
        $return = [
            'user_id' => null,
            'data' => null,
        ];

        if ($data->has('user_id')) {
            $return['user_id'] = $data->pull('user_id');
        }

        $return['data'] = $data->toArray();

        return $return;
    }
}
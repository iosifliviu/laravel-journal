<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 27.09.2017
 * Time: 13:45
 */

namespace App\Lib\Journal\Transformers;


use App\Lib\Journal\Interfaces\EntryInterface;
use App\Lib\Journal\Interfaces\TransformerInterface;
use Illuminate\Support\Collection;

class DefaultTransformer implements TransformerInterface
{
    /**
     * @param \Illuminate\Support\Collection $data
     *
     * @return array
     */
    function transform(Collection $data): array
    {
        return $data->toArray();
    }

}
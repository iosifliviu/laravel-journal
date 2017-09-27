<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 27.09.2017
 * Time: 13:45
 */

namespace Iionut\LaravelJournal\Transformers;


use Iionut\LaravelJournal\Interfaces\EntryInterface;
use Iionut\LaravelJournal\Interfaces\TransformerInterface;
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

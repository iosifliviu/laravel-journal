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

class DefaultTransformer implements TransformerInterface
{
    /**
     * @param \Iionut\LaravelJournal\Interfaces\EntryInterface $entry
     *
     * @return array
     */
    function transform(EntryInterface $entry): array
    {
        return $data->toArray();
    }

}

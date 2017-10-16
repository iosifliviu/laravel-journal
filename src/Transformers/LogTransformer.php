<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 27.09.2017
 * Time: 13:47
 */

namespace Iionut\LaravelJournal\Transformers;


use Iionut\LaravelJournal\Interfaces\EntryInterface;
use Iionut\LaravelJournal\Interfaces\TransformerInterface;

class LogTransformer implements TransformerInterface
{
    function transform(EntryInterface $entry): array
    {
        return [
            'data' => $entry->getData()->toArray(),
            'meta' => $entry->getData()->toArray()
        ];
    }

}

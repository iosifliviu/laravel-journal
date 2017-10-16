<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 27.09.2017
 * Time: 13:26
 */

namespace Iionut\LaravelJournal\Transformers;


use Iionut\LaravelJournal\Interfaces\EntryInterface;
use Iionut\LaravelJournal\Interfaces\TransformerInterface;

class DatabaseTransformer implements TransformerInterface
{
    /**
     * @param \Iionut\LaravelJournal\Interfaces\EntryInterface $entry
     *
     * @return array
     */
    function transform(EntryInterface $entry): array
    {
        $return = [
            'user_id' => null,
            'data' => null,
        ];

        if ($entry->getData()->has('user_id')) {
            $return['user_id'] = $entry->getData()->pull('user_id');
        }

        $return['data'] = $entry->getData()->toArray();

        return $return;
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 27.09.2017
 * Time: 13:27
 */

namespace Iionut\LaravelJournal\Interfaces;


use Illuminate\Support\Collection;

interface TransformerInterface
{
    /**
     * @param \Iionut\LaravelJournal\Interfaces\EntryInterface $entry
     *
     * @return array
     */
    function transform(EntryInterface $entry): array;
}

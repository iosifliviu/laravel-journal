<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 27.09.2017
 * Time: 11:00
 */

namespace Iionut\LaravelJournal\Adapters;


use Iionut\LaravelJournal\Interfaces\AdapterInterface;
use Iionut\LaravelJournal\Interfaces\EntryInterface;

class NullAdapter implements AdapterInterface
{
    public function write(EntryInterface $entry)
    {
        // do nothing
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 27.09.2017
 * Time: 11:00
 */

namespace App\Lib\Journal\Adapters;


use App\Lib\Journal\Interfaces\AdapterInterface;
use App\Lib\Journal\Interfaces\EntryInterface;

class NullAdapter implements AdapterInterface
{
    public function write(EntryInterface $action)
    {
        // do nothing
    }
}
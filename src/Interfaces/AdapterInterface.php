<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 27.09.2017
 * Time: 10:57
 */

namespace Iionut\LaravelJournal\Interfaces;


interface AdapterInterface
{
    function write(EntryInterface $action);
}

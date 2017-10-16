<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 16.10.2017
 * Time: 13:23
 */

namespace Iionut\LaravelJournal\Interfaces;


interface InjectorInterface
{
    function inject(EntryInterface $entry): EntryInterface;
}

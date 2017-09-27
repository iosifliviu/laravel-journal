<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 25.09.2017
 * Time: 15:51
 */

namespace App\Lib\Journal\Facade;


use Illuminate\Support\Facades\Facade;

class Journal extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Journal';
    }
}
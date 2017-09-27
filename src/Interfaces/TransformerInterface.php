<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 27.09.2017
 * Time: 13:27
 */

namespace App\Lib\Journal\Interfaces;


use Illuminate\Support\Collection;

interface TransformerInterface
{
    /**
     * @param \Illuminate\Support\Collection $data
     *
     * @return array
     */
    function transform(Collection $data): array;
}
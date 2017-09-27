<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 27.09.2017
 * Time: 13:15
 */

namespace App\Lib\Journal\Entries;


final class Entry extends AbstractEntry
{
    /**
     * Entry constructor.
     *
     * @param string     $name
     * @param \Illuminate\Support\Collection|array|null $data
     */
    public function __construct(string $name, $data = null)
    {
        $this->name = $name;

        $this->setData($data);
    }
}

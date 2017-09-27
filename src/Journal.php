<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 25.09.2017
 * Time: 15:50
 */

namespace App\Lib\Journal;


use App\Lib\Journal\Entries\Entry;

class Journal
{
    /**
     * @var \App\Lib\Journal\Interfaces\AdapterInterface
     */
    private $adapter;

    /**
     * Journal constructor.
     *
     * @param \App\Lib\Journal\Interfaces\AdapterInterface $adapter
     */
    public function __construct(\App\Lib\Journal\Interfaces\AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @param string $name
     * @param array $arguments
     */
    public function __call($name, $arguments)
    {
        $entry = new Entry($name, ...$arguments);

        $this->adapter->write($entry);
    }
}
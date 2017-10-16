<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 25.09.2017
 * Time: 15:50
 */

namespace Iionut\LaravelJournal;


use Iionut\LaravelJournal\Entries\Entry;
use Iionut\LaravelJournal\Injectors\HttpRequestInjector;
use Illuminate\Support\Facades\App;

class Journal
{
    /**
     * @var \Iionut\LaravelJournal\Interfaces\AdapterInterface
     */
    private $adapter;

    /**
     * Journal constructor.
     *
     * @param \Iionut\LaravelJournal\Interfaces\AdapterInterface $adapter
     */
    public function __construct(\Iionut\LaravelJournal\Interfaces\AdapterInterface $adapter)
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

        /** @var \Iionut\LaravelJournal\Interfaces\InjectorInterface $httpRequestInjector */
        $httpRequestInjector = App::make('HttpRequestInjector');

        $httpRequestInjector->inject($entry);

        $this->adapter->write($entry);
    }
}

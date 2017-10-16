<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 16.10.2017
 * Time: 13:22
 */

namespace Iionut\LaravelJournal\Injectors;


use Iionut\LaravelJournal\Interfaces\EntryInterface;
use Iionut\LaravelJournal\Interfaces\InjectorInterface;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;

class HttpRequestInjector implements InjectorInterface
{
    /**
     * @param \Iionut\LaravelJournal\Interfaces\EntryInterface $entry
     *
     * @return \Iionut\LaravelJournal\Interfaces\EntryInterface
     */
    public function inject(EntryInterface $entry): EntryInterface
    {
        $this->injectIp($entry);
        $this->injectUserAgent($entry);

        return $entry;
    }

    /**
     * @param \Iionut\LaravelJournal\Interfaces\EntryInterface $entry
     */
    private function injectIp(EntryInterface $entry)
    {
        if (App::runningInConsole()) {
            return;
        }

        $entry->getMeta()->put('ip', Request::ip());
    }

    /**
     * @param \Iionut\LaravelJournal\Interfaces\EntryInterface $entry
     */
    private function injectUserAgent(EntryInterface $entry)
    {
        if (App::runningInConsole()) {
            return;
        }

        $entry->getMeta()->put('userAgent', Request::header('User-Agent', null));
    }
}

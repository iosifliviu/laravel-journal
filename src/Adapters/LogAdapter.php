<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 27.09.2017
 * Time: 12:56
 */

namespace Iionut\LaravelJournal\Adapters;


use Iionut\LaravelJournal\Interfaces\AdapterInterface;
use Iionut\LaravelJournal\Interfaces\EntryInterface;
use Illuminate\Support\Facades\Log;

class LogAdapter implements AdapterInterface
{
    /**
     * @var \Iionut\LaravelJournal\Interfaces\TransformerInterface
     */
    private $transformer;

    /**
     * LogAdapter constructor.
     *
     * @param \Iionut\LaravelJournal\Interfaces\TransformerInterface $transformer
     */
    public function __construct(\Iionut\LaravelJournal\Interfaces\TransformerInterface $transformer)
    {
        $this->transformer = $transformer;
    }

    function write(EntryInterface $entry)
    {
        $transformed = $this->transformer->transform($entry->getData());

        Log::info("Journal Entry {$entry->getName()}", $transformed);
    }
}

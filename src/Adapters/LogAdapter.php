<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 27.09.2017
 * Time: 12:56
 */

namespace App\Lib\Journal\Adapters;


use App\Lib\Journal\Interfaces\AdapterInterface;
use App\Lib\Journal\Interfaces\EntryInterface;
use Illuminate\Support\Facades\Log;

class LogAdapter implements AdapterInterface
{
    /**
     * @var \App\Lib\Journal\Interfaces\TransformerInterface
     */
    private $transformer;

    /**
     * LogAdapter constructor.
     *
     * @param \App\Lib\Journal\Interfaces\TransformerInterface $transformer
     */
    public function __construct(\App\Lib\Journal\Interfaces\TransformerInterface $transformer)
    {
        $this->transformer = $transformer;
    }

    function write(EntryInterface $action)
    {
        $transformed = $this->transformer->transform($action->getData());

        Log::info("Journal Entry {$action->getName()}", $transformed);
    }
}
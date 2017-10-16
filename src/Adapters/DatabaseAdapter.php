<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 27.09.2017
 * Time: 10:57
 */

namespace Iionut\LaravelJournal\Adapters;


use Iionut\LaravelJournal\Interfaces\AdapterInterface;
use Iionut\LaravelJournal\Interfaces\EntryInterface;
use Illuminate\Support\Facades\DB;

class DatabaseAdapter implements AdapterInterface
{
    /**
     * @var \Iionut\LaravelJournal\Interfaces\TransformerInterface
     */
    private $transformer;

    /**
     * DatabaseAdapter constructor.
     *
     * @param \Iionut\LaravelJournal\Interfaces\TransformerInterface $transformer
     */
    public function __construct(\Iionut\LaravelJournal\Interfaces\TransformerInterface $transformer)
    {
        $this->transformer = $transformer;
    }

    /**
     * @param EntryInterface $entry
     */
    public function write(EntryInterface $entry)
    {
        $transformed = $this->transformer->transform($entry);

        DB::table('journal')->insert([
            [
                'action'     => $entry->getName(),
                'user_id'    => $transformed['user_id'],
                'data'       => $transformed['data'],
                'ip'         => $entry->getMeta()->has('ip') ? $entry->getMeta()->get('ip') : null,
                'user_agent' => $entry->getMeta()->has('userAgent') ? $entry->getMeta()->get('userAgent') : null,
            ],
        ]);
    }
}

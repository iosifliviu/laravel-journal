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
                'data' => json_encode([
                    'data' => !empty($transformed['data']) ? $transformed['data'] : null,
                    'meta' => $entry->getMeta()->toArray()
                ]),
            ],
        ]);
    }
}

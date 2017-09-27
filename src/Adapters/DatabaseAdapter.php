<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 27.09.2017
 * Time: 10:57
 */

namespace Iionut\Adapters\Adapters;


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
     * @param EntryInterface $action
     */
    public function write(EntryInterface $action)
    {
        $transformed = $this->transformer->transform($action);

        DB::table('journal')->insert([
            [
                'action'  => $action->getName(),
                'user_id' => $transformed['user_id'],
                'data'    => $transformed['data'],
            ],
        ]);
    }
}

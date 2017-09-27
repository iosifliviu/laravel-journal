<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 27.09.2017
 * Time: 10:57
 */

namespace App\Lib\Journal\Adapters;


use App\Lib\Journal\Interfaces\AdapterInterface;
use App\Lib\Journal\Interfaces\EntryInterface;
use Illuminate\Support\Facades\DB;

class DatabaseAdapter implements AdapterInterface
{
    /**
     * @var \App\Lib\Journal\Interfaces\TransformerInterface
     */
    private $transformer;

    /**
     * DatabaseAdapter constructor.
     *
     * @param \App\Lib\Journal\Interfaces\TransformerInterface $transformer
     */
    public function __construct(\App\Lib\Journal\Interfaces\TransformerInterface $transformer)
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
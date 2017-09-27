<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 27.09.2017
 * Time: 13:39
 */

namespace App\Lib\Journal\Adapters;


use App\Lib\Journal\Interfaces\AdapterInterface;
use App\Lib\Journal\Transformers\DatabaseTransformer;

class Factory
{

    /**
     * @var \App\Lib\Journal\Transformers\Factory
     */
    private $transformersFactory;

    /**
     * Factory constructor.
     *
     * @param \App\Lib\Journal\Transformers\Factory $transformersFactory
     */
    public function __construct(\App\Lib\Journal\Transformers\Factory $transformersFactory)
    {
        $this->transformersFactory = $transformersFactory;
    }

    /**
     * @return \App\Lib\Journal\Interfaces\AdapterInterface
     */
    public function createDatabaseAdapter(): AdapterInterface
    {
        return new DatabaseAdapter($this->transformersFactory->createDatabaseTransformer());
    }

    /**
     * @return \App\Lib\Journal\Interfaces\AdapterInterface
     */
    public function createLogAdapter(): AdapterInterface
    {
        return new LogAdapter($this->transformersFactory->createLogTransformer());
    }

    /**
     * @return \App\Lib\Journal\Interfaces\AdapterInterface
     */
    public function createNullAdapter(): AdapterInterface
    {
        return new NullAdapter();
    }
}
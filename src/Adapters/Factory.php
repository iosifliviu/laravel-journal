<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 27.09.2017
 * Time: 13:39
 */

namespace Iionut\LaravelJournal\Adapters;


use Iionut\LaravelJournal\Interfaces\AdapterInterface;

class Factory
{

    /**
     * @var \Iionut\LaravelJournal\Transformers\Factory
     */
    private $transformersFactory;

    /**
     * Factory constructor.
     *
     * @param \Iionut\LaravelJournal\Transformers\Factory $transformersFactory
     */
    public function __construct(\Iionut\LaravelJournal\Transformers\Factory $transformersFactory)
    {
        $this->transformersFactory = $transformersFactory;
    }

    /**
     * @return \Iionut\LaravelJournal\Interfaces\AdapterInterface
     */
    public function createDatabaseAdapter(): AdapterInterface
    {
        return new DatabaseAdapter($this->transformersFactory->createDatabaseTransformer());
    }

    /**
     * @return \Iionut\LaravelJournal\Interfaces\AdapterInterface
     */
    public function createLogAdapter(): AdapterInterface
    {
        return new LogAdapter($this->transformersFactory->createLogTransformer());
    }

    /**
     * @return \Iionut\LaravelJournal\Interfaces\AdapterInterface
     */
    public function createNullAdapter(): AdapterInterface
    {
        return new NullAdapter();
    }
}

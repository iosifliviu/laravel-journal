<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 27.09.2017
 * Time: 13:53
 */

namespace Iionut\LaravelJournal\Transformers;


class Factory
{
    public function createDefaultTransformer()
    {
        return new DefaultTransformer();
    }

    public function createLogTransformer()
    {
        return new LogTransformer();
    }

    public function createDatabaseTransformer()
    {
        return new DatabaseTransformer();
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 25.09.2017
 * Time: 15:52
 */

namespace Iionut\LaravelJournal;


use Iionut\LaravelJournal\Adapters\Factory;
use Iionut\LaravelJournal\Injectors\HttpRequestInjector;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class JournalServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/journal.php' => config_path('journal.php'),
        ]);

        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
    }

    public function register()
    {
        $this->app->bind('HttpRequestInjector', HttpRequestInjector::class);

        $this->app->bind('JournalAdapterFactory', Factory::class);

        $this->app->bind('Journal', function (Application $app) {
            switch(env('JOURNAL_DRIVER', 'null')) {
                case 'null':
                    $adapter = $app->make('JournalAdapterFactory')->createNullAdapter();
                    break;
                case 'database':
                    $adapter = $app->make('JournalAdapterFactory')->createDatabaseAdapter();
                    break;
                case 'log':
                    $adapter = $app->make('JournalAdapterFactory')->createLogAdapter();
                    break;
                default:
                    throw new \Exception('Invalid journal driver defined in env');
            }

            return new Journal($adapter);
        });
    }
}

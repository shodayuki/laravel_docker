<?php

namespace App\Providers;

use App\BlowfishEncrypter;
use App\DataProvider\PublisherRepositoryInterface;
use App\Domain\Repository\PublisherRepository;
use Illuminate\Encryption\MissingAppKeyException;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            'encrypter',
            function ($app) {
                $config = $app->make('config')->get('app');

                return new BlowfishEncrypter($this->parseKey($config));
            }
        );

        $this->app->bind(
            PublisherRepositoryInterface::class,
            PublisherRepository::class
        );
    }

    /**
     * @param array $config
     * @return false|string|null
     */
    public function parseKey(array $config)
    {
        if (Str::startsWith($key = $this->key($config), $prefix = 'base64:')) {
            $key = base64_decode(Str::after($key, $prefix));
        }

        return $key;
    }

    /**
     * @param array $config
     * @return void
     */
    public function key(array $config)
    {
        return tap(
            $config['key'],
            function ($key) {
                if (empty($key)) {
                    throw new MissingAppKeyException;
                }
            }
        );
    }
}

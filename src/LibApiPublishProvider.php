<?php
namespace Jefferyjob\LaravelLibApi;

use Illuminate\Support\ServiceProvider;
use Jefferyjob\LaravelLibApi\Exceptions\RuntimeException;

/**
 * --------------------------------------------------------------------------
 * 引导发布程序
 * 为 laravel 提供配置
 * --------------------------------------------------------------------------
 */
class LibApiPublishProvider extends ServiceProvider
{
    /**
     * 引导发布应用程序
     * @throws RuntimeException
     */
    public function boot()
    {
        // 发布配置文件，将配置文件发不到 laravel 的 conf 目录下
//        $config_path = realpath(__DIR__.'/Publish/lib_api.php');
//        if(!$config_path) {
//            throw new RuntimeException("LaravelLibApi Error");
//        }
//        $this->publishes([
//            $config_path => config_path('lib_api.php'),
//        ]);

        $config_path1 = realpath(__DIR__.'/Publish/lib_api.php');
        $config_path2 = realpath(__DIR__.'/Publish/api_code.php');
        if(!$config_path1 || !$config_path2) {
            throw new RuntimeException("LaravelLibApi config file path not found");
        }
        $this->publishes([
            $config_path1 => config_path('lib_api.php'),
            $config_path2 => config_path('api_code.php'),
        ]);
    }

}
<?php
namespace Jefferyjob\LaravelLibApi;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Jefferyjob\LaravelLibApi\App\ApiResponse;
use Jefferyjob\LaravelLibApi\Exceptions\RuntimeException;

/**
 * --------------------------------------------------------------------------
 * 引导发布程序
 * 为 laravel 提供配置
 * --------------------------------------------------------------------------
 */
class LibApiServiceProvider extends LaravelServiceProvider
{
    /**
     * 标记着提供器是延迟加载的
     *
     * @var bool
     */
    protected bool $defer = true;

    /**
     * 引导发布应用程序
     */
    public function boot()
    {
        // 发布配置文件
        $config_path1 = realpath(__DIR__.'/Publish/lib_api.php');
        $config_path2 = realpath(__DIR__.'/Publish/api_code.php');
        $this->publishes([
            $config_path1 => config_path('lib_api.php'),
            $config_path2 => config_path('api_code.php'),
        ]);
    }

    /**
     * 注册服务
     */
    public function register()
    {
        // 服务注册
        $this->app->singleton(ApiResponse::class, ApiResponse::class);
        // 给服务一个别名
        $this->app->alias(ApiResponse::class, 'ApiResponse');
    }

    /**
     * 获取服务
     *
     * @return array|void
     */
    public function provides()
    {
        return [ApiResponse::class, 'ApiResponse'];
    }

}
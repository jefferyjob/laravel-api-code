<?php
namespace Jefferyjob\LaravelLibApi;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Jefferyjob\LaravelLibApi\App\ApiCode;

/**
 * --------------------------------------------------------------------------
 * 引导发布程序
 * 为 laravel 提供配置
 * --------------------------------------------------------------------------
 */
class ApiCodeServiceProvider extends LaravelServiceProvider
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
        $config_lib_api = realpath(__DIR__ . '/Publish/api_code_conf.php');
        $config_api_code = realpath(__DIR__.'/Publish/api_code.php');
        // $middleware_api = realpath(__DIR__.'/Publish/Api.php');
        $this->publishes([
            $config_lib_api => config_path('api_code_conf.php'),
            $config_api_code => config_path('api_code.php'),
            // $middleware_api => app_path('Http/Middleware/Api.php'),
        ]);


    }

    /**
     * 注册服务
     */
    public function register()
    {
        // 服务注册
        $this->app->singleton(ApiCode::class, ApiCode::class);
        // 给服务一个别名
        $this->app->alias(ApiCode::class, 'ApiCode');
    }

    /**
     * 获取服务
     *
     * @return array|void
     */
    public function provides()
    {
        return [ApiCode::class, 'ApiCode'];
    }

}
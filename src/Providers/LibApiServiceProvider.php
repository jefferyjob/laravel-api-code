<?php
namespace Jefferyjob\LaravelLibApi\Providers;

use Illuminate\Support\ServiceProvider;
use Jefferyjob\LaravelLibApi\App\ApiResponse;
use Jefferyjob\LaravelLibApi\Exceptions\RuntimeException;

/**
 * --------------------------------------------------------------------------
 * 引导发布程序
 * 为 laravel 提供配置
 * --------------------------------------------------------------------------
 */
class LibApiServiceProvider extends ServiceProvider
{
    /**
     * 标记着提供器是延迟加载的
     *
     * @var bool
     */
    protected bool $defer = true;

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
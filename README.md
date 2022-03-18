# Laravel Library Api Code

## 安装

**composer 安装**

```bash
composer require jefferyjob/laravel-lib-api
```

**添加服务**

在 laravel framework 配置目录 conf 目录的 app.php 文件种，容器配置 providers 种配置IOC

```php
Jefferyjob\LaravelLibApi\Providers\LibApiPublishProvider::class
```

**发布配置**

```bash
php artisan vendor:publish --provider="Jefferyjob\LaravelLibApi\LibApiServiceProvider"
```

## API数据优化

在 `app/Exceptions/Handler.php` 增加，接口在匹配以下规则的情况下，在异常抛出中以 Json 格式输出错误。

```php
/**
 * Render an exception into an HTTP response.
 * 将异常渲染至 HTTP 响应值中
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \Throwable  $e
 * @return \Symfony\Component\HttpFoundation\Response
 *
 * @throws \Throwable
 */
public function render($request, Throwable $e)
{
    if ($request->is('ajax/*') || $request->is('api/*') || $request->ajax()){
        return response()->json((new ApiContent())->getExceptionContent($request, $e), 200);
    } else {
        return parent::render($request, $e);
    }
}
```

在 `app/Http/Middleware/Api.php` 
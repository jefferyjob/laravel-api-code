# Laravel Library Api Code

## 安装

**composer 安装**

```bash
composer require jefferyjob/laravel-lib-api
```

**发布配置**

```bash
php artisan vendor:publish --provider="Jefferyjob\LaravelLibApi\LibApiPublishProvider"
```

**添加服务**

在 laravel framework 配置目录 conf 目录的 app.php 文件种，容器配置 providers 种配置IOC

```php
Jefferyjob\LaravelLibApi\Providers\LibApiServiceProvider::class
```
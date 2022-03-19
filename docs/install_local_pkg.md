# Laravel 安装本地包

修改laravel项目根目录下的composer.json配置

```json
"repositories": [
    {
        "type": "path",
        "url": "../laravel-api-code"
    }
],
```

执行composer命令

```bash
composer require jefferyjob/laravel-api-code:*@dev
```

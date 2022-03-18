<?php
namespace Jefferyjob\LaravelLibApi\App;

class ApiCode
{
    /**
     * 获取 Api Code 数组
     */
    static public function getApiCode()
    {
        return config('api_code');
    }

    /**
     * 根据code获取message信息
     *
     * @param int $code
     * @return string
     */
    static public function getApiMessage(int $code) : string
    {
        return self::getApiCode()[$code] ?? 'Not found code message';
    }
}
<?php

namespace Jefferyjob\LaravelLibApi\App;

class Config
{
    /**
     * 获取框架debug参数
     */
    static public function getLaravelDebug()
    {
        return config('app.debug');
    }

    /**
     * 获取配置文件
     */
    static public function getConf(string $param)
    {
        return config('api_code_conf.'.$param);
    }

    /**
     * 获取api字段是否返回定义
     */
    static public function getConfApiReturn(string $param)
    {
        return config('api_code_conf.api_return.'.$param);
    }

    /**
     * 获取 Api Code 数组
     */
    static public function getApiCode()
    {
        return config('api_code');
    }
}
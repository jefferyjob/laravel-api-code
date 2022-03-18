<?php
namespace Jefferyjob\LaravelLibApi\App;

use Jefferyjob\LaravelLibApi\Exceptions\RuntimeException;
use Jefferyjob\LaravelLibApi\Exceptions\AuthenticationException;
use Jefferyjob\LaravelLibApi\Exceptions\ErrorException;
use Jefferyjob\LaravelLibApi\Exceptions\HttpException;
use Jefferyjob\LaravelLibApi\Exceptions\ValidationException;

/**
 * Api 响应通用接口
 */
class ApiResponse
{
    /**
     * Api 请求成功
     *
     * @param string|int|null $message
     * @param int $code
     * @param array $data
     * @throws HttpException
     */
    public function success(string|int $message = null, int $code = 100, array $data = [])
    {
        throw new HttpException($message, ApiEnum::SUCCESS->value);
    }

    /**
     * 框架错误异常处理
     *
     * @param string|int $message
     * @param int $code
     * @param array $data
     * @throws ErrorException
     */
    public function error(string|int $message, int $code, array $data = [])
    {
        throw new ErrorException($message, $code);
    }

    /**
     * 逻辑执行错误异常处理
     *
     * @param string|int $message
     * @param int $code
     * @param array $data
     * @throws RuntimeException
     */
    public function runtime(string|int $message, int $code, array $data = [])
    {
        throw new RuntimeException($message, $code);
    }

    /**
     * 账号验证异常处理
     *
     * @param string|int $message
     * @param int $code
     * @param array $data
     * @throws AuthenticationException
     */
    public function authentication(string|int $message, int $code, array $data = [])
    {
        throw new AuthenticationException($message, $code);
    }

    /**
     * 参数验证失败
     *
     * @param string|int $message
     * @param int $code
     * @param array $data
     * @throws ValidationException
     */
    public function validation(string|int $message, int $code, array $data = [])
    {
        throw new ValidationException($message, $code);
    }
}
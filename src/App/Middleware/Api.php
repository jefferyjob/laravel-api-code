<?php
namespace Jefferyjob\LaravelApiCode\App\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Jefferyjob\LaravelApiCode\App\ApiCode;
use Jefferyjob\LaravelApiCode\App\Config;

class Api
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // 异常处理交给 handler 处理
        if ($response->exception) {
            return $response;
        }

        // 获取逻辑执行返回结构
        $responseData = $response instanceof JsonResponse ? $response->getData() : json_decode($response->getContent());

        return $response->setContent(json_encode((new ApiCode())->getSuccessContent((int)Config::getConf('SUCCESS_CODE'), $responseData)));
    }
}

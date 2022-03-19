<?php
namespace Jefferyjob\LaravelLibApi\App;

use Illuminate\Http\Request;
use Jefferyjob\LaravelLibApi\Exceptions\Exception;
use Throwable;

/**
 * Api 响应内容封装
 */
class ApiCode
{
    /**
     * API响应数据
     *
     * @var array
     */
    private array $responseContent = [
        // 'code'           => xxx, // Api响应状态码
        // 'message'        => xxx, // Api响应文本消息
        // 'trace_id'       => xxx, // Api链路追踪ID
        // 'data'           => xxx, // 数据信息
        // 'debug_info'     => xxx, // 调试信息
    ];

    /**
     * Api字段是否返回
     */
    const CODE              = 'code';
    const MESSAGE           = 'message';
    const TRACE_ID          = 'trace_id';
    const DEBUG_INFO        = 'debug_info';

    /**
     * 获取 Api Success 响应组装数据
     *
     * @param int $code
     * @param array $data
     * @return array
     */
    public function getSuccessContent(int $code, object|array $data = array()): array
    {
        $this->setEventTrigger(eventType: 'success', code: $code, request: app('request'));
        $this->responseContent['data'] = $data;
        return $this->responseContent;
    }

    /**
     * 获取 Api Exception 响应组装数据
     *
     * @param Request $request
     * @param Exception|Throwable $e
     * @return array
     */
    public function getExceptionContent(Request $request, Exception|Throwable $e): array
    {
        $this->setEventTrigger(eventType:'exception', code: 500, request: $request, e: $e);
        return $this->responseContent;
    }

    /**
     * 触发封装数据的事件
     *
     * @param string $eventType
     * @param int|null $code
     * @param Request $request
     * @param Exception|Throwable|null $e
     */
    private function setEventTrigger(string $eventType, int $code, Request $request, Exception|Throwable $e = null)
    {
        if($eventType == 'success' && Config::getConfApiReturn(self::CODE)) {
            $this->setCode($code);
        } else if(Config::getConfApiReturn(self::CODE) && $eventType == 'exception') {
            $this->setExceptionCode($e);
        }

        if(Config::getConfApiReturn(self::MESSAGE)) {
            $this->setMessage();
        }

        if(Config::getConfApiReturn(self::TRACE_ID)) {
            $this->setTraceId($request);
        }

        if($eventType == 'exception' && Config::getConfApiReturn(self::DEBUG_INFO) && Config::getLaravelDebug()) {
            $this->setDebugInfo($e);
        }
    }



    /**
     * 根据code获取message信息
     *
     * @param int $code
     * @return string
     */
    static public function getApiMessage(int $code) : string
    {
        return Config::getApiCode()[$code] ?? 'Not found code message';
    }

    private function setCode(int $code)
    {
        $this->responseContent['code'] = $code;
    }

    private function setExceptionCode(Exception|Throwable $e) : void
    {
        $this->responseContent['code'] = $e->getCode();
    }

    private function setMessage()
    {
        $this->responseContent['message'] = self::getApiMessage($this->responseContent['code']);
    }

    private function setTraceId(Request $request)
    {
        $this->responseContent['trace_id'] = $request->header('request_id');
    }

    private function setDebugInfo(Exception|Throwable $e) : void
    {
        $this->responseContent['debug_info'] = array(
            'debug_message' => $e->getMessage(),
            'exception' => get_class($e),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => collect($e->getTrace())->map(function ($trace) {
                return \Illuminate\Support\Arr::except($trace, ['args']);
            })->all(),
        );
    }
}
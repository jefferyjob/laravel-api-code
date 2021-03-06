<?php
/**
 * --------------------------------------------------------------------------
 * library LaravelLibApi config
 * --------------------------------------------------------------------------
 *
 * 1****        信息，服务器收到请求，需要请求者继续执行操作
 * 2****        成功，操作被成功接受并处理
 * 3****        重定向，需要进一步操作以完成请求
 * 4****        客户端错误，请求包含语法错误或无法完成的请求
 * 5****        服务器错误，服务器在处理请求的过程种发生了错误
 * --------------------------------------------------------------------------
 */
return [

    /*
    |--------------------------------------------------------------------------
    | Api 成功时返回 code
    |--------------------------------------------------------------------------
    */
    'SUCCESS_CODE'      =>      0,

    /*
    |--------------------------------------------------------------------------
    | Api字段是否返回定义
    |--------------------------------------------------------------------------
    |
    | 可在此处定义api字段是否需要返回，根据开发需求完成定制
    | 在生产环境，建议关闭 debug_info，以防止敏感信息泄露
    |
    */
    'api_return' => [
        'code'          =>      true,
        'message'       =>      true,
        'trace_id'      =>      true,
        'debug_info'    =>      true,
    ],
];
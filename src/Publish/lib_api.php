<?php
return [

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
        'status'        =>      true,
        'debug_info'    =>      true,
    ],
];
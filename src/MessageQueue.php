<?php


namespace liupei\messageQueue;


class MessageQueue
{
    /**
     * 创建新实例
     * @param string $type 实例化类型
     * @param array $option 构造参数
     * @return mixed
     */


    /**
     * @param $type
     * @param array $option
     * @return driver\Redis|null
     */
    public static function newMQ($type, $option = [])
    {
        if ($type == 'redis') {
            $class = "\\liupei\\messageQueue\\driver" . ucwords($type);
            return new $class($option);
        } else {
            return null;
        }
    }
}
<?php


namespace liupei\messageQueue\driver;


class Redis extends Base
{
    /**
     * redis hander
     * @var \Redis|null
     */
    private $redis = null;

    /**
     * redis配置参数
     * @var array
     */
    private $config = [
        'host' => '127.0.0.1',
        'password' => '',
        'port' => 6379,
        'select' => 0
    ];

    public function __construct($option)
    {
        $this->config = array_merge($this->config, $option);
        $this->redis = new \Redis();
        $this->redis->connect($this->config['host'], $this->config['port']);
        $this->redis->auth($this->config['password']);
        $this->redis->select($this->config['select']);
    }

    /**
     * 向redis队列写入一条信息
     * @param string $queueName 队列名称
     * @param strign $key 键名
     * @param string $value 键值
     * @return bool
     */
    public function add($queueName, $key, $value)
    {
        return $this->redis->rawCommand("xadd", $queueName, "*", $key ,$value);
    }
}
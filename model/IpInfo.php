<?php

namespace model;

class IpInfo implements \JsonSerializable
{
    protected $publicIp;
    protected $localIp;
    protected $timeSaved;
    protected $humanTimeSaved;
    protected $socket_port;
    protected $message_port;

    /**
     * IpInfo constructor.
     * @param $publicIp
     * @param $localIp
     * @param $socket_port
     * @param $message_port
     * @param $timeSaved
     */
    public function __construct($publicIp, $localIp, $socket_port, $message_port, $timeSaved)
    {
        $this->publicIp = $publicIp;
        $this->localIp = $localIp;
        $this->socket_port = $socket_port;
        $this->message_port = $message_port;
        $this->timeSaved = $timeSaved;
        $this->humanTimeSaved = date('c', $timeSaved);
    }

    /**
     * @return string
     */
    public function getPublicIp()
    {
        return $this->publicIp;
    }

    /**
     * @return string
     */
    public function getLocalIp()
    {
        return $this->localIp;
    }

    /**
     * @return mixed
     */
    public function getTimeSaved()
    {
        return $this->timeSaved;
    }

    /**
     * @return bool|string
     */
    public function getHumanTimeSaved()
    {
        return $this->humanTimeSaved;
    }

    /**
     * @return mixed
     */
    public function getSocketPort()
    {
        return $this->socket_port;
    }

    public function getMessagePort()
    {
        return $this->message_port;
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }


}
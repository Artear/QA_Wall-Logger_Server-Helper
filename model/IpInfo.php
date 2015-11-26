<?php

namespace model;

class IpInfo implements \JsonSerializable
{
    protected $publicIp;
    protected $localIp;
    protected $timeSaved;

    /**
     * IpInfo constructor.
     * @param $publicIp
     * @param $localIp
     * @param $timeSaved
     */
    public function __construct($publicIp, $localIp, $timeSaved)
    {
        $this->publicIp = $publicIp;
        $this->localIp = $localIp;
        $this->timeSaved = $timeSaved;
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
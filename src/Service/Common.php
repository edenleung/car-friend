<?php

namespace xiaodi\CarFriend\Service;

use xiaodi\CarFriend\CarFriend;
use xiaodi\CarFriend\Message\Message;

class Common extends Service
{
    protected $url = '/api/open/v2/iot/common';

    /**
     * 重写检测状态
     *
     * @param [type] $data
     * @return void
     */
    public function checkStatus(array $data)
    {
        $response = $this->setUrl($this->url . '/checkStatus')->setData($data)->get();

        $format = Message::COMMON;
        $response['formatStatus'] = isset($format[$response['iotStatus']]) ? $format[$response['iotStatus']] : '未知';
        $response['ready'] = $response['iotStatus'] === 'READY' ? true :  false;

        return $response;
    }
}

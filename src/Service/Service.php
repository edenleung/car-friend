<?php

namespace xiaodi\CarFriend\Service;

use GuzzleHttp\Client;
use xiaodi\CarFriend\CarFriend;

class Service
{
	private $openId;
	private $secretKey;

	protected $data;
	protected $url;

	public function __construct($openId, $secretKey)
	{
		$this->openId = $openId;
		$this->secretKey = $secretKey;

		$this->init();
	}

	public function __call($name, $arguments)
	{
		$response = $this->setUrl($this->url . '/' . $name)->setData(...$arguments)->get();

		return $response;
	}

	public function setUrl($url)
	{
		$this->url = $url;

		return $this;
	}

	public function setData(array $data)
	{
		$data['openId'] = $this->openId;
		$this->data = $data;

		return $this;
	}

	public function init()
	{
		$this->client = new Client([
			'base_uri' => CarFriend::API_HOST,
			'headers' => [
				'Content-Type' => 'application/json'
			]
		]);
	}

	private function encodeSign()
	{
		return base64_encode($this->openId) . '.' . openssl_encrypt(json_encode($this->data), 'AES-128-ECB', $this->secretKey);
	}

	public function get()
	{
		$sign = $this->encodeSign($this->data);
		$response = $this->client->request('POST', $this->url, [
			'json' => $this->data,
			'headers' => [
				'sign' => $sign
			]
		]);

		$response = json_decode($response->getBody()->getContents(), true);

		return $response;
	}
}

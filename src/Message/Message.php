<?php

namespace xiaodi\CarFriend\Message;

class Message
{
	const COMMON = [
		'READY' =>	'准备就绪',
		'NOT_READY' =>	'未就绪',
		'WASHING' =>	'洗车中',
		'OFFLINE' =>	'离线',
		'CMD_ERROR' =>	'命令不适用',
		'NOT_ANSWER' =>	'洗车机无响应',
		'LOCKING' =>	'机器已经锁定',
		'TT1_NOT_WASHING' => '不在洗车中',
		'ERROR' =>	'错误'
	];

	const TT1 = [
		'READY' =>	'准备就绪',
		'NOT_READY' =>	'未就绪',
		'WASHING' =>	'洗车中',
		'OFFLINE'	=> '离线',
		'CMD_ERROR'	=> '命令不适用',
		'CAR_ERROR' =>	'车没有停好',
		'NOT_ANSWER' =>	'洗车机无响应',
		'LOCKING'	=> '机器已经锁定',
		'NOT_LOCKING'	=> '洗车机未锁定',
		'ERROR' =>	'错误',
	];
}

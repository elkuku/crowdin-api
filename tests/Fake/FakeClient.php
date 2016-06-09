<?php
/**
 * Created by PhpStorm.
 * User: elkuku
 * Date: 07.06.16
 * Time: 11:16
 */

namespace Tests\Fake;

class FakeClient extends \GuzzleHttp\Client
{
	public function get($uri, array $options = [])
	{
		return count($options) ? $uri . '&' . http_build_query($options) : $uri;
	}

	public function post($uri, array $options = [])
	{
		return count($options) ? $uri . '&' . http_build_query($options) : $uri;
	}
}
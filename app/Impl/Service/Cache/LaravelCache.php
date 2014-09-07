<?php namespace Impl\Service\Cache;

use Illuminate\Cache\CacheManager;

class LaravelCache implements CacheInterface {

	protected $cache;
	protected $cachekey;
	protected $minutes;


}
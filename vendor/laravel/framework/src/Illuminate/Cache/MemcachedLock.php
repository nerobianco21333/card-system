<?php
 namespace Illuminate\Cache; use Illuminate\Contracts\Cache\Lock as LockContract; class MemcachedLock extends Lock implements LockContract { protected $memcached; public function __construct($memcached, $name, $seconds) { parent::__construct($name, $seconds); $this->memcached = $memcached; } public function acquire() { return $this->memcached->add( $this->name, 1, $this->seconds ); } public function release() { $this->memcached->delete($this->name); } } 
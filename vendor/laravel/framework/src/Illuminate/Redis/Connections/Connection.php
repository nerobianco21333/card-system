<?php
 namespace Illuminate\Redis\Connections; use Closure; use Illuminate\Redis\Limiters\DurationLimiterBuilder; use Illuminate\Redis\Limiters\ConcurrencyLimiterBuilder; abstract class Connection { protected $client; abstract public function createSubscription($channels, Closure $callback, $method = 'subscribe'); public function funnel($name) { return new ConcurrencyLimiterBuilder($this, $name); } public function throttle($name) { return new DurationLimiterBuilder($this, $name); } public function client() { return $this->client; } public function subscribe($channels, Closure $callback) { return $this->createSubscription($channels, $callback, __FUNCTION__); } public function psubscribe($channels, Closure $callback) { return $this->createSubscription($channels, $callback, __FUNCTION__); } public function command($method, array $parameters = []) { return $this->client->{$method}(...$parameters); } public function __call($method, $parameters) { return $this->command($method, $parameters); } } 
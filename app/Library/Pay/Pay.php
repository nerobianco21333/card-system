<?php
namespace App\Library\Pay; class Pay { private $driver = null; public function goPay($sp0a27da, $sp2346a9, $spc3fe8b, $sp66faf9, $sp7ca622) { $this->driver = static::getDriver($sp0a27da->id, $sp0a27da->driver); $spc6bf93 = json_decode($sp0a27da->config, true); $spc6bf93['payway'] = $sp0a27da->way; $this->driver->goPay($spc6bf93, $sp2346a9, $spc3fe8b, $sp66faf9, $sp7ca622); return true; } public static function getDriver($spd96048, $sp35934a) { $sp5870de = 'App\\Library\\Pay\\' . ucfirst($sp35934a) . '\\Api'; if (!class_exists($sp5870de)) { throw new \Exception('支付驱动未找到'); } return new $sp5870de($spd96048); } }
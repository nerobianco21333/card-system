<?php
 namespace Predis\Command; class GeospatialGeoHash extends Command { public function getId() { return 'GEOHASH'; } protected function filterArguments(array $arguments) { if (count($arguments) === 2 && is_array($arguments[1])) { $members = array_pop($arguments); $arguments = array_merge($arguments, $members); } return $arguments; } } 
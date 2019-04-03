<?php
 namespace Predis\Command; class GeospatialGeoRadius extends Command { public function getId() { return 'GEORADIUS'; } protected function filterArguments(array $arguments) { if ($arguments && is_array(end($arguments))) { $options = array_change_key_case(array_pop($arguments), CASE_UPPER); if (isset($options['WITHCOORD']) && $options['WITHCOORD'] == true) { $arguments[] = 'WITHCOORD'; } if (isset($options['WITHDIST']) && $options['WITHDIST'] == true) { $arguments[] = 'WITHDIST'; } if (isset($options['WITHHASH']) && $options['WITHHASH'] == true) { $arguments[] = 'WITHHASH'; } if (isset($options['COUNT'])) { $arguments[] = 'COUNT'; $arguments[] = $options['COUNT']; } if (isset($options['SORT'])) { $arguments[] = strtoupper($options['SORT']); } if (isset($options['STORE'])) { $arguments[] = 'STORE'; $arguments[] = $options['STORE']; } if (isset($options['STOREDIST'])) { $arguments[] = 'STOREDIST'; $arguments[] = $options['STOREDIST']; } } return $arguments; } } 
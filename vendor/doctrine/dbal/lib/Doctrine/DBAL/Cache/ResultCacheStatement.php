<?php
 namespace Doctrine\DBAL\Cache; use Doctrine\DBAL\Driver\Statement; use Doctrine\DBAL\Driver\ResultStatement; use Doctrine\Common\Cache\Cache; use PDO; class ResultCacheStatement implements \IteratorAggregate, ResultStatement { private $resultCache; private $cacheKey; private $realKey; private $lifetime; private $statement; private $emptied = false; private $data; private $defaultFetchMode = PDO::FETCH_BOTH; public function __construct(Statement $stmt, Cache $resultCache, $cacheKey, $realKey, $lifetime) { $this->statement = $stmt; $this->resultCache = $resultCache; $this->cacheKey = $cacheKey; $this->realKey = $realKey; $this->lifetime = $lifetime; } public function closeCursor() { $this->statement->closeCursor(); if ($this->emptied && $this->data !== null) { $data = $this->resultCache->fetch($this->cacheKey); if ( ! $data) { $data = array(); } $data[$this->realKey] = $this->data; $this->resultCache->save($this->cacheKey, $data, $this->lifetime); unset($this->data); } } public function columnCount() { return $this->statement->columnCount(); } public function setFetchMode($fetchMode, $arg2 = null, $arg3 = null) { $this->defaultFetchMode = $fetchMode; return true; } public function getIterator() { $data = $this->fetchAll(); return new \ArrayIterator($data); } public function fetch($fetchMode = null) { if ($this->data === null) { $this->data = array(); } $row = $this->statement->fetch(PDO::FETCH_ASSOC); if ($row) { $this->data[] = $row; $fetchMode = $fetchMode ?: $this->defaultFetchMode; if ($fetchMode == PDO::FETCH_ASSOC) { return $row; } elseif ($fetchMode == PDO::FETCH_NUM) { return array_values($row); } elseif ($fetchMode == PDO::FETCH_BOTH) { return array_merge($row, array_values($row)); } elseif ($fetchMode == PDO::FETCH_COLUMN) { return reset($row); } else { throw new \InvalidArgumentException("Invalid fetch-style given for caching result."); } } $this->emptied = true; return false; } public function fetchAll($fetchMode = null) { $rows = array(); while ($row = $this->fetch($fetchMode)) { $rows[] = $row; } return $rows; } public function fetchColumn($columnIndex = 0) { $row = $this->fetch(PDO::FETCH_NUM); if (!isset($row[$columnIndex])) { return false; } return $row[$columnIndex]; } public function rowCount() { return $this->statement->rowCount(); } } 
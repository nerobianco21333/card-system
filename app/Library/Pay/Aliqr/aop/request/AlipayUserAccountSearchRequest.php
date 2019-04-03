<?php
class AlipayUserAccountSearchRequest { private $endTime; private $fields; private $pageNo; private $pageSize; private $startTime; private $type; private $apiParas = array(); private $terminalType; private $terminalInfo; private $prodCode; private $apiVersion = '1.0'; private $notifyUrl; private $returnUrl; private $needEncrypt = false; public function setEndTime($spdbd882) { $this->endTime = $spdbd882; $this->apiParas['end_time'] = $spdbd882; } public function getEndTime() { return $this->endTime; } public function setFields($sp294f98) { $this->fields = $sp294f98; $this->apiParas['fields'] = $sp294f98; } public function getFields() { return $this->fields; } public function setPageNo($spa2a2a6) { $this->pageNo = $spa2a2a6; $this->apiParas['page_no'] = $spa2a2a6; } public function getPageNo() { return $this->pageNo; } public function setPageSize($sp08a323) { $this->pageSize = $sp08a323; $this->apiParas['page_size'] = $sp08a323; } public function getPageSize() { return $this->pageSize; } public function setStartTime($sp7d35f1) { $this->startTime = $sp7d35f1; $this->apiParas['start_time'] = $sp7d35f1; } public function getStartTime() { return $this->startTime; } public function setType($sp4c5fa8) { $this->type = $sp4c5fa8; $this->apiParas['type'] = $sp4c5fa8; } public function getType() { return $this->type; } public function getApiMethodName() { return 'alipay.user.account.search'; } public function setNotifyUrl($sp9f2e2a) { $this->notifyUrl = $sp9f2e2a; } public function getNotifyUrl() { return $this->notifyUrl; } public function setReturnUrl($spa8ca43) { $this->returnUrl = $spa8ca43; } public function getReturnUrl() { return $this->returnUrl; } public function getApiParas() { return $this->apiParas; } public function getTerminalType() { return $this->terminalType; } public function setTerminalType($sp92f3bf) { $this->terminalType = $sp92f3bf; } public function getTerminalInfo() { return $this->terminalInfo; } public function setTerminalInfo($sp4f688a) { $this->terminalInfo = $sp4f688a; } public function getProdCode() { return $this->prodCode; } public function setProdCode($spcc0ec7) { $this->prodCode = $spcc0ec7; } public function setApiVersion($sp19d892) { $this->apiVersion = $sp19d892; } public function getApiVersion() { return $this->apiVersion; } public function setNeedEncrypt($spdf9da1) { $this->needEncrypt = $spdf9da1; } public function getNeedEncrypt() { return $this->needEncrypt; } }
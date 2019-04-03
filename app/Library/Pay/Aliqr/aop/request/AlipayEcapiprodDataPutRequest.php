<?php
class AlipayEcapiprodDataPutRequest { private $category; private $charSet; private $collectingTaskId; private $entityCode; private $entityName; private $entityType; private $isvCode; private $jsonData; private $orgCode; private $apiParas = array(); private $terminalType; private $terminalInfo; private $prodCode; private $apiVersion = '1.0'; private $notifyUrl; private $returnUrl; private $needEncrypt = false; public function setCategory($spcf070f) { $this->category = $spcf070f; $this->apiParas['category'] = $spcf070f; } public function getCategory() { return $this->category; } public function setCharSet($sp41bd2e) { $this->charSet = $sp41bd2e; $this->apiParas['char_set'] = $sp41bd2e; } public function getCharSet() { return $this->charSet; } public function setCollectingTaskId($sp2d5413) { $this->collectingTaskId = $sp2d5413; $this->apiParas['collecting_task_id'] = $sp2d5413; } public function getCollectingTaskId() { return $this->collectingTaskId; } public function setEntityCode($sp221f20) { $this->entityCode = $sp221f20; $this->apiParas['entity_code'] = $sp221f20; } public function getEntityCode() { return $this->entityCode; } public function setEntityName($spdc488e) { $this->entityName = $spdc488e; $this->apiParas['entity_name'] = $spdc488e; } public function getEntityName() { return $this->entityName; } public function setEntityType($spb0494f) { $this->entityType = $spb0494f; $this->apiParas['entity_type'] = $spb0494f; } public function getEntityType() { return $this->entityType; } public function setIsvCode($spb72397) { $this->isvCode = $spb72397; $this->apiParas['isv_code'] = $spb72397; } public function getIsvCode() { return $this->isvCode; } public function setJsonData($spdf039f) { $this->jsonData = $spdf039f; $this->apiParas['json_data'] = $spdf039f; } public function getJsonData() { return $this->jsonData; } public function setOrgCode($sped5bcd) { $this->orgCode = $sped5bcd; $this->apiParas['org_code'] = $sped5bcd; } public function getOrgCode() { return $this->orgCode; } public function getApiMethodName() { return 'alipay.ecapiprod.data.put'; } public function setNotifyUrl($sp9f2e2a) { $this->notifyUrl = $sp9f2e2a; } public function getNotifyUrl() { return $this->notifyUrl; } public function setReturnUrl($spa8ca43) { $this->returnUrl = $spa8ca43; } public function getReturnUrl() { return $this->returnUrl; } public function getApiParas() { return $this->apiParas; } public function getTerminalType() { return $this->terminalType; } public function setTerminalType($sp92f3bf) { $this->terminalType = $sp92f3bf; } public function getTerminalInfo() { return $this->terminalInfo; } public function setTerminalInfo($sp4f688a) { $this->terminalInfo = $sp4f688a; } public function getProdCode() { return $this->prodCode; } public function setProdCode($spcc0ec7) { $this->prodCode = $spcc0ec7; } public function setApiVersion($sp19d892) { $this->apiVersion = $sp19d892; } public function getApiVersion() { return $this->apiVersion; } public function setNeedEncrypt($spdf9da1) { $this->needEncrypt = $spdf9da1; } public function getNeedEncrypt() { return $this->needEncrypt; } }
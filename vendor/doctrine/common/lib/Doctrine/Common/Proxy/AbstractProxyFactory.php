<?php
 namespace Doctrine\Common\Proxy; use Doctrine\Common\Persistence\Mapping\ClassMetadata; use Doctrine\Common\Persistence\Mapping\ClassMetadataFactory; use Doctrine\Common\Proxy\Exception\InvalidArgumentException; use Doctrine\Common\Proxy\Exception\OutOfBoundsException; use Doctrine\Common\Util\ClassUtils; abstract class AbstractProxyFactory { const AUTOGENERATE_NEVER = 0; const AUTOGENERATE_ALWAYS = 1; const AUTOGENERATE_FILE_NOT_EXISTS = 2; const AUTOGENERATE_EVAL = 3; private $metadataFactory; private $proxyGenerator; private $autoGenerate; private $definitions = []; public function __construct(ProxyGenerator $proxyGenerator, ClassMetadataFactory $metadataFactory, $autoGenerate) { $this->proxyGenerator = $proxyGenerator; $this->metadataFactory = $metadataFactory; $this->autoGenerate = (int)$autoGenerate; } public function getProxy($className, array $identifier) { $definition = isset($this->definitions[$className]) ? $this->definitions[$className] : $this->getProxyDefinition($className); $fqcn = $definition->proxyClassName; $proxy = new $fqcn($definition->initializer, $definition->cloner); foreach ($definition->identifierFields as $idField) { if (! isset($identifier[$idField])) { throw OutOfBoundsException::missingPrimaryKeyValue($className, $idField); } $definition->reflectionFields[$idField]->setValue($proxy, $identifier[$idField]); } return $proxy; } public function generateProxyClasses(array $classes, $proxyDir = null) { $generated = 0; foreach ($classes as $class) { if ($this->skipClass($class)) { continue; } $proxyFileName = $this->proxyGenerator->getProxyFileName($class->getName(), $proxyDir); $this->proxyGenerator->generateProxyClass($class, $proxyFileName); $generated += 1; } return $generated; } public function resetUninitializedProxy(Proxy $proxy) { if ($proxy->__isInitialized()) { throw InvalidArgumentException::unitializedProxyExpected($proxy); } $className = ClassUtils::getClass($proxy); $definition = isset($this->definitions[$className]) ? $this->definitions[$className] : $this->getProxyDefinition($className); $proxy->__setInitializer($definition->initializer); $proxy->__setCloner($definition->cloner); return $proxy; } private function getProxyDefinition($className) { $classMetadata = $this->metadataFactory->getMetadataFor($className); $className = $classMetadata->getName(); $this->definitions[$className] = $this->createProxyDefinition($className); $proxyClassName = $this->definitions[$className]->proxyClassName; if ( ! class_exists($proxyClassName, false)) { $fileName = $this->proxyGenerator->getProxyFileName($className); switch ($this->autoGenerate) { case self::AUTOGENERATE_NEVER: require $fileName; break; case self::AUTOGENERATE_FILE_NOT_EXISTS: if ( ! file_exists($fileName)) { $this->proxyGenerator->generateProxyClass($classMetadata, $fileName); } require $fileName; break; case self::AUTOGENERATE_ALWAYS: $this->proxyGenerator->generateProxyClass($classMetadata, $fileName); require $fileName; break; case self::AUTOGENERATE_EVAL: $this->proxyGenerator->generateProxyClass($classMetadata, false); break; } } return $this->definitions[$className]; } abstract protected function skipClass(ClassMetadata $metadata); abstract protected function createProxyDefinition($className); } 
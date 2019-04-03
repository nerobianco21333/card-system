<?php
 namespace Symfony\Component\Translation\Tests\Loader; use PHPUnit\Framework\TestCase; use Symfony\Component\Config\Resource\FileResource; use Symfony\Component\Translation\Loader\YamlFileLoader; class YamlFileLoaderTest extends TestCase { public function testLoad() { $loader = new YamlFileLoader(); $resource = __DIR__.'/../fixtures/resources.yml'; $catalogue = $loader->load($resource, 'en', 'domain1'); $this->assertEquals(array('foo' => 'bar'), $catalogue->all('domain1')); $this->assertEquals('en', $catalogue->getLocale()); $this->assertEquals(array(new FileResource($resource)), $catalogue->getResources()); } public function testLoadDoesNothingIfEmpty() { $loader = new YamlFileLoader(); $resource = __DIR__.'/../fixtures/empty.yml'; $catalogue = $loader->load($resource, 'en', 'domain1'); $this->assertEquals(array(), $catalogue->all('domain1')); $this->assertEquals('en', $catalogue->getLocale()); $this->assertEquals(array(new FileResource($resource)), $catalogue->getResources()); } public function testLoadNonExistingResource() { $loader = new YamlFileLoader(); $resource = __DIR__.'/../fixtures/non-existing.yml'; $loader->load($resource, 'en', 'domain1'); } public function testLoadThrowsAnExceptionIfFileNotLocal() { $loader = new YamlFileLoader(); $resource = 'http://example.com/resources.yml'; $loader->load($resource, 'en', 'domain1'); } public function testLoadThrowsAnExceptionIfNotAnArray() { $loader = new YamlFileLoader(); $resource = __DIR__.'/../fixtures/non-valid.yml'; $loader->load($resource, 'en', 'domain1'); } } 
<?php
use AssetsMinify\Cache;

class CacheTest extends WP_UnitTestCase {

	protected $plugin;

	public function setUp() {
		parent::setUp();
		$this->plugin = new Cache;
	}

	public function testInitialization() {
		$this->assertInstanceOf('AssetsMinify\Cache', $this->plugin);
	}

	public function testCache() {
		$wp_upload_dir = wp_upload_dir();
		$path = $wp_upload_dir['basedir'];

		$this->assertTrue( is_dir($path) );
		$this->assertTrue( is_dir($path . '/' . Cache::$directory . '/') );

		$this->assertInstanceOf('Assetic\Cache\FilesystemCache', $this->plugin->fs);
		$this->assertInstanceOf('AssetsMinify\Cache\GarbageCollector', $this->plugin->gc);
	}
}
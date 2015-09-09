<?php
/**
 * FactoryTest
 *
 * @author antoxa <kornilov@realweb.ru>
 */
namespace Kachit\Common\Test\Factory;

use Kachit\Common\Test\Testable\Factory;

class FactoryTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Factory
     */
    private $testable;

    /**
     * Init
     */
    protected function setUp() {
        $this->testable = new Factory();
    }

    /**
     * Test
     */
    public function testGetExistingObjectFoo() {
        $result = $this->testable->getObject('foo');
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Kachit\Common\Test\Testable\Simple\Foo', $result);
    }

    /**
     * Test
     */
    public function testGetExistingObjectBar() {
        $result = $this->testable->getObject('bar');
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Kachit\Common\Test\Testable\Simple\Bar', $result);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Class "Kachit\Common\Test\Testable\Simple\Boo" is not exists
     */
    public function testGetNotExistingObjectBoo() {
        $this->testable->getObject('boo');
    }
}
 
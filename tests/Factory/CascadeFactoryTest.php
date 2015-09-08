<?php
/**
 * FactoryTest
 *
 * @author antoxa <kornilov@realweb.ru>
 */
namespace Kachit\Common\Test\Factory;

use Kachit\Common\Testable\CascadeFactory;

class CascadeFactoryTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var CascadeFactory
     */
    private $testable;

    /**
     * Init
     */
    protected function setUp() {
        $this->testable = new CascadeFactory();
    }

    /**
     * Test
     */
    public function testGetExistingObjectFoo() {
        $result = $this->testable->getObject('foo');
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Kachit\Common\Testable\Cascade\Foo', $result);
    }

    /**
     * Test
     */
    public function testGetExistingObjectBar() {
        $result = $this->testable->getObject('bar');
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Kachit\Common\Testable\Simple\Bar', $result);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Class "boo" is not exists in this namespaces ["Kachit\\Common\\Testable\\Cascade","Kachit\\Common\\Testable\\Simple"]
     */
    public function testGetNotExistingObjectBoo() {
        $this->testable->getObject('boo');
    }
}
 
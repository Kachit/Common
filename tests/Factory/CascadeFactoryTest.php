<?php
/**
 * FactoryTest
 *
 * @author antoxa <kornilov@realweb.ru>
 */
namespace Kachit\Common\Test\Factory;

use Kachit\Common\Test\Testable\CascadeFactory;

class CascadeFactoryTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var CascadeFactory
     */
    private $testable;

    /**
     * Init
     */
    protected function setUp()
    {
        $this->testable = new CascadeFactory();
    }

    public function testGetExistingObjectFoo()
    {
        $result = $this->testable->getObject('foo');
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Kachit\Common\Test\Testable\Cascade\Foo', $result);
    }

    public function testGetObjectWithArgs()
    {
        $result = $this->testable->getObject('fooWithArgs', [1, 2]);
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Kachit\Common\Test\Testable\Simple\FooWithArgs', $result);
        $this->assertEquals(1, $result->a);
        $this->assertEquals(2, $result->b);
    }

    public function testGetExistingObjectBar()
    {
        $result = $this->testable->getObject('bar');
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Kachit\Common\Test\Testable\Simple\Bar', $result);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Class "boo" is not exists in this namespaces ["Kachit\\Common\\Test\\Testable\\Cascade","Kachit\\Common\\Test\\Testable\\Simple"]
     */
    public function testGetNotExistingObjectBoo()
    {
        $this->testable->getObject('boo');
    }
}
 
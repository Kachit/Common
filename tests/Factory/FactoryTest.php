<?php
/**
 * FactoryTest
 *
 * @author antoxa <kornilov@realweb.ru>
 */
namespace Kachit\Common\Test\Factory;

use Kachit\Common\Test\Testable\Factory;

class FactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Factory
     */
    private $testable;

    /**
     * Init
     */
    protected function setUp()
    {
        $this->testable = new Factory();
    }

    public function testGetExistingObjectFoo()
    {
        $result = $this->testable->getObject('foo');
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Kachit\Common\Test\Testable\Simple\Foo', $result);
    }

    public function testGetExistingObjectBar()
    {
        $result = $this->testable->getObject('bar');
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Kachit\Common\Test\Testable\Simple\Bar', $result);
    }

    public function testGetObjectWithArgs()
    {
        $result = $this->testable->getObject('fooWithArgs', [1, 2]);
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Kachit\Common\Test\Testable\Simple\FooWithArgs', $result);
        $this->assertEquals(1, $result->a);
        $this->assertEquals(2, $result->b);
    }

    public function testGetObjectByNamePrefixAndSuffix()
    {
        $this->testable
            ->setClassPrefix('prefix')
            ->setClassSuffix('suffix')
        ;
        $result = $this->testable->getObject('foo');
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Kachit\Common\Test\Testable\Simple\PrefixFooSuffix', $result);
    }

    public function testFilterClassName()
    {
        $result = $this->testable->filterClassName('boo ');
        $this->assertEquals('Boo', $result);
    }

    public function testGenerateClassName()
    {
        $result = $this->testable->generateClassName('foo', 'Bar');
        $this->assertEquals('Bar\\Foo', $result);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Class "Kachit\Common\Test\Testable\Simple\Boo" is not exists
     */
    public function testGetNotExistingObjectBoo()
    {
        $this->testable->getObject('boo');
    }
}
 
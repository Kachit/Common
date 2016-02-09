<?php
/**
 *
 */
namespace Kachit\Common\Test\Testable\Simple;

class FooWithArgs
{
    public $a;

    public $b;

    /**
     * FooWithArgs constructor
     *
     * @param $a
     * @param $b
     */
    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }
}
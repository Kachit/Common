<?php
/**
 * Factory
 *
 * @author antoxa <kornilov@realweb.ru>
 */
namespace Kachit\Common\Test\Testable;

use Kachit\Common\Factory\Common;

class Factory extends Common
{
    /**
     * @return string
     */
    protected function getNamespace()
    {
        return 'Kachit\Common\Test\Testable\Simple';
    }

    /**
     * @param string $name
     * @return string
     */
    public function filterClassName($name)
    {
        return parent::filterClassName($name);
    }

    /**
     * @param string $name
     * @param null $namespace
     * @return string
     */
    public function generateClassName($name, $namespace = null)
    {
        return parent::generateClassName($name, $namespace);
    }

    /**
     * @param string $className
     * @return bool
     */
    public function checkClassExists($className)
    {
        return parent::checkClassExists($className);
    }

    /**
     * @param string $className
     * @param array $arguments
     * @return object
     */
    public function createObject($className, array $arguments = [])
    {
        return parent::createObject($className, $arguments);
    }
} 
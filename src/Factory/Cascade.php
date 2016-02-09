<?php
/**
 * Cascade abstract factory
 *
 * @author Kachit
 * @package Kachit\Common\Factory
 */
namespace Kachit\Common\Factory;

abstract class Cascade extends Common
{
    /**
     * Get object by name
     *
     * @param string $name
     * @param array $arguments
     * @return object
     */
    public function getObject($name, array $arguments = [])
    {
        $object = null;
        foreach ($this->getNamespaces() as $namespace) {
            $className = $this->generateClassName($name, $namespace);
            $object = $this->loadClass($className, $arguments);
            if ($object) {
                break;
            }
        }
        if (!$object) {
            $this->handleError($this->getErrorMessageClassNotExists($name));
        }
        return $object;
    }
    /**
     * Get class namespaces
     *
     * @return array
     */
    abstract protected function getNamespaces();

    /**
     * Load class
     *
     * @param string $className
     * @param array $arguments
     * @return object
     */
    protected function loadClass($className, array $arguments = [])
    {
        if (!$this->checkClassExists($className)) {
            return false;
        }
        return $this->createObject($className, $arguments);
    }

    /**
     * Get error message
     *
     * @param string $className
     * @return string
     */
    protected function getErrorMessageClassNotExists($className)
    {
        return 'Class "' . $className . '" is not exists in this namespaces ' . json_encode($this->getNamespaces());
    }

    /**
     * Get class namespace
     *
     * @return string
     */
    protected function getNamespace()
    {
    }
}
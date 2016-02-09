<?php
/**
 * Common abstract factory
 *
 * @author antoxa <kornilov@realweb.ru>
 */
namespace Kachit\Common\Factory;

abstract class Common
{
    /**
     * @var string
     */
    protected $classSuffix;

    /**
     * @var string
     */
    protected $classPrefix;

    /**
     * Get object by name
     *
     * @param string $name
     * @param array $arguments
     * @return object
     */
    public function getObject($name, array $arguments = [])
    {
        $className = $this->generateClassName($name);
        return $this->loadClass($className, $arguments);
    }

    /**
     * Get class suffix
     *
     * @return string
     */
    public function getClassSuffix()
    {
        return $this->classSuffix;
    }

    /**
     * @return string
     */
    public function getClassPrefix()
    {
        return $this->classPrefix;
    }

    /**
     * @param string $classSuffix
     * @return Common
     */
    public function setClassSuffix($classSuffix)
    {
        $this->classSuffix = $classSuffix;
        return $this;
    }

    /**
     * @param string $classPrefix
     * @return Common
     */
    public function setClassPrefix($classPrefix)
    {
        $this->classPrefix = $classPrefix;
        return $this;
    }

    /**
     * Get class namespace
     *
     * @return string
     */
    abstract protected function getNamespace();

    /**
     * Generate class name
     *
     * @param string $name
     * @param string $namespace
     * @return string
     */
    protected function generateClassName($name, $namespace = null)
    {
        $namespace = ($namespace) ? $namespace : $this->getNamespace();
        return $namespace . '\\' .
            $this->filterClassName($this->getClassPrefix()) .
            $this->filterClassName($name) .
            $this->filterClassName($this->getClassSuffix())
        ;
    }

    /**
     * Filter class name
     *
     * @param string $name
     * @return string
     */
    protected function filterClassName($name)
    {
        return ucfirst(trim(strip_tags($name)));
    }

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
            $this->handleError($this->getErrorMessageClassNotExists($className));
        }
        return $this->createObject($className, $arguments);
    }

    /**
     * Check class exists
     *
     * @param string $className
     * @return bool
     */
    protected function checkClassExists($className)
    {
        return class_exists($className);
    }

    /**
     * Handle error
     *
     * @param string $message
     * @throws \Exception
     */
    protected function handleError($message)
    {
        throw new \Exception($message);
    }

    /**
     * Get error message
     *
     * @param string $className
     * @return string
     */
    protected function getErrorMessageClassNotExists($className)
    {
        return 'Class "' . $className . '" is not exists';
    }

    /**
     * Get class reflection
     *
     * @param string $className
     * @return \ReflectionClass
     */
    protected function getClassReflection($className)
    {
        return new \ReflectionClass($className);
    }

    /**
     * Create object
     *
     * @param string $className
     * @param array $arguments
     * @return object
     */
    protected function createObject($className, array $arguments = [])
    {
        $reflection = $this->getClassReflection($className);
        return $reflection->newInstanceArgs($arguments);
    }
} 
<?php
/**
 * Abstract factory
 *
 * @author antoxa <kornilov@realweb.ru>
 */
namespace Kachit\Common\Factory;

abstract class AbstractFactory {

    /**
     * @var array
     */
    private $objectsCache = [];

    /**
     * @var string
     */
    private $classPrefix;

    /**
     * Init
     */
    public function __construct() {
        $this->classPrefix = $this->initClassPrefix();
    }

    /**
     * Get object by name
     *
     * @param string $name
     * @return object
     */
    public function getObject($name) {
        $className = $this->generateClassName($name);
        return $this->loadClass($className);
    }

    /**
     * Get object with lazy load
     *
     * @param string $name
     * @return object
     */
    public function getObjectLazyLoad($name) {
        $className = $this->generateClassName($name);
        if (!$this->hasCachedObject($className)) {
            $object = $this->loadClass($className);
            $this->setCachedObject($className, $object);
        }
        return $this->getCachedObject($className);
    }

    /**
     * Get class prefix
     *
     * @return string
     */
    public function getClassPrefix() {
        return $this->classPrefix;
    }

    /**
     * Set ClassPrefix
     *
     * @param string $classPrefix
     * @return $this
     */
    public function setClassPrefix($classPrefix) {
        $this->classPrefix = $classPrefix;
        return $this;
    }

    /**
     * Init class prefix
     *
     * @return string
     */
    abstract protected function initClassPrefix();

    /**
     * Load object by class name
     *
     * @param string $className
     * @return object
     * @throws \Exception
     */
    protected function loadClass($className) {
        if (!$this->checkClassExists($className)) {
            $this->handleError($this->getErrorMessageClassNotExists($className));
        }
        return $this->createNewClass($className);
    }

    /**
     * Generate class name
     *
     * @param string $name
     * @return string
     */
    protected function generateClassName($name) {
        return $this->getClassPrefix() . ucfirst($name);
    }

    /**
     * Check class exists
     *
     * @param string $className
     * @return bool
     */
    protected function checkClassExists($className) {
        return class_exists($className);
    }

    /**
     * Create new class
     *
     * @param string $className
     * @return object
     */
    protected function createNewClass($className) {
        return new $className();
    }

    /**
     * Handle error
     *
     * @param string $message
     * @throws \Exception
     */
    protected function handleError($message) {
        throw new \Exception($message);
    }

    /**
     * Has cached object
     *
     * @param string $className
     * @return bool
     */
    protected function hasCachedObject($className) {
        return isset($this->objectsCache[$className]);
    }

    /**
     * Set cached object
     *
     * @param string $className
     * @param object $object
     * @return $this
     */
    protected function setCachedObject($className, $object) {
        $this->objectsCache[$className] = $object;
        return $this;
    }

    /**
     * Delete cached object
     *
     * @param string $className
     * @return $this
     */
    protected function deleteCachedObject($className) {
        unset($this->objectsCache[$className]);
        return $this;
    }

    /**
     * Get cached object
     *
     * @param string $className
     * @return object
     */
    protected function getCachedObject($className) {
        return $this->objectsCache[$className];
    }

    /**
     * Get error message
     *
     * @param string $className
     * @return string
     */
    protected function getErrorMessageClassNotExists($className) {
        return 'Class "' . $className . '" is not exists';
    }
} 
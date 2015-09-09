<?php
/**
 * Factory
 *
 * @author antoxa <kornilov@realweb.ru>
 */
namespace Kachit\Common\Test\Testable;

use Kachit\Common\Factory\AbstractFactoryCascade;

class CascadeFactory extends AbstractFactoryCascade {

    /**
     * @return string
     */
    protected function getNamespaces() {
        return ['Kachit\Common\Test\Testable\Cascade', 'Kachit\Common\Test\Testable\Simple'];
    }
} 
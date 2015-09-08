<?php
/**
 * Factory
 *
 * @author antoxa <kornilov@realweb.ru>
 */
namespace Kachit\Common\Testable;

use Kachit\Common\Factory\AbstractFactoryCascade;

class CascadeFactory extends AbstractFactoryCascade {

    /**
     * @return string
     */
    protected function getNamespaces() {
        return ['Kachit\Common\Testable\Cascade', 'Kachit\Common\Testable\Simple'];
    }
} 
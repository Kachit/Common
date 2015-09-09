<?php
/**
 * Factory
 *
 * @author antoxa <kornilov@realweb.ru>
 */
namespace Kachit\Common\Test\Testable;

use Kachit\Common\Factory\AbstractFactory;

class Factory extends AbstractFactory {

    /**
     * @return string
     */
    protected function getNamespace() {
        return 'Kachit\Common\Test\Testable\Simple';
    }
} 
<?php
/**
 * Factory
 *
 * @author antoxa <kornilov@realweb.ru>
 */
namespace Kachit\Common\Testable;

use Kachit\Common\Factory\AbstractFactory;

class Factory extends AbstractFactory {

    /**
     * @return string
     */
    protected function getNamespace() {
        return 'Kachit\Common\Testable\Simple';
    }
} 
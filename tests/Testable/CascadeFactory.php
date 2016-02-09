<?php
/**
 * Factory
 *
 * @author antoxa <kornilov@realweb.ru>
 */
namespace Kachit\Common\Test\Testable;

use Kachit\Common\Factory\Cascade;

class CascadeFactory extends Cascade
{
    /**
     * @return string
     */
    protected function getNamespaces()
    {
        return [
            'Kachit\Common\Test\Testable\Cascade',
            'Kachit\Common\Test\Testable\Simple'
        ];
    }
} 
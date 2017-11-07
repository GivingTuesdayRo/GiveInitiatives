<?php

namespace GiveInitiatives\Library\Metabox;

use GiveInitiatives\Library\Collections\AbstractCollection;

/**
 * Class MetaboxCollection
 * @package GiveInitiatives\Library\Metabox
 *
 * @method Metabox get($key, $default = null)
 */
class MetaboxCollection extends AbstractCollection
{

    /**
     * @param Metabox $metabox
     */
    public function add($metabox)
    {
        $this->set($metabox->getId(), $metabox);
    }
}

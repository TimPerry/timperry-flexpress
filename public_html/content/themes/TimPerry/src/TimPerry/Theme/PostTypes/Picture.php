<?php

namespace TimPerry\Theme\PostTypes;

use FlexPress\Components\PostType\AbstractPostType;

class Picture extends AbstractPostType
{

    const POST_TYPE_NAME = 'picture';

    /**
     * Gets the name of the taxonomy
     *
     * @return string
     * @author Tim Perry
     */
    public function getName()
    {
        return self::POST_TYPE_NAME;
    }
}


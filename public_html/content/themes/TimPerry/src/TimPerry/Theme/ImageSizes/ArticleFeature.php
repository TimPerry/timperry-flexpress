<?php

namespace TimPerry\Theme\ImageSizes;

use FlexPress\Components\ImageSize\AbstractImageSize;

class ArticleFeature extends AbstractImageSize
{

    /**
     *
     * Returns the name for the image size
     *
     * @return mixed
     * @author Tim Perry
     *
     */
    public function getName()
    {
        return "Article Feature";
    }

    /**
     *
     * Returns the height of the image size
     *
     * @return mixed
     * @author Tim Perry
     *
     */
    public function getHeight()
    {
        return 999;
    }

    /**
     *
     * Returns the width of the image size
     *
     * @return mixed
     * @author Tim Perry
     *
     */
    public function getWidth()
    {
        return 280;
    }
}
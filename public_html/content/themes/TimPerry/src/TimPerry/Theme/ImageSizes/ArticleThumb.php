<?php

namespace TimPerry\Theme\ImageSizes;

use FlexPress\Components\ImageSize\AbstractImageSize;

class ArticleThumb extends AbstractImageSize
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
        return "Article Thumb";
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
        return 220;
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
        return 328;
    }
}
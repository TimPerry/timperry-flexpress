<?php

namespace TimPerry\Theme\Taxonomies;

use FlexPress\Components\Taxonomy\AbstractTaxonomy;
use TimPerry\Theme\PostTypes\Picture;

class PictureCategory extends AbstractTaxonomy
{

    const TAX_NAME = 'picture-cat';

    /**
     * Gets the name of the taxonomy
     *
     * @return string
     * @author Tim Perry
     */
    public function getName()
    {
        return self::TAX_NAME;
    }

    /**
     * @return string
     */
    public function getSingularName()
    {
        return "Picture Category";
    }

    /**
     * @return string
     */
    public function getPluralName()
    {
        return "Picture Categories";
    }

    /**
     * Get a array of supported post types
     *
     * @return array
     * @author Tim Perry
     */
    public function getSupportedPostTypes()
    {
        return array(Picture::POST_TYPE_NAME);
    }
}
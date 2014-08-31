<?php

namespace TimPerry\Theme\Models;

use FlexPress\Components\ORM\AbstractORM;

class Article extends AbstractORM
{

    /**
     *
     * Used to get a comma separated list of the articles tags.
     *
     * @return bool|string|\WP_Error
     */
    public function getTagList()
    {
        return get_the_term_list($this->ID, "post_tag", "", ", ");
    }

    /**
     *
     * Used to get a comma separated list of the articles the categories is in.
     *
     * @return bool|string|\WP_Error
     */
    public function getCategoryList()
    {
        return get_the_term_list($this->ID, "post_tag", "", ", ");
    }

    public function thePostContent()
    {
        echo apply_filters('the_content', $this->getPostContent());
    }

}
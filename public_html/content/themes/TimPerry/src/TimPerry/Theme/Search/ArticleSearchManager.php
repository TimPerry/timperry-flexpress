<?php

namespace TimPerry\Theme\Search;

use FlexPress\Components\Search\AbstractPaginatedSearch;
use TimPerry\Theme\Models\Article;

class ArticleSearchManager extends AbstractPaginatedSearch
{

    /**
     *
     *  Derived function used to output the pagination is a custom format
     *
     * @return mixed
     * @author Tim Perry
     * @since 3.2
     *
     */
    public function outputPagination()
    {
        $context = \Timber::get_context();
        $context['searchManager'] = $this;

        \Timber::render('partials/search/pagination.twig', $context);
    }

    /**
     *
     * Derived function used to get the searchable post types
     *
     * @return mixed
     * @author Tim Perry
     *
     */
    protected function getSearchablePostTypes()
    {
        return array("post");
    }

    /**
     *
     *  Derived function used to output the results in a custom format
     *
     * @return mixed
     * @author Tim Perry
     *
     */
    public function outputResults()
    {

        $context = \Timber::get_context();

        while ($this->havePosts()) {

            $context['article'] = $this->thePost();

            \Timber::render('partials/search/result--article.twig', $context);

        }

    }

    /**
     * Remap the results to an article
     *
     * @return mixed|Article
     */
    public function thePost()
    {
        return new Article(parent::thePost());
    }


}

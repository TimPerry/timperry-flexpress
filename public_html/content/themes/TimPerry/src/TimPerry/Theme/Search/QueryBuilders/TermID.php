<?php

namespace TimPerry\Theme\Search\QueryBuilders;

use FlexPress\Components\Search\AbstractSearch;
use FlexPress\Components\Search\QueryBuilders\QueryBuilderInterface;

class TermID implements QueryBuilderInterface
{

    /**
     *
     * Given the sql array and the search manager, this method will update the query
     *
     * @param AbstractSearch $searchManager
     * @param array $sql
     * @param \wpdb $databaseAdapter
     * @return array
     * @author Tim Perry
     */
    public function updateQuery(AbstractSearch $searchManager, array $sql, \wpdb $databaseAdapter)
    {

        if (($term_id = get_query_var('cat'))
            || ($term_id = get_query_var('tag_id'))
        ) {

            $taxonomy = is_category() ? "category" : "post_tag";

            $sql['from'] .= "join `$databaseAdapter->term_relationships` as tr on tr . `object_id` = p . ID ";
            $sql["from"] .= $databaseAdapter->prepare(
                "join `$databaseAdapter->term_taxonomy` as tt on tt . `term_taxonomy_id` = tr . `term_taxonomy_id` and tt . `term_id` = %d and tt . `taxonomy` = '%s' ",
                $term_id,
                $taxonomy
            );

        }

        return $sql;

    }

    /**
     *
     * Returns the query fieldGroups required to build the query
     *
     * @return mixed
     * @author Tim Perry
     *
     */
    public function getQueryFields()
    {
        return array();
    }
}

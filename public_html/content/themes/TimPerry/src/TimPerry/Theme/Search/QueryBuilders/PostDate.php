<?php
/**
 * Created by PhpStorm.
 * User: timperry
 * Date: 05/09/2014
 * Time: 23:07
 */

namespace TimPerry\Theme\Search\QueryBuilders;


use FlexPress\Components\Search\AbstractSearch;
use FlexPress\Components\Search\QueryBuilders\QueryBuilderInterface;

class PostDate implements QueryBuilderInterface
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

        $date = array(
            "y" => "%",
            "m" => "%",
            "d" => "%"
        );

        if ($year = get_query_var("year")) {
            $date['y'] = $year;
        }

        if ($month = get_query_var("monthnum")) {
            if ($month < 10) {
                $month = "0" . $month;
            }

            $date['m'] = $month;
        }

        if ($day = get_query_var("day")) {
            $date['d'] = $day;
        }

        $formattedDate = implode("-", $date);

        $sql['where'] .= $databaseAdapter->prepare("and p.post_date like '%s' ", $formattedDate);

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
<?php

namespace TimPerry\Theme;

use FlexPress\Components\Theme\AbstractTheme;

class TimPerry extends AbstractTheme
{

    /**
     *
     * Add support for post thumbnails
     *
     */
    public function afterSetupTheme()
    {
        parent::afterSetupTheme();
        add_theme_support('post-thumbnails');

    }

    /**
     * Used to add routes to the theme
     *
     * @return mixed
     */
    protected function setupRoutes()
    {

        // 404
        $this->router->addRoute(
            'pageController@pageNotFoundAction',
            function () {
                return is_404();
            }
        );

        // Photography page
        $this->router->addRoute(
            'pageController@photographyAction',
            function () {

                if ($page = get_page_by_path('/photography')) {
                    return is_page($page->ID);
                }

                return false;
            }
        );

        // Front page
        $this->router->addRoute(
            'frontPageController',
            function () {
                return is_front_page() || is_archive();
            }
        );

        // Single news
        $this->router->addRoute(
            'singleController',
            function () {
                return is_single();
            }
        );

        // Standard page
        $this->router->addRoute(
            'pageController',
            function () {
                return is_page();
            }
        );

    }

}

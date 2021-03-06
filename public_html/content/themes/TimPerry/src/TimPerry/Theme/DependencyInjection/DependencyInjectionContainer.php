<?php

namespace TimPerry\Theme\DependencyInjection;

use FlexPress\Components\Menu\PostTypeMenu;
use FlexPress\Components\Search\QueryBuilders\Text as TextQueryBuilder;
use TimPerry\Theme\Controllers\FrontPageController;
use TimPerry\Theme\Controllers\PageController;
use TimPerry\Theme\Controllers\SearchController;
use TimPerry\Theme\Controllers\SingleController;
use TimPerry\Theme\Fields\FlexibleLayoutProxy;
use TimPerry\Theme\ImageSizes\ArticleFeature;
use TimPerry\Theme\ImageSizes\ArticleThumb;
use TimPerry\Theme\Models\Article;
use TimPerry\Theme\Models\Page;
use TimPerry\Theme\PostTypes\Picture;
use TimPerry\Theme\Search\ArticleSearchManager;
use TimPerry\Theme\Search\QueryBuilders\PostDate;
use TimPerry\Theme\Search\QueryBuilders\TermID;
use TimPerry\Theme\Taxonomies\PictureCategory;
use TimPerry\Theme\Templating\Functions\GetEnv;
use TimPerry\Theme\Templating\Functions\ThePrimaryNav;
use TimPerry\Theme\TimPerry;
use FlexPress\Components\Hooks\Hooker;
use FlexPress\Components\Layouts\Fields\FlexibleLayout;
use FlexPress\Components\Routing\Route;
use FlexPress\Components\Routing\Router;
use FlexPress\Components\Templating\Functions as TemplatingFunctions;
use FlexPress\Components\Taxonomy\Helper as TaxonomyHelper;
use FlexPress\Components\PostType\Helper as PostTypeHelper;
use FlexPress\Components\ACF\Helper as ACFHelper;
use FlexPress\Components\Shortcode\Helper as ShortcodeHelper;
use FlexPress\Components\ImageSize\Helper as ImageSizeHelper;
use FlexPress\Components\Layouts\Controller as LayoutController;
use TimPerry\Theme\Search\SearchManager;
use Symfony\Component\HttpFoundation\Request;

class DependencyInjectionContainer extends \Pimple
{

    /**
     *
     * Adds the configs for the theme using pimple
     *
     * @author Tim Perry
     *
     */
    public function init()
    {

        $this->addWPConfigs();
        $this->addSPLConfigs();
        $this->addControllerConfigs();
        $this->addFieldGroupConfigs();
        $this->addFieldConfigs();
        $this->addImageSizeConfigs();
        $this->addLayoutConfigs();
        $this->addModelConfigs();
        $this->addPostTypeConfigs();
        $this->addTaxonomyConfigs();
        $this->addTemplateFunctionConfigs();
        $this->addHookableConfigs();
        $this->addSearchConfigs();
        $this->addBaseThemeConfigs();

    }

    /**
     *
     * Adds standard wordpress configs
     *
     * @author Tim Perry
     *
     */
    protected function addWPConfigs()
    {

        $this["databaseAdapter"] = function () {
            return $GLOBALS['wpdb'];
        };

        $this["query"] = $this->factory(
            function () {
                return new \WP_Query();
            }
        );

    }

    /**
     *
     * Adds SPL configs e.g. queue
     *
     * @author Tim Perry
     *
     */
    protected function addSPLConfigs()
    {

        $this['queue'] = $this->factory(
            function () {
                return new \SplQueue();
            }
        );

        $this['objectStorage'] = $this->factory(
            function () {
                return new \SplObjectStorage();
            }
        );

    }

    /**
     *
     * Adds the controller configs
     *
     * @author Tim Perry
     *
     */
    protected function addControllerConfigs()
    {

        $this['pageController'] = function ($c) {
            return new PageController($c);
        };

        $this['frontPageController'] = function ($c) {
            return new FrontPageController($c);
        };

        $this['singleController'] = function ($c) {
            return new SingleController($c);
        };

    }

    /**
     *
     * Adds the acf field group configs
     *
     * @author Tim Perry
     *
     */
    protected function addFieldGroupConfigs()
    {
        // TODO: add acf field group configs
    }

    /**
     *
     * Adds the acf field configs
     *
     * @author Tim Perry
     *
     */
    protected function addFieldConfigs()
    {

        $this["flexibleLayoutProxy"] = function ($c) {
            return new FlexibleLayoutProxy($c);
        };

    }

    /**
     *
     * Adds the image size configs
     *
     * @author Tim Perry
     *
     */
    protected function addImageSizeConfigs()
    {

        $this["articleThumbImageSize"] = function () {
            return new ArticleThumb();
        };

        $this["articleFeatureImageSize"] = function () {
            return new ArticleFeature();
        };

    }

    /**
     *
     * Adds all the layout related configs
     *
     * @author Tim Perry
     *
     */
    protected function addLayoutConfigs()
    {

        $this["layoutController"] = function ($c) {
            return new LayoutController(array( // Add your layouts here
            ));
        };

        $this["flexibleLayout"] = function ($c) {
            return new FlexibleLayout($c["layoutController"]);
        };

    }

    /**
     *
     * Adds the orm model configs
     *
     * @author Tim Perry
     *
     */
    protected function addModelConfigs()
    {

        $this['articleModelWithGlobalPost'] = function () {
            return new Article(get_post());
        };

        $this['pageModelWithGlobalPost'] = function () {
            return new Page(get_post());
        };

    }

    /**
     *
     * Adds the post type configs
     *
     * @author Tim Perry
     *
     */
    protected function addPostTypeConfigs()
    {
        $this['picturePostType'] = function () {
            return new Picture();
        };
    }

    /**
     *
     * Adds the taxonomy configs
     *
     * @author Tim Perry
     *
     */
    protected function addTaxonomyConfigs()
    {
        $this['pictureCategoryTaxonomy'] = function () {
            return new PictureCategory();
        };
    }

    /**
     *
     * Adds the twig template function cofnigs
     *
     * @author Tim Perry
     *
     */
    protected function addTemplateFunctionConfigs()
    {

        $this['postTypeMenu'] = function () {
            return new PostTypeMenu();
        };

        $this['thePrimaryNavFunction'] = function ($c) {
            return new ThePrimaryNav($c['postTypeMenu']);
        };


        $this['getEnvFunction'] = function () {
            return new GetEnv();
        };
    }

    /**
     *
     * Adds the hookable configs
     *
     * @author Tim Perry
     *
     */
    protected function addHookableConfigs()
    {
        // TODO: add hookable configs
    }

    /**
     *
     * Adds the search configs
     *
     * @author Tim Perry
     *
     */
    protected function addSearchConfigs()
    {

        $this['textQueryBuilder'] = function () {
            return new TextQueryBuilder();
        };

        $this['termIDQueryBuilder'] = function () {
            return new TermID();
        };

        $this['postDateQueryBuilder'] = function () {
            return new PostDate();
        };

        $this['searchManager'] = function ($c) {
            return new SearchManager($c['databaseAdapter'], $c['queue'], $c['request'], array(
                $c['textQueryBuilder']
            ));
        };

        $this['articleSearchManager'] = function ($c) {
            return new ArticleSearchManager($c['databaseAdapter'], $c['queue'], $c['request'], array(
                $c['termIDQueryBuilder'],
                $c['postDateQueryBuilder']
            ));
        };

    }

    /**
     *
     * Adds the base theme configs
     *
     * @author Tim Perry
     *
     */
    protected function addBaseThemeConfigs()
    {

        $this["request"] = function () {
            return Request::createFromGlobals();
        };

        $this['route'] = $this->factory(
            function ($c) {
                return new Route($c['queue'], $c, $c['request']);
            }
        );

        $this['router'] = function ($c) {
            return new Router($c['queue'], $c['route']);
        };

        $this['hooker'] = function ($c) {
            return new Hooker($c['objectStorage'], array());
        };

        $this['templatingFunctions'] = function ($c) {
            return new TemplatingFunctions($c['objectStorage'], array(
                $c['thePrimaryNavFunction'],
                $c['getEnvFunction']
            ));
        };

        $this['taxonomyHelper'] = function ($c) {
            return new TaxonomyHelper($c['objectStorage'], array(
                $c['pictureCategoryTaxonomy']
            ));
        };

        $this['postTypeHelper'] = function ($c) {
            return new PostTypeHelper($c['objectStorage'], array(
                $c['picturePostType']
            ));
        };

        $this['ACFHelper'] = function ($c) {
            return new ACFHelper($c['objectStorage'], $c['objectStorage'], array(), array());
        };

        $this['shortcodeHelper'] = function ($c) {
            return new ShortcodeHelper($c['objectStorage'], array());
        };

        $this['imageSizeHelper'] = function ($c) {
            return new ImageSizeHelper($c['objectStorage'], array(
                $c["articleThumbImageSize"],
                $c["articleFeatureImageSize"]
            ));
        };

        $this['TimPerry'] = function ($c) {
            return new TimPerry(
                $c,
                $c['router'],
                $c['hooker'],
                $c['templatingFunctions'],
                $c['taxonomyHelper'],
                $c['postTypeHelper'],
                $c['ACFHelper'],
                $c['shortcodeHelper'],
                $c['imageSizeHelper']
            );
        };

    }
}

<?php

namespace TimPerry\Theme\Templating\Functions;

use FlexPress\Components\Menu\PostTypeMenu;
use FlexPress\Components\Templating\FunctionInterface;

class ThePrimaryNav implements FunctionInterface
{

    /**
     * @var PostTypeMenu
     */
    protected $postTypeMenu;

    public function __construct($postTypeMenu)
    {
        $this->postTypeMenu = $postTypeMenu;
    }

    /**
     * Return the name of the twig function
     *
     * @return mixed
     * @author Tim Perry
     */
    public function getFunctionName()
    {
        return "thePrimaryNav";
    }

    /**
     * The function that is executed when called in a template
     *
     * @return mixed
     * @author Tim Perry
     */
    public function getFunctionBody()
    {
        $args = array(
            "recurse" => false,
            "starting_level" => 0,
        );

        if (is_archive()
            || is_single()
        ) {
            $args['force_current'] = get_option('page_on_front');
        }

        $this->postTypeMenu->output($args);
    }
}

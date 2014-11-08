<?php

namespace TimPerry\Theme\Templating\Functions;

use FlexPress\Components\Templating\FunctionInterface;

class GetEnv implements FunctionInterface
{

    /**
     * Return the name of the twig function
     *
     * @return mixed
     * @author Tim Perry
     */
    public function getFunctionName()
    {
        return "getEnv";
    }

    /**
     * The function that is executed when called in a template
     *
     * @return mixed
     * @author Tim Perry
     */
    public function getFunctionBody()
    {
        return getenv('APP_ENVIRONMENT') == 'production' ? 'prod' : 'dev';
    }
}

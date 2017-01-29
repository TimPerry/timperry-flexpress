<?php

namespace TimPerry\Theme\Controllers;

use FlexPress\Components\Controller\AbstractTimberController;

abstract class AbstractBaseController extends AbstractTimberController
{

    /**
     *
     * Used to get the context, put the shared context values in here
     *
     * @return mixed
     * @author Tim Perry
     *
     */
    protected function getContext()
    {
        $context = \Timber::get_context();
        $context['template_uri'] = '/content/themes/TimPerry';
        return $context;
    }
}

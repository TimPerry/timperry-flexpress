<?php

namespace TimPerry\Theme\Controllers;

class FrontPageController extends AbstractBaseController
{

    /**
     * Index action
     *
     * @param $request
     * @return mixed|void
     * @author Tim Perry
     *
     */
    public function indexAction($request)
    {
        $context = $this->getContext();
        $context['articleSearchManager'] = $this->dic['articleSearchManager'];
        $context['articleSearchManager']->processSearch();

        $this->render('front-page.twig', $context);
    }
}

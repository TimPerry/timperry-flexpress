<?php

namespace TimPerry\Theme\Controllers;

class SingleController extends AbstractBaseController
{

    /**
     *
     * Index Action
     *
     * @param $request
     * @return mixed|void
     * @author Tim Perry
     *
     */
    public function indexAction($request)
    {

        $context = $this->getContext();
        $context['article'] = $this->dic['articleModelWithGlobalPost'];

        $this->render('single.twig', $context);

    }
}

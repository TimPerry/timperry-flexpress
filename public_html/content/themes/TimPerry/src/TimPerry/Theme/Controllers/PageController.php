<?php

namespace TimPerry\Theme\Controllers;

use TimPerry\Theme\PostTypes\Picture;
use TimPerry\Theme\Taxonomies\PictureCategory;

class PageController extends AbstractBaseController
{

    /**
     *
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
        $context['page'] = $this->dic['pageModelWithGlobalPost'];

        $this->render('page.twig', $context);

    }

    /**
     *
     * Photography page action
     *
     * @param $request
     * @author Tim Perry
     *
     */
    public function photographyAction($request)
    {

        $context = $this->getContext();
        $context["categories"] = array();

        $pictureCategories = get_terms(PictureCategory::TAX_NAME);

        foreach ($pictureCategories as $pictureCategory) {

            $context["categories"][$pictureCategory->term_id] = array(
                "name" => $pictureCategory->name
            );

            $pictures = get_posts(array("post_type" => Picture::POST_TYPE_NAME, "numberposts" => -1));

            foreach ($pictures as $picture) {

                $mediaFile = get_field('fp_picture_file', $picture->ID);

                $context["categories"][$pictureCategory->term_id]['pictures'][] = array(

                    "title" => $picture->post_title,
                    "thumbUrl" => $mediaFile['sizes']['Article Thumb'],
                    "fullUrl" => $mediaFile['url']

                );

            }

        }

        $this->render('page--photography.twig', $context);

    }

    /**
     *
     * Page not found action
     *
     * @param $request
     * @author Tim Perry
     *
     */
    public function pageNotFoundAction($request)
    {

        $context = $this->getContext();
        $this->render('page--404.twig', $context);

    }
}


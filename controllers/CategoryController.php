<?php

include_once ROOT. '/models/Category.php';


class CategoryController {

    public function actionIndex()
    {

        $categoryList = array();
        $categoryList = Category::getCategoryList();
    {
            $newsList = array();
            $newsList = Category::getNewsList();
//        print_r($newsList);

            require_once(ROOT . '/views/index.php');

            return true;
        }
    }

    public function actionCategoryview($id)
    {
        if ($id) {
            $categoryItem = Category::getCategoryItemByID($id);
            $newsList = array();
            $newsList = Category::getNewsList();

            require_once(ROOT . '/views/categoryview.php');

            /*			echo 'actionView'; */
        }

        return true;

    }


}


<?php

include_once ROOT. '/models/news.php';

class NewsController {

	public function actionNews()
	{
		
		$newsList = array();
		$newsList = News::getNewsList();

		require_once(ROOT . '/views/news.php');

		return true;
	}

	public function actionView($id)
	{
		if ($id) {
			$newsItem = News::getNewsItemByID($id);

	require_once(ROOT . '/views/view.php');

/*			echo 'actionView'; */
		}

		return true;

	}

}


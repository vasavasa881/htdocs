<?php


class Category
{

    /** Returns single category items with specified id
     * @rapam integer &id
     */

    public static function getCategoryItemByID($id)
    {
        $id = intval($id);


        if ($id) {
            /*			$host = 'localhost';
                        $dbname = 'php_base';
                        $user = 'root';
                        $password = '';
                        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);*/
            $db = Db::getConnection();
            $result = $db->query('SELECT * FROM category WHERE id=' . $id);

//            $result->setFetchMode(PDO::FETCH_NUM);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $categoryItem = $result->fetch();


            return $categoryItem;
        }

    }

    public static function getCategoryList()
    {
        /*		$host = 'localhost';
                $dbname = 'php_base';
                $user = 'root';
                $password = '';
                $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);*/

        $db = Db::getConnection();
        $categoryList = array();

        $result = $db->query('SELECT id, title FROM category');

        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['title'] = $row['title'];
            $i++;
        }

        return $categoryList;

    }

    /**
     * Returns an array of category items
     */

    public static function getNewsList() {
        /*		$host = 'localhost';
                $dbname = 'php_base';
                $user = 'root';
                $password = '';
                $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);*/

        $cat_id=$id;
        $db = Db::getConnection();
        $newsList = array();

        $result = $db->query('SELECT id, title, date, author_name, short_content FROM news WHERE id_cat=3 ORDER BY id ASC LIMIT 5');

        $i = 0;
        while($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['author_name'] = $row['author_name'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        }

        return $newsList;

    }

}
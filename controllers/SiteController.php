<?php

namespace app\controllers;

use app\models\Article;
use yii\data\Pagination;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * Displays homepage.
     * @param $page
     * @return string
     */
    public function actionIndex($page = 1)
    {
        $pageSize = 20;
        $offset = ($page - 1) * $pageSize;

        $query = Article::find();

        /** @var Article[] $articles */
        $articles = $query->limit($pageSize)->offset($offset)->orderBy('id')->all();

        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count]);

        return $this->render('index', ['articles' => $articles, 'pagination' => $pagination]);
    }


    public function actionView($id)
    {
        $article = Article::find()->where(['id' => $id])->one();

        return $this->render('view', ['article' => $article]);
    }
}

<?php
/** @var $articles \app\models\Article[] */
/* @var $this yii\web\View */

$this->title = 'Tinhte crawler';
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($articles as $article) : ?>
                    <tr>
                        <td><?=$article->id?></td>
                        <td><?=\yii\helpers\Html::a($article->title, \yii\helpers\Url::to(['site/view', 'id' => $article->id]))?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?=\yii\widgets\LinkPager::widget(['pagination' => $pagination, 'firstPageLabel' => 'First', 'lastPageLabel' => 'Last'])?>
        </div>
    </div>
</div>

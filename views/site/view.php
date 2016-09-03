<?php
$this->title = $article->title;
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2><?=$article->title?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?=$article->content?>
        </div>
    </div>
</div>
<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article`.
 */
class m160903_142619_create_article_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('article', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'url' => $this->string(255)->unique(),
            'content' => $this->text()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('article');
    }
}

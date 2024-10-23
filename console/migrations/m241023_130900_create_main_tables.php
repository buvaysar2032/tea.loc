<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m241023_130900_create_main_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tea_collections}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'title_en' => $this->string()->notNull(),
            'subtitle' => $this->text(),
            'subtitle_en' => $this->text(),
            'color' => $this->string(),
            'image' => $this->string(),
        ]);

        $this->createTable('{{%tea}}', [
            'id' => $this->primaryKey(),
            'tea_collection_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'title_en' => $this->string()->notNull(),
            'subtitle' => $this->text(),
            'subtitle_en' => $this->text(),
            'description' => $this->text(),
            'description_en' => $this->text(),
            'background_image' => $this->string(),
            'stack_image' => $this->string(),
            'stack_image_en' => $this->string(),
            'weight' => $this->text(),
            'weight_en' => $this->text(),
            'brewing_temperature' => $this->text(),
            'brewing_temperature_en' => $this->text(),
            'brewing_time' => $this->text(),
            'brewing_time_en' => $this->text(),
            'buy_available' => $this->boolean()->defaultValue(0)->notNull(),
            'link' => $this->text(),
            'link_en' => $this->text(),
            'priority' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk_tea_collection',
            '{{%tea}}',
            'tea_collection_id',
            '{{%tea_collections}}',
            'id',
            'CASCADE'
        );

        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'title_en' => $this->string()->notNull(),
            'priority' => $this->integer(),
            'date' => $this->integer()->notNull(),
            'description' => $this->text(),
            'description_en' => $this->text(),
            'text' => $this->text(),
            'text_en' => $this->text(),
            'image' => $this->string(),
            'status' => $this->boolean()->defaultValue(0)->notNull(),
        ]);

        $this->createTable('{{%feedback}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'message' => $this->text()->notNull(),
            'created_at' => $this->integer(),
            'updated_at ' => $this->integer(),
            'moderation_status' => $this->integer()->notNull(),
            'comment' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%feedback}}');
        $this->dropTable('{{%news}}');

        $this->dropForeignKey('fk_tea_collection', '{{%tea}}');

        $this->dropTable('{{%tea}}');
        $this->dropTable('{{%tea_collections}}');
    }
}
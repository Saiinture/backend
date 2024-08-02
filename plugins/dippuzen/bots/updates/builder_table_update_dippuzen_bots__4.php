<?php namespace Dippuzen\Bots\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDippuzenBots4 extends Migration
{
    public function up()
    {
        Schema::table('dippuzen_bots_', function($table)
        {
            $table->text('bot_name');
            $table->text('level');
            $table->text('persona');
            $table->dropColumn('website');
            $table->dropColumn('crawl_data');
            $table->dropColumn('user_id');
            $table->dropColumn('total_pages');
            $table->dropColumn('duration');
        });
    }
    
    public function down()
    {
        Schema::table('dippuzen_bots_', function($table)
        {
            $table->dropColumn('bot_name');
            $table->dropColumn('level');
            $table->dropColumn('persona');
            $table->text('website');
            $table->text('crawl_data');
            $table->integer('user_id');
            $table->integer('total_pages');
            $table->text('duration');
        });
    }
}

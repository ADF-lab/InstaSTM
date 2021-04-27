<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiCommentsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('id_post')->references('id')->on('posts')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function(Blueprint $table) {
            $table->dropForeign('comments_id_user_foreign');
            $table->dropIndex('comments_id_user_foreign');
            $table->bigInteger('id_user')->change();

            $table->dropForeign('comments_id_post_foreign');
            $table->dropIndex('comments_id_post_foreign');
            $table->bigInteger('id_post')->change();
        });
    }
}

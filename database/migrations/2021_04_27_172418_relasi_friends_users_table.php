<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiFriendsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('friends', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('following')->references('id')->on('users')
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
        Schema::table('friends', function(Blueprint $table) {
            $table->dropForeign('friends_id_user_foreign');
            $table->dropIndex('friends_id_user_foreign');
            $table->bigInteger('id_user')->change();

            $table->dropForeign('friends_following_foreign');
            $table->dropIndex('friends_following_foreign');
            $table->bigInteger('following')->change();
        });
    }
}

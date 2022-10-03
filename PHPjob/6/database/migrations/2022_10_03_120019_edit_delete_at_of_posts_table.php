<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class EditDeleteAtOfPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE `posts` MODIFY COLUMN `deleted_at` TIMESTAMP NOT NULL;');

        // Schema::table('posts', function (Blueprint $table) {
        //     //softDeleteにするために
        //     $table->timestamp('deleted_at')->nullable()->change();

        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
}

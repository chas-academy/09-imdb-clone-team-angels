<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'reviews';

    /**
     * Run the migrations.
     * @table reviews
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('tmdb_id');
            $table->string('headline', 191);
            $table->string('content', 191);
            $table->boolean('approved')->default('0');
            $table->unsignedTinyInteger('rating')->nullable()->default(null);

            $table->index(["user_id"], 'reviews_user_id_foreign');
            $table->nullableTimestamps();


            $table->foreign('user_id', 'reviews_user_id_foreign')
                ->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}

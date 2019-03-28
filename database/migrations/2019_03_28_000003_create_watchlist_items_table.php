<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWatchlistItemsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'watchlist_items';

    /**
     * Run the migrations.
     * @table watchlist_items
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('watchlist_id');
            $table->integer('movie_id');
            $table->string('title', 191);

            $table->index(["watchlist_id"], 'fk_watchlist_items_watchlists1_idx');
            $table->nullableTimestamps();


            $table->foreign('watchlist_id', 'fk_watchlist_items_watchlists1_idx')
                ->references('id')->on('watchlists')
                ->onDelete('no action')
                ->onUpdate('no action');
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
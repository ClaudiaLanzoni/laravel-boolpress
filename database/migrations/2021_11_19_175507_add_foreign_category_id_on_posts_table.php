<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignCategoryIdOnPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table){
            // Creo una colonna nella tabella posts (dipendente) che si chiama
            // 'category_id' che sarà inserità dopo la colonna 'id' e che potrà
            // anche avere valore null.
            $table->unsignedBigInteger('category_id')->after('id')->nullable();

            // Creo un -legame o vincolo di chiave esterna- contenuto nella colonna
            // 'category_id' di 'posts' e che si connetta con la colonna 'id' della
            // tabella 'categories'
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table){
            $table->dropForeign('posts_category_id_foreign');
            
            $table->dropColumn('category_id');
        });
    }
}

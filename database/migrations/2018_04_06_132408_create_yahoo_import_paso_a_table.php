<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYahooImportPasoATable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Date,      Open,       High,       Low,        Close,      Adj Close,  Volume
         * 1993-02-15,9834.599609,9913.400391,9764.099609,9865.299805,9865.290039,10256100
         */

        Schema::create('yahoo_import_paso_a', function (Blueprint $table) {
            $table->increments('id');
            $table->date('Date');
            $table->decimal('Open', 6, 6);
            $table->decimal('High', 6, 6);
            $table->decimal('Low', 6, 6);
            $table->decimal('Close', 6, 6);
            $table->decimal('AdjClose', 6, 6);
            $table->bigInteger('Volume');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yahoo_import_paso_a');
    }
}

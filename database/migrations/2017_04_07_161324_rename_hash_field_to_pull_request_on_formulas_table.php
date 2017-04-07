<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameHashFieldToPullRequestOnFormulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('formulas', function (Blueprint $table) {
            $table->renameColumn('hash', 'pull_request');
        });

        DB::table('formulas')->update(['pull_request' => null]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('formulas', function (Blueprint $table) {
            $table->renameColumn('pull_request', 'hash');
        });

        DB::table('formulas')->update(['hash' => null]);
    }
}

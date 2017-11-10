<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 27.09.2017
 * Time: 15:14
 */

class CreateJournalTable extends \Illuminate\Database\Migrations\Migration
{
    public function up()
    {
        if (\Illuminate\Support\Facades\Schema::hasColumn('journal', 'entry')) {
            \Illuminate\Support\Facades\Schema::table('journal', function (\Illuminate\Database\Schema\Blueprint $table) {
                $table->renameColumn('entry', 'action');
            });
        }

        if (\Illuminate\Support\Facades\Schema::hasColumn('journal', 'ip')) {
            \Illuminate\Support\Facades\Schema::table('journal', function (\Illuminate\Database\Schema\Blueprint $table) {
                $table->dropColumn('ip');
            });
        }

        if (\Illuminate\Support\Facades\Schema::hasColumn('journal', 'user_agent')) {
            \Illuminate\Support\Facades\Schema::table('journal', function (\Illuminate\Database\Schema\Blueprint $table) {
                $table->dropColumn('user_agent');
            });
        }
    }

    public function down()
    {
        // no down
    }
}

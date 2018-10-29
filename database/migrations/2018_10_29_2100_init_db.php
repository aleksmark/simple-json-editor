<?php

use Illuminate\Database\Migrations\Migration;

class InitDb extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $statement = <<<'SQL'
            CREATE TABLE games (
                id MEDIUMINT NOT NULL AUTO_INCREMENT,
                settings TEXT NOT NULL,
                PRIMARY KEY (id)
            );

SQL;

        DB::unprepared($statement);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $statement = <<<'SQL'
            DROP table games;
SQL;

        DB::unprepared($statement);
    }
}

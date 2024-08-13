<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE TRIGGER update_product_status
            AFTER UPDATE ON products
            FOR EACH ROW
            BEGIN
                IF NEW.stock = 0 THEN
                    UPDATE products
                    SET isActive = 0
                    WHERE id = NEW.id;
                ELSEIF NEW.stock > 0 THEN
                    UPDATE products
                    SET isActive = 1
                    WHERE id = NEW.id;
                END IF;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS update_product_status');
    }
};

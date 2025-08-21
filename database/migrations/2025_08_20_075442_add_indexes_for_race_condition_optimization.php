<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('jsas', function (Blueprint $table) {
            // Index untuk optimasi query count dan lock
            if (!Schema::hasIndex('jsas', 'jsas_created_at_index')) {
                $table->index('created_at');
            }
            if (!Schema::hasIndex('jsas', 'jsas_status_created_at_index')) {
                $table->index(['status', 'created_at']);
            }
        });

        // Note: Logs table might not exist in all environments
        // Index untuk monitoring race condition akan ditambahkan jika tabel logs ada
        if (Schema::hasTable('logs')) {
            Schema::table('logs', function (Blueprint $table) {
                if (!Schema::hasIndex('logs', 'logs_level_message_index')) {
                    $table->index(['level', 'message']);
                }
                if (!Schema::hasIndex('logs', 'logs_level_created_at_index')) {
                    $table->index(['level', 'created_at']);
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jsas', function (Blueprint $table) {
            $table->dropIndex(['created_at']);
            $table->dropIndex(['status', 'created_at']);
        });

        // Note: Logs table might not exist in all environments
        if (Schema::hasTable('logs')) {
            Schema::table('logs', function (Blueprint $table) {
                $table->dropIndex(['level', 'message']);
                $table->dropIndex(['level', 'created_at']);
            });
        }
    }
};

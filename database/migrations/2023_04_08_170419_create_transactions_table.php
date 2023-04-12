<?php

use App\Models\Category;
use App\Models\Church;
use App\Models\TypeTransaction;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('church_id')->constrained('churches');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('typeTransaction_id')->constrained('type_transactions');
            $table->foreignId('created_by')->constrained('users');
            $table->string('name');
            $table->float('value', 10,2);
            $table->boolean('is_recurrent')->default(false);
            $table->string('total_recurrent')->nullable()->default(0);
            $table->date('payment_date');
            $table->boolean('pay')->default(false);
            $table->boolean('enabled')->default(true);
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
        Schema::dropIfExists('transactions');
    }
}

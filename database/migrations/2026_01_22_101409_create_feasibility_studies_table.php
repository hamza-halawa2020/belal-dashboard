<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Category;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('feasibility_studies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('image');
            $table->string('money_capital');
            $table->string('rate_of_return');
            $table->longText('services');
            $table->longText('study_content');
            $table->longText('financial_metrics');
            $table->boolean('status')->default(false);
            $table->foreignIdFor(User::class,'created_by')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Category::class,'category_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feasibility_studies');
    }
};

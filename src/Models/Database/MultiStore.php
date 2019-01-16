<?php

namespace AvoRed\Framework\Models\Database;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;


class MultiStore extends BaseModel
{
    protected $fillable = [
        'name',
        'description',
    ];
    
    /**
     * Create MultiStore table
     */
    protected function enable() {
        if(!Schema::hasTable('multi_stores')) {
            Schema::create('multi_stores', function(Blueprint $table){
                $table->increments('id');
                $table->string('name');
                $table->longText('description')->nullable();
                $table->timestamps();
            });
        }
    }
    
    /**
     * Drop MultiStore table
     */
    protected function disable() {
        Schema::dropIfExists('multi_stores');
    }

}

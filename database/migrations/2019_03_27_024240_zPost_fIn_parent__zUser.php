<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class ZPostFInParentZUser extends Migration{

    public function up() {    
                Schema::create('z_Post', function (Blueprint $table) {
           
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable()->comment('id создателя, редактора');
            $table->string('name')->default('')->comment('название');
            $table->string('comment')->default('')->comment('комментарий');
            $table->string('description')->default('')->comment('описание');
            $table->smallInteger('active')->default(0);
            $table->timestamps();


        
        $table->index('active', 'idx-z_Post-active');
        
        $table->engine = 'InnoDB';

    });
 


    Schema::create('z_User', function (Blueprint $table) {
           
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable()->comment('id создателя, редактора');
            $table->string('name')->default('')->comment('название');
            $table->string('comment')->default('')->comment('комментарий');
            $table->string('description')->default('')->comment('описание');
            $table->smallInteger('active')->default(0);
            $table->timestamps();

        
        $table->index('active', 'idx-z_User-active');
        
        $table->engine = 'InnoDB';

    });


        Schema::create('z_User___z_Post', function (Blueprint $table) {
                $table->integer('z_Post_id')->unsigned();
                $table->integer('z_User_id')->unsigned();
                  

        $table->primary(['z_Post_id', 'z_User_id']);
        
        $table->index('z_Post_id', 'idx-z_Post-z_Post_id');        
        $table->foreign('z_Post_id')->references('id')->on('z_Post')->onDelete('restrict');
        
        $table->index('z_User_id', 'idx-z_User-z_User_id');        
        $table->foreign('z_User_id')->references('id')->on('z_User')->onDelete('restrict');
        
        $table->engine = 'InnoDB';
    });    

 

      
}
    public function down() {

        Schema::dropIfExists('z_Post');
        Schema::dropIfExists('z_User');
        Schema::dropIfExists('z_User___z_Post');


    }

}
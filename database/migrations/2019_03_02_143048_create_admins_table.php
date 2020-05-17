<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->unique()->nullable();
            $table->string('image')->nullable();
            $table->boolean('active')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
         // Insert some super admin
         DB::table('admins')->insert(
            array(
                'name' => 'Super Admin',
                'email' => 'super@admin.com',
                'password' => '$2y$10$eKGjwa/aZZtsByWMU8IVhexjMnEFKIj/gel7i4cAKWdxKANuE3Id2',
                'phone' => '011111111111',
                'active' => 1,
                'email_verified_at' => now(),
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}

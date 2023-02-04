<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username', 50)->unique();
            $table->string('phone', 16)->nullable();
            $table->string('password');
            $table->enum('role', ['user', 'admin']);
            $table->rememberToken();
            $table->string('slug', 150);
            $table->timestamps();
        });

        $data = [
            [
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'phone' => '081923432391',
                'username' => 'admin',
                'password' => Hash::make('1122'),
                'role' => 'admin',
                'slug' => 'admin',
            ],
            [
                'name' => 'Regular User',
                'email' => 'user@gmail.com',
                'phone' => '081212341234',
                'username' => 'user',
                'password' => Hash::make('1122'),
                'role' => 'user',
                'slug' => 'user',
            ]
        ];
        User::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};

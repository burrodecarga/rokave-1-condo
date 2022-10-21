<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('private_expenses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('condominio_id')->unsigned();
            $table->string('condominio')->nullable();
            $table->bigInteger('apartment_id')->unsigned();
            $table->string('udv')->nullable();
            $table->bigInteger('ano')->unsigned();
            $table->bigInteger('mes')->unsigned();
            $table->text('nmes')->nullable();
            $table->date('fecha');
            $table->enum('tipo', [
                'ordinario:administrativo',
                'ordinario:mantenimiento',
                'ordinario:reparaciones',
                'ordinario:uso y consumo',
                'ordinario:otros',
                'extraordinario']);
            $table->text('referencia')->nullable();
            $table->longText('descripcion')->nullable();
            $table->text('lecturaPrevia')->nullable();
            $table->text('lecturaActual')->nullable();
            $table->text('lectura')->nullable();
            $table->double('monto',10,2);
            $table->double('iva',10,2);
            $table->double('total',10,2);
            $table->foreign('apartment_id')->references('id')->on('apartments')->onDelete('cascade');

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
        Schema::dropIfExists('private_expenses');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommonExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('common_expenses', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('condominio_id')->unsigned();
            $table->bigInteger('ano')->unsigned();
            $table->bigInteger('mes')->unsigned();
            $table->text('nmes')->nullable();
            $table->text('condominio');
            $table->date('fecha');
            $table->enum('tipo', [
                'ordinario:administrativo',
                'ordinario:mantenimiento',
                'ordinario:reparaciones',
                'ordinario:uso y consumo',
                'ordinario:otros',
                'extraordinario']);
            $table->text('referencia');
            $table->longText('descripcion');
            $table->double('monto',10,2);
            $table->double('iva',10,2);
            $table->double('total',10,2);
            $table->enum('condicion',['no cancelado','cancelado','anulado']);
            $table->date('fecha_de_pago');
            $table->text('forma_de_pago');
            $table->text('referencia_de_pago');
            $table->text('anexo')->nullable();
            $table->bigInteger('bank_id')->unsigned();
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');
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
        Schema::dropIfExists('common_expenses');
    }
}

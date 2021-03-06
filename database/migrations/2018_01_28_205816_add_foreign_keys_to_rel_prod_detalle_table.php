<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRelProdDetalleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('rel_prod_detalle', function(Blueprint $table)
		{
			$table->foreign('detalle_pedido_iddetalle_pedido', 'fk_rel_prod_detalle_detalle_pedido1')->references('iddetalle_pedido')->on('detalle_pedido')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('producto_idproducto', 'fk_rel_prod_detalle_producto1')->references('idproducto')->on('producto')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('rel_prod_detalle', function(Blueprint $table)
		{
			$table->dropForeign('fk_rel_prod_detalle_detalle_pedido1');
			$table->dropForeign('fk_rel_prod_detalle_producto1');
		});
	}

}

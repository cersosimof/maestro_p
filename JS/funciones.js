
	function confirmarBaja() {
		var mensaje = "Desea eliminar este registro?"
				if (confirm(mensaje)) {
					return true;
				}
			window.location = "adminProductos.php";
			return false;
	}

// armarListado - Funcion para comprobar que el Listado ya existe.

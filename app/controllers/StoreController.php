<?php

class StoreController extends ControllerBase
{

    public function indexAction()
    {
        $prodLeft = parent::prodPicText("images/gallery-image-1.jpg", "Imagen", "Proveedor", "$55.00", "Producto muy bien dise&ntilde;ado pensado para su satisfacci&oacute;n");
        $prodCenter1 = parent::prodPicText("images/featured/1.jpg", "Hilos y otros", "Bazar Albert", "$60.00", "Productos de merceria",2);
        $prodCenter2 = parent::prodPicText("images/featured/2.jpg", "Adornos", "La Quincea&ntilde;era", "$25.00", "Productos para eventos",2);
        
        $dropdown = [
            ["G&eacute;nero", ["Masculino", "Femenino"]],
            ["Tama&ntilde;o", ["XS", "S", "M", "L", "XL"]],
            ["Color", ["Rojo", "Azul", "Negro", "Amarillo"]]
        ];
        //$prodRight = parent::prodPicText("images/featured/6.jpg", "Camisa", "Nautica", "$80.00", $dropdown, 3);
        $prodRight = parent::prodPicText("images/featured/6.jpg", "Camisa", "Nautica", "$80.00", "Camisa para hombre", 1);
        
        $prodThumb1 = parent::prodPicText("images/featured/3.jpg", "Camisa 1", "Proveedor 1", "$100.00", "Product Thumb 1", 4);
        $prodThumb2 = parent::prodPicText("images/featured/4.jpg", "Camisa 2", "Proveedor 2", "$110.00", "Product Thumb 2", 4);
        $prodThumb3 = parent::prodPicText("images/featured/5.jpg", "Camisa 3", "Proveedor 3", "$99.00", "Product Thumb 3", 4);
        
        $newProd1 = parent::prodPicText("images/gallery-image-2.jpg", "Pantalon 1", "Guess", "$50.00", "Pantal&oacute;n 1", 5);
        $newProd2 = parent::prodPicText("images/gallery-image-3.jpg", "Pantalon 2", "Tommy Hilfiger", "$60.00", "Pantal&oacute;n 2", 5);
        $newProd3 = parent::prodPicText("images/gallery-image-4.jpg", "Pantalon 3", "Zara", "$70.00", "Pantal&oacute;n 3", 5);
        $newProd4 = parent::prodPicText("images/gallery-image-5.jpg", "Pantalon 4", "Givenchi", "$80.00", "Pantal&oacute;n 4", 5);
        
        $newProd = $newProd1.$newProd2.$newProd3.$newProd4;
        
        $this->view->prodLeft = $prodLeft;
        $this->view->prodCenter1 = $prodCenter1;
        $this->view->prodCenter2 = $prodCenter2;
        $this->view->prodRight = $prodRight;
        
        $this->view->prodThumb1 = $prodThumb1;
        $this->view->prodThumb2 = $prodThumb2;
        $this->view->prodThumb3 = $prodThumb3;
        
        $this->view->newProd = $newProd;
        
        $banner = parent::storeBanner("images/storeBanner.jpg", "tienda1", "images/storeLogo.jpg","Nombre de la Tienda", "Descripcion de la tienda para explicar el tipo de cosas que ofrecen"
                . "Esta es una prueba");
        $this->view->storeTop = $banner;
        $this->view->products = $prodThumb1.$prodThumb2.$prodThumb3;
    }
    
    public function productosAction($sid)
    {
        //parent::limpiar();
        $store = Store::findFirst($sid);
    	$campos = [
            ["t", ["nombre"], "Nombre"],
            ["t", ["desc"], "Descripci&oacute;n"],
            ["m", ["valor", "0.0"], "Precio"],
            ["f", ["foto"], "Foto"],
            ["s", ["guardar"], "Guardar"]
            ];
        
        $head = ["Producto", "Descripci&oacute;n", "Valor", "Foto", "Acciones"];
        $tabla = parent::thead("productos", $head);
        $items = Items::find("store = $store->id");

        foreach ($items as $i){
            $tabla = $tabla.parent::tbody([
                $i->name,
                $i->desc,
                $i->value,
                "foto",
                parent::a(2, "cargarDatos('".$i->id."','".$i->name."','".$i->desc.
                                "','".$i->value."');", 
                                "Editar")." | ".					
                parent::a(1,"store/eliminar/$i->id", "Eliminar")
            ]);
        }

        //js
        $fields = ["id", "nombre", "desc", "valor"];
        $otros = "";
        $jsBotones = ["form1", "menu/edit", "menu"];
		
    	$form = parent::multiForm($campos, "store/nuevoProducto/$store->id", "form1");
    	
    	parent::view("Items para Tienda: $store->name", $form, $tabla, [$fields, $otros, $jsBotones]);//, [$fields, $otros, $jsBotones]);
    }
    
    /**
     * 
     * @return view
     */
    public function nuevoProductoAction($sid){
    	if(parent::vPost("nombre") && parent::vPost("valor")){
            $nombre = parent::gPost("nombre");
            $nombres = Items::find("name like '$nombre' and store = $sid");
            if(count($nombres) > 0){
                parent::msg("El nombre ingresado ya existe para esta tienda");
                return parent::forward("store", "productos", [$sid]);
            }
            
            $item = new Items();
            $item->cdate = parent::fechaHoy(true);
            $item->desc = parent::gPost("desc");
            $item->name = $nombre;
            $item->store = $sid;
            $item->value = parent::gPost("valor");
            if($item->save()){
                $this->uploadFile($this->request, $item->id, $sid);                    
            }else{
                parent::msg("", "db");
            }
        }else{
            parent::msg("Alguno de los campos obligatorios como Nombre y Precio no pueden quedar en blanco");
        }
        return parent::forward("store", "productos", [$sid]);
    }
    
    function uploadFile($request, $item, $sid) {
        if (true == $request->hasFiles() && $request->isPost()) {
            $upload_dir = 'img/'. $sid. '/'. $item . '/' ;//APP_PATH . '\\public\\img\\'. $sid. '\\'. $item->id . '\\' ;
            if (!is_dir($upload_dir)) {
                if(!mkdir($upload_dir, 0777, true)) {
                    parent::msg('Fallo al crear las carpetas...');
                    return;
                }
            }

            foreach ($request->getUploadedFiles() as $file) {
                if(strlen($file->getName()) > 0){
                    $foto = new Itempics();
                    $foto->cdate = parent::fechaHoy(true);
                    $foto->item = $item;
                    $foto->name = $file->getName();
                    $foto->pic = $upload_dir . $file->getName();
                    if(!$foto->save()){
                        parent::msg("Foto no pudo ser guardada, pero el producto fue creado");                                
                    }else{
                        $file->moveTo($foto->pic);
                    }

                }    				
            }

        }else{
            parent::msg("No se encontr&oacute; foto para subir", "w");
        }
    }

}


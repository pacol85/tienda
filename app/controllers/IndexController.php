<?php

class IndexController extends ControllerBase
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
    }

}


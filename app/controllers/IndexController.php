<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $prodLeft = parent::prodPicText("images/gallery-image-1.jpg", "Imagen", "Proveedor", "$55.00", "Producto muy bien dise&ntilde;ado pensado para su satisfacci&oacute;n");
        $prodCenter1 = parent::prodPicText("images/featured/1.jpg", "Hilos y otros", "Bazar Albert", "$60.00", "Productos de merceria",2);
        $prodCenter2 = parent::prodPicText("images/featured/2.jpg", "Adornos", "La Quincea&ntilde;era", "$25.00", "Productos para eventos",2);
        $this->view->prodLeft = $prodLeft;
        $this->view->prodCenter1 = $prodCenter1;
        $this->view->prodCenter2 = $prodCenter2;
    }

}


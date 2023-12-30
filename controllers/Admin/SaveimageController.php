<?php

namespace controllers\Admin;

use controllers\Controller\Admin;


class SaveimageController extends AdminController
{ 
    
    public function __construct()
    {
        parent::__construct();
    }

    public function saveImageAction($request)
    {
        if(!strtolower(pathinfo($request['image']['name'], PATHINFO_EXTENSION)))
        {
            return false;
        }

        $webpName = 'tips_day_big_'.date('Y_m_d_h_i',time()).'.webp';
        $this->image->resizeAndConvertToWebP($request['image']['tmp_name'], DIR_INDEX.'img/blog/'.$webpName, 700);

        return $this->view->json('/img/blog/'.$webpName);
    }
    

}

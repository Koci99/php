<?php
declare(strict_types=1);

class BitcoinController extends ControllerBase
{

    public function indexAction()
    {
        $model = new BitcoinModel();
        $data = $model->LoadPriceFromUrl($this->config->bitcoin->url);
        $this->view->setVar('usd',$data['usd']);
        $this->view->setVar('eur',$data['eur']);

    }



}


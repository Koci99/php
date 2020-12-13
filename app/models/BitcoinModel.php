<?php


class BitcoinModel{
    public function LoadPriceFromUrl($url)
    {
        //$url = "https://bitpay.com/api/rates";
        $json = json_decode(file_get_contents($url));
        $data = [];

        foreach ($json as $item)
        {
            if ($item->code == 'USD')
            {
                $data['usd'] = $item->rate;
            }

            if ($item->code == 'EUR')
            {
                $data['eur'] = $item->rate;
            }
        }

        return $data;
    }
}
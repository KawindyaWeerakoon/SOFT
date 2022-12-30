<?php

namespace Bookcatalog;

class BookService
{
    /**
     * @soap
     * @param Bookcatalog\Transfer $info_data
     * @return string
     */
    public function currency_conv($info_data)
    {
        $sourceCurrency_base = $this->getData($info_data->sourceCurrency);

        $targetCurrency_base = $this->getData($info_data->targetCurrency);

        $result = ($info_data->amountInSourceCurrency/$sourceCurrency_base)*$targetCurrency_base;

        return $result;
    }

    function getData($data)
    {
        $data_json = file_get_contents('data.json');

        $decode_file = json_decode($data_json, true);

        $currency_data = $decode_file['money'];

        foreach ($currency_data as $value)
        {
            $target_money = $value['target_currency'];

            $money_value = $value['value'];

            if($target_money == $data)
            {
                return $money_value;
            }
        }
    }
}


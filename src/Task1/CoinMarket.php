<?php declare(strict_types=1);

namespace Cryptocurrency\Task1;

class CoinMarket
{
    private $currencies;
    function __construct()
    {
        $this->currencies = [];
    }

    public function addCurrency(Currency $currency): void
    {
        if(empty($currency->getName()))
            throw new \Exception('Currency name can not be null or empty string!');
        foreach($this->currencies as $arrCurrency) {//validating if currency with such name exists. Faster than array_map, I suppose
            if (strcasecmp($arrCurrency->getName(), $currency->getName()) === 0)
                throw new \Exception('Currency with this name already exists!');
        }
        $this->currencies[] = $currency;
    }

    public function maxPrice(): float
    {
        $max = 0.0;
        foreach ($this->currencies as $currency)
            if($max< $currency->getDailyPrice())
                $max = $currency->getDailyPrice();
        return $max;
    }

    public function getCurrencies(): array
    {
        return $this->currencies;
    }
}
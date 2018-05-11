<?php declare(strict_types=1);

namespace Cryptocurrency\Task1;

abstract class AbstractCurrency implements  Currency
{
    protected static $logoUrl = 'BASIC_LOGO';
    protected static  $name = 'BASIC_NAME';
    protected $price;

    function __construct(float $price)
    {
        $this->setPrice($price);
    }

    public function getName(): string
    {
        return static::$name;
    }

    public function setPrice(float $price)
    {
        if($price <= 0.0)
            throw new \Exception('Currency price should be greater than 0.0');
        $this->price = $price;
    }

    public function getDailyPrice(): float
    {
        return $this->price;
    }

    public function getLogoUrl(): string
    {
        return static::$logoUrl;
    }
}

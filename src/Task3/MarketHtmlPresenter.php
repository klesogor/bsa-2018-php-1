<?php declare(strict_types=1);

namespace Cryptocurrency\Task3;

use Cryptocurrency\Task1\CoinMarket;
use Cryptocurrency\Task1\Currency;

class MarketHtmlPresenter
{
    public function present(CoinMarket $market): string
    {
        $result=$this->renderHead();
        $result.='<body>';
        $result.=$this->renderHeader();
        $result.=$this->renderBody($market);
        $result.=$this->renderFooter();
        $result.='</body>';
        return $result;
    }

    protected function renderException():string
    {
        return 'Whoops, something went wrong. We will try to fix this ASAP, but you can motivate us to work harder with some coins ;)';
    }

    protected function renderHead()
    {
       return' <head><meta charset="UTF-8"><meta name="viewport"
           content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="/src/Task3/assets/main.css">
            <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
            integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" 
            integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
            <title>Built-in Web Server</title>
            </head>';
    }
    protected function renderHeader():string
    {
       return ' <div class = "container-fluid header">
                <i class="fas fa-chart-line"></i>
                <span>CryptoTrade</span>
                </div>';
    }
    protected function renderBody(CoinMarket $market):string
    {
        $result = '<div class="container-fluid" id="body">
                <div class = "content-header">
                    What can I do here?
                </div>
                <div class = "row">
                    <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
                        <div class="info-column">
                            <div class = "column-title">
                                <i class="fab fa-bitcoin"></i>
                                BUY
                            </div>
                            <span class="column-description">
                                Convert your regular money to super modern extremly secure 
                                and profitable cryptocurrencies.
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
                        <div class = "column-title">
                            <i class="fas fa-suitcase"></i>
                            SELL
                        </div>
                        <span class="column-description">
                            Running short on regular money? <br>
                            1) Sell some cryptocurrencies <br>
                            2) ????? <br>
                            3) PROFIT!
                        </span>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
                        <div class = "column-title">
                            <i class="fas fa-exchange-alt"></i>
                            CONVERT
                        </div>
                        <span class="column-description">
                            Convert your regular money to super modern extremly secure 
                            and profitable cryptocurrencies.
                        </span>
                    </div>
                </div>
                <!-- Currencies block !-->
                <div class = "currencies">
                        <div class = "content-header">
                            Currencies
                        </div>';

        foreach($market->getCurrencies() as $currency) {
            $result.= $this->renderCurrency($currency,$market->maxPrice());
        }
        $result.='</div>';
        return $result;
    }

    protected function renderCurrency(Currency $currency,...$parameters):string
    {
        $mark = $currency->getDailyPrice()===$parameters[0] ? 'color:green;font-weight:600;': '';
        return "
        <div class='currency-container'>
        
            <img src='{$currency->getLogoUrl()}' alt='currency logo'>
            <span>
                {$currency->getName()}
            </span>
            <span style = 'float:right;{$mark}'>
                Daily price:{$currency->getDailyPrice()}
            </span>
         </div>
        ";
    }

    protected function renderFooter()
    {
        return "<hr style='border:1px solid black'><div class='footer' style='text-align:center'>
                    COPYRIGHT CryptoTrade 2018
                </div>";
    }

}
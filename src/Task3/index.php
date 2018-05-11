<?php

require __DIR__ . '/../../vendor/autoload.php';

use Cryptocurrency\Task1\CoinMarket;
use Cryptocurrency\Task3\MarketHtmlPresenter;

// Fill in your market with currencies and use your presenter to show data here:
$market = new CoinMarket();
$market->addCurrency(new \Cryptocurrency\Task1\Bitcoin(8000.36));
$market->addCurrency(new \Cryptocurrency\Task1\Ethereum(4000.25));
$market->addCurrency(new \Cryptocurrency\Task1\Dogecoin(80.15));
$marketPresenter = new MarketHtmlPresenter();
$presentation = $marketPresenter->present($market);

?>

<!doctype html>
<html lang="en">
<?php echo $presentation ?>
</html>
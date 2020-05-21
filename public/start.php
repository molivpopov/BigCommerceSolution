<?php

require_once __DIR__.'/../app/GetCustomer.php';
require_once __DIR__.'/../vendor/autoload.php';

$info = key_exists('info', $_POST)
    ? $_POST['info']
    : ['email'];

$patterns = key_exists('pattern', $_POST)
    ? $_POST['pattern']
    : '/@gmail.com$/i';

use App\GetCustomer;

$customers = new GetCustomer(
    'n5nbsf88h3eswme3gr2qcqxhur2lyfo',
    '4wft7hy8m77la6hn8m9l4gp20p35yoi',
    'oriva3kf40'
);

$filteredCustomer = $customers->getFilteredCustomers($patterns);

echo 'customers to <a target="_blank" href="https://mitkop.mybigcommerce.com">mitkop.mybigcommerce.com</a> having email filtered by:'.$patterns.'<br>';

$response = array();

if ($filteredCustomer) {

    foreach ($filteredCustomer as $customer) {

        foreach ($info as $v) {
            echo "<br>$v:" . $customer->$v;
        }

        echo '<br>';
    }

} else {

    echo '<br>there are no such customer!';

}




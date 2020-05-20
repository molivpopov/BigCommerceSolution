<?php


namespace App;

use Bigcommerce\Api\Client as Bigcommerce;
use Bigcommerce\Api\Error;


class GetCustomer
{

    public function __construct($clientId, $authToken, $storeHash)
    {
        Bigcommerce::configure([
            'client_id' => $clientId,
            'auth_token' => $authToken,
            'store_hash' => $storeHash
        ]);

    }

    /**
     * @return array|string
     * @throws Error
     */
    public function getAllCustomers()
    {
        $ping = Bigcommerce::getTime();

        if (!$ping) {
            throw new Error('your ecommerce is not connected!', 12);
        };

        return Bigcommerce::getCustomers();
    }

    /**
     * @param $pattern - regex pattern to filter customer's email
     * @return array|string
     * @throws Error
     */
    public function getFilteredCustomers($pattern)
    {
        return array_filter(

            $this->getAllCustomers(),

            function ($value) use ($pattern){
                return preg_match($pattern, $value->email) > 0;
            }

        );
    }

}

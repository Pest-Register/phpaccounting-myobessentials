<?php


namespace PHPAccounting\MyobEssentials\Message\InventoryItems\Responses;

use Omnipay\Common\Message\AbstractResponse;
use PHPAccounting\MyobEssentials\Helpers\IndexSanityCheckHelper;

class UpdateInventoryItemResponse extends AbstractResponse
{
    /**
     * Check Response for Error or Success
     * @return boolean
     */
    public function isSuccessful()
    {
        if ($this->data === null) {
            return true;
        }
        if(array_key_exists('errors', $this->data)){
            return false;
        }
        return true;
    }

    /**
     * Fetch Error Message from Response
     * @return string
     */
    public function getErrorMessage()
    {
        if (array_key_exists('errors', $this->data)) {
            if ($this->data['errors'][0]['message'] === 'Invalid authentication token.') {
                return 'The access token has expired';
            }
            else {
                return $this->data['errors'][0]['message'];
            }
        }
        return null;
    }

    /**
     * Return all Invoices with Generic Schema Variable Assignment
     * @return array
     */
    public function getInventoryItems(){
        $accounts = [];
        return $accounts;
    }
}
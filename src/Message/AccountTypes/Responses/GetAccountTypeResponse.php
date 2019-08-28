<?php

namespace PHPAccounting\MyobEssentials\Message\AccountTypes\Responses;

use Omnipay\Common\Message\AbstractResponse;
use PHPAccounting\MyobEssentials\Helpers\IndexSanityCheckHelper;

/**
 * Get AccountType(s) Response
 * @package PHPAccounting\MyobEssentials\Message\AccountTypes\Responses
 */
class GetAccountTypeResponse extends AbstractResponse
{

    /**
     * Check Response for Error or Success
     * @return boolean
     */
    public function isSuccessful()
    {
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
     * Return all Accounts with Generic Schema Variable Assignment
     * @return array
     */
    public function getAccountTypes(){
        $accountTypes = [];

        foreach($this->data['items'] as $accountType) {
            $newAccountType = [];
            $newAccountType['accounting_id'] = IndexSanityCheckHelper::indexSanityCheck('uid', $accountType);
            $newAccountType['name'] = IndexSanityCheckHelper::indexSanityCheck('name', $accountType);

            if (array_key_exists('classification', $accountType)) {
                $newAccountType['classification_name'] = IndexSanityCheckHelper::indexSanityCheck('name', $accountType['classification']);
                $newAccountType['classification_id'] = IndexSanityCheckHelper::indexSanityCheck('uid', $accountType['classification']);
            }
            array_push($accountTypes, $newAccountType);
        }
        return $accountTypes;
    }
}
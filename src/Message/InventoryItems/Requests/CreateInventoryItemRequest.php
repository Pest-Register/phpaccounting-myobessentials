<?php

namespace PHPAccounting\MyobEssentials\Message\Accounts\Requests;

use PHPAccounting\MyobEssentials\Message\AbstractRequest;
use PHPAccounting\MyobEssentials\Message\Accounts\Responses\CreateAccountResponse;
use PHPAccounting\MyobEssentials\Message\InventoryItems\Responses\CreateInventoryItemResponse;


/**
 * Create Account(s)
 * @package PHPAccounting\MyobEssentials\Message\InventoryItems\Requests
 */
class CreateInventoryItemRequest extends AbstractRequest
{


    /**
     * Get the raw data array for this message. The format of this varies from gateway to
     * gateway, but will usually be either an associative array, or a SimpleXMLElement.
     *
     * @return mixed
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Send Data to Xero Endpoint and Retrieve Response via Response Interface
     * @param mixed $data Parameter Bag Variables After Validation
     * @return \Omnipay\Common\Message\ResponseInterface|CreateAccountResponse
     */
    public function sendData($data)
    {
        $response = [];
        return $this->createResponse($response->getElements());
    }

    /**
     * Create Generic Response from Xero Endpoint
     * @param mixed $data Array Elements or Xero Collection from Response
     * @return CreateInventoryItemResponse
     */
    public function createResponse($data)
    {
        return $this->response = new CreateInventoryItemResponse($this, $data);
    }

    public function getEndpoint()
    {
        // TODO: Implement getEndpoint() method.
    }
}
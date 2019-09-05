<?php

namespace Tests\Invoices;


use Tests\BaseTest;

class CreatePaymentTest extends BaseTest
{
    public function testCreatePayment(){
        $this->setUp();
        try {

            $params = [
                'contact' => [
                    'accounting_id' => ''
                ],
                'currency_rate' => 1.0,
                'amount' => 100.00,
                'reference_id' => 'PR000001',
                'is_reconciled' => true,
                'date' => '2019-06-27',
                'invoice' => [
                    'accounting_id' => '426865532'
                ],
                'account' => [
                    'accounting_id' => '55970284'
                ]
            ];

            $response = $this->gateway->createPayment($params)->send();
            var_dump($response);
            if ($response->isSuccessful()) {
                $this->assertIsArray($response->getData());
                var_dump($response->getPayments());
            }
            var_dump($response->getErrorMessage());
        } catch (\Exception $exception) {
            var_dump($exception->getMessage());
        }
    }
}
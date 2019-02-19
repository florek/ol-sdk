<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Client;

use GuzzleHttp\Exception\ClientException;
use OpenLoyalty\SDK\DTO\TransactionQuery;
use OpenLoyalty\SDK\DTO\TransactionSimulateResponse;
use OpenLoyalty\SDK\Exception\ValidationError;
use OpenLoyalty\SDK\Model\Transaction;
use OpenLoyalty\SDK\Model\TransactionId;

/**
 * Class TransactionApiClient
 * @package OpenLoyalty\SDK\Client
 */
class TransactionApiClient extends BaseApiClient
{
    /**
     * @param TransactionQuery|null $query
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list(TransactionQuery $query = null)
    {
        if (null === $query) {
            $query = new TransactionQuery();
        }

        $response = $this->requestForm('GET', '/api/transaction', [
            'query' => array_filter([
                'page' => $query->getPage(),
                'perPage' => $query->getPerPage(),
                'sort' => $query->getSort(),
                'direction' => $query->getDirection(),
                'customerId' => $query->getCustomerId()
            ])
        ]);

        $transactions = [];
        $json = $this->getJson($response);
        if (isset($json['transactions'])) {
            foreach ($json['transactions'] as $transaction) {
                $transactions[] = $this->getDeserializerFactory()
                    ->getTransactionDeserializer()
                    ->deserialize($transaction);
            }
        }

        return $transactions;
    }

    /**
     * @param Transaction $transaction
     * @return Transaction
     * @throws \Assert\AssertionFailedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws ValidationError
     */
    public function register(Transaction $transaction)
    {
        try {
            $data = $this->getSerializerFactory()->getTransactionSerializer()->registerRequestDataFormat($transaction);
            $response = $this->requestForm('POST', '/api/transaction', ['transaction' => $data]);
            $json = $this->getJson($response);

            $transaction->setId(new TransactionId($json['transactionId']));

            return $transaction;
        } catch (ClientException $e) {
            throw new ValidationError('Validation error', $e->getRequest(), $e->getResponse(), $e);
        }
    }

    /**
     * @param Transaction $transaction
     * @return TransactionSimulateResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws ValidationError
     */
    public function simulate(Transaction $transaction)
    {
        try {
            $data = $this->getSerializerFactory()->getTransactionSerializer()->simulateRequestDataFormat($transaction);
            $response = $this->requestForm('POST', '/api/transaction/simulate', ['transaction' => $data]);
            $json = $this->getJson($response);

            return new TransactionSimulateResponse(floatval($json['points']));
        } catch (ClientException $e) {
            throw new ValidationError('Validation error', $e->getRequest(), $e->getResponse(), $e);
        }
    }
}

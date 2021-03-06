<?php

namespace DarkGhostHunter\TransbankApi\Adapters;

use DarkGhostHunter\TransbankApi\Contracts\TransactionInterface;
use DarkGhostHunter\TransbankApi\Exceptions\Webpay\InvalidWebpayTransactionException;
use DarkGhostHunter\TransbankApi\Exceptions\Webpay\ServiceSdkUnavailableException;
use DarkGhostHunter\TransbankApi\Transactions\WebpayTransaction;
use DarkGhostHunter\TransbankApi\Transactions\WebpayMallTransaction;
use DarkGhostHunter\TransbankApi\Clients\Webpay\PlusCapture;
use DarkGhostHunter\TransbankApi\Clients\Webpay\PlusNormal;
use DarkGhostHunter\TransbankApi\Clients\Webpay\PlusNullify;
use DarkGhostHunter\TransbankApi\Clients\Webpay\OneclickNormal;
use Exception;

class WebpayAdapter extends AbstractAdapter
{

    /**
     * Map of transaction types and their respective Clients
     *
     * @var array
     */
    protected $clients = [
        PlusNormal::class => [
            'plus.normal',
            'plus.defer',
            'plus.mall.normal',
            'plus.mall.defer',
        ],
        PlusCapture::class => [
            'plus.capture',
            'plus.mall.capture',
        ],
        PlusNullify::class => [
            'plus.nullify',
            'plus.mall.nullify',
        ],
        OneclickNormal::class => [
            'oneclick.register',
            'oneclick.confirm',
            'oneclick.unregister',
            'oneclick.charge',
            'oneclick.reverse',
        ]
    ];

    protected $commitMap = [
        'capture' => [
            'plus.capture',
            'plus.mall.capture',
        ],
        'nullify' => [
            'plus.nullify',
            'plus.mall.nullify',
        ],
        'register' => ['oneclick.register'],
        'confirm' => ['oneclick.confirm'],
        'unregister' => ['oneclick.unregister'],
        'charge' => ['oneclick.charge'],
        'reverse' => ['oneclick.reverse'],
        'commit' => [
            'plus.normal',
            'plus.defer',
            'plus.mall.normal',
            'plus.mall.defer',
        ],
    ];

    /**
     * Set the Clients per Type array
     *
     * @param array $array
     */
    public function setClients(array $array)
    {
        $this->clients = $array;
    }

    /**
     * Get the Clients per Type array
     *
     * @return array
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * Returns the Client for the type of transaction
     *
     * @param string $type
     * @return string|void
     */
    protected function getClientForType(string $type)
    {
        foreach ($this->clients as $client => $types) {
            if (in_array($type, $types) !== false) {
                return $client;
            }
        }
    }

    /**
     * Get the Commit Map
     *
     * @return array
     */
    public function getCommitMap()
    {
        return $this->commitMap;
    }


    /**
     * Sets the Commit Map
     *
     * @param array $commitMap
     */
    public function setCommitMap(array $commitMap)
    {
        $this->commitMap = $commitMap;
    }

    /**
     * Boots the correct Webpay Soap Adapter for the transaction type
     *
     * @param string $type
     * @throws ServiceSdkUnavailableException
     */
    protected function bootClient(string $type)
    {
        if (!$processor = $this->getClientForType($type)) {
            throw new ServiceSdkUnavailableException($type);
        };

        if (!$this->client instanceof $processor) {
            $this->client = new $processor($this->isProduction, $this->credentials);
            $this->client->boot();
        }
    }

    /**
     * Commits a transaction into the Transbank SDK
     *
     * @param TransactionInterface|WebpayTransaction|WebpayMallTransaction $transaction
     * @param mixed|null $options
     * @return mixed
     * @throws ServiceSdkUnavailableException
     * @throws InvalidWebpayTransactionException
     */
    public function commit(TransactionInterface $transaction, $options = null)
    {
        $this->bootClient($type = $transaction->getType());

        try {
            foreach ($this->commitMap as $method => $types) {
                if (in_array($type, $types)) {
                    return $this->client->{$method}($transaction);
                }
            }
        } catch (Exception $exception) {
            throw new InvalidWebpayTransactionException($transaction, $exception);
        }

        throw new ServiceSdkUnavailableException($type);
    }

    /**
     * Retrieves and Confirms a transaction into the Transbank SDK
     *
     * @param $transaction
     * @param mixed|null $options
     * @return mixed
     * @throws ServiceSdkUnavailableException
     */
    public function retrieveAndConfirm($transaction, $options = null)
    {
        $this->bootClient($options);

        switch ($options) {
            case 'oneclick.register':
                return $this->client->register($transaction);
            case 'plus.normal':
            case 'plus.mall.normal':
            default:
                return $this->client->retrieveAndConfirm($transaction);
        }
    }

    /**
     * Retrieves a transaction from Transbank
     *
     * @param $transaction
     * @param string|array|null $options
     * @return mixed
     * @throws ServiceSdkUnavailableException
     */
    public function retrieve($transaction, $options = null)
    {
        $this->bootClient($options);

        return $this->client->retrieve($transaction);
    }

    /**
     * Acknowledges a transaction in the Transbank SDK
     *
     * @param $transaction
     * @param string $options
     * @return bool
     * @throws ServiceSdkUnavailableException
     */
    public function confirm($transaction, $options = null)
    {
        $this->bootClient($options);

        return $this->client->confirm($transaction);
    }

}
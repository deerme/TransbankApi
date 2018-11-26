<?php

namespace DarkGhostHunter\TransbankApi\TransactionFactories;

use DarkGhostHunter\TransbankApi\Transactions\WebpayTransaction;
use DarkGhostHunter\TransbankApi\Transactions\WebpayMallTransaction;

class WebpayTransactionFactory extends AbstractTransactionFactory
{

    /*
    |--------------------------------------------------------------------------
    | Transaction Bases
    |--------------------------------------------------------------------------
    */

    /**
     * Returns an instance of a Transaction
     *
     * @param string $type
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Transactions\AbstractServiceTransaction|WebpayTransaction
     */
    protected function makeTransaction(string $type, array $attributes = [])
    {
        return $this->prepareTransaction($type, new WebpayTransaction($attributes));
    }

    /**
     * Returns an instance of a Transaction Mall
     *
     * @param string $type
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Transactions\AbstractServiceTransaction|WebpayMallTransaction
     */
    protected function makeTransactionMall(string $type, array $attributes = [])
    {
        return $this->prepareTransaction($type, new WebpayMallTransaction($attributes));
    }

    /*
    |--------------------------------------------------------------------------
    | Webpay Plus Normal
    |--------------------------------------------------------------------------
    */

    /**
     * Makes a new Webpay Plus Normal transaction
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Transactions\AbstractServiceTransaction|WebpayTransaction
     */
    public function makeNormal(array $attributes = [])
    {
        return $this->makeTransaction('plus.normal', $attributes);
    }

    /**
     * Commits a new Webpay Plus Normal transaction and returns the results
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Responses\AbstractResponse|\DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse
     */
    public function createNormal(array $attributes)
    {
        return $this->makeNormal($attributes)->commit();
    }

    /*
    |--------------------------------------------------------------------------
    | Webpay Plus Mall Normal
    |--------------------------------------------------------------------------
    */

    /**
     * Makes a new Webpay Plus Mall Normal transaction
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Transactions\AbstractServiceTransaction|WebpayMallTransaction
     */
    public function makeMallNormal(array $attributes = [])
    {
        return $this->makeTransactionMall('plus.mall.normal', $attributes);
    }

    /**
     * Commits a new Webpay Plus Mall Normal transaction and returns the results
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Responses\AbstractResponse|\DarkGhostHunter\TransbankApi\Responses\WebpayPlusMallResponse
     */
    public function createMallNormal(array $attributes)
    {
        return $this->makeMallNormal($attributes)->commit();
    }

    /*
    |--------------------------------------------------------------------------
    | Webpay Plus Deferred
    |--------------------------------------------------------------------------
    */

    /**
     * Makes a new Webpay Plus Deferred transaction
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Transactions\AbstractServiceTransaction|WebpayTransaction
     */
    public function makeDefer(array $attributes = [])
    {
        return $this->makeTransaction('plus.defer', $attributes);
    }

    /**
     * Commits a new Webpay Plus Deferred transaction and returns the results
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Responses\AbstractResponse|\DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse
     */
    public function createDefer(array $attributes)
    {
        return $this->makeDefer($attributes)->commit();
    }

    /*
    |--------------------------------------------------------------------------
    | Webpay Plus Mall Deferred
    |--------------------------------------------------------------------------
    */

    /**
     * Makes a new Webpay Plus Mall Deferred transaction
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Transactions\AbstractServiceTransaction|WebpayTransaction
     */
    public function makeMallDefer(array $attributes = [])
    {
        return $this->makeTransactionMall('plus.mall.defer', $attributes);
    }

    /**
     * Commits a new Webpay Plus Mall Deferred transaction and returns the results
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Responses\AbstractResponse|\DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse
     */
    public function createMallDefer(array $attributes)
    {
        return $this->makeMallDefer($attributes)->commit();
    }

    /*
    |--------------------------------------------------------------------------
    | Webpay Plus Capture
    |--------------------------------------------------------------------------
    */

    /**
     * Makes a new Webpay Plus Deferred transaction
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Transactions\AbstractServiceTransaction|WebpayTransaction
     */
    public function makeCapture(array $attributes = [])
    {
        return $this->makeTransaction('plus.capture', $attributes);
    }

    /**
     * Commits a new Webpay Plus Deferred transaction and returns the results
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Responses\AbstractResponse|\DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse
     */
    public function createCapture(array $attributes)
    {
        return $this->makeCapture($attributes)->commit();
    }

    /*
    |--------------------------------------------------------------------------
    | Webpay Plus Mall Capture
    |--------------------------------------------------------------------------
    */

    /**
     * Makes a new Webpay Plus Mall Deferred transaction
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Transactions\AbstractServiceTransaction|WebpayTransaction
     */
    public function makeMallCapture(array $attributes = [])
    {
        return $this->makeTransaction('plus.mall.capture', $attributes);
    }

    /**
     * Commits a new Webpay Plus Mall Capture transaction and returns the results
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Responses\AbstractResponse|\DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse
     */
    public function createMallCapture(array $attributes)
    {
        return $this->makeMallCapture($attributes)->commit();
    }

    /*
    |--------------------------------------------------------------------------
    | Webpay Plus Nullify
    |--------------------------------------------------------------------------
    */

    /**
     * Makes a new Webpay Plus Nullify transaction
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Transactions\AbstractServiceTransaction|WebpayTransaction
     */
    public function makeNullify(array $attributes = [])
    {
        return $this->makeTransaction('plus.nullify', $attributes);
    }

    /**
     * Commits a new Webpay Plus Nullify transaction and returns the results
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Responses\AbstractResponse|\DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse
     */
    public function createNullify(array $attributes)
    {
        return $this->makeNullify($attributes)->commit();
    }

    /*
    |--------------------------------------------------------------------------
    | Webpay Oneclick Registration
    |--------------------------------------------------------------------------
    */

    /**
     * Makes a new Webpay Oneclick Registration transaction
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Transactions\AbstractServiceTransaction|WebpayTransaction
     */
    public function makeRegistration(array $attributes = [])
    {
        return $this->makeTransaction('oneclick.register', $attributes);
    }

    /**
     * Commits a new Webpay Oneclick Registration transaction and returns the results
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Responses\AbstractResponse|\DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse
     */
    public function createRegistration(array $attributes)
    {
        return $this->makeRegistration($attributes)->commit();
    }

    /*
    |--------------------------------------------------------------------------
    | Webpay Oneclick Unregistration
    |--------------------------------------------------------------------------
    */

    /**
     * Makes a new Webpay Oneclick Unregistration transaction
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Transactions\AbstractServiceTransaction|WebpayTransaction
     */
    public function makeUnregistration(array $attributes = [])
    {
        return $this->makeTransaction('oneclick.unregister', $attributes);
    }

    /**
     * Commits a new Webpay Oneclick Unregistration transaction and returns the results
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Responses\AbstractResponse|\DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse
     */
    public function createUnregistration(array $attributes)
    {
        return $this->makeUnregistration($attributes)->commit();
    }

    /*
    |--------------------------------------------------------------------------
    | Webpay Oneclick Charge
    |--------------------------------------------------------------------------
    */

    /**
     * Makes a new Webpay Oneclick Charge transaction
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Transactions\AbstractServiceTransaction|WebpayTransaction
     */
    public function makeCharge(array $attributes = [])
    {
        return $this->makeTransaction('oneclick.charge', $attributes);
    }

    /**
     * Commits a new Webpay Oneclick Charge transaction and returns the results
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Responses\AbstractResponse|\DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse
     */
    public function createCharge(array $attributes)
    {
        return $this->makeCharge($attributes)->commit();
    }

    /*
    |--------------------------------------------------------------------------
    | Webpay Oneclick Reverse Charge
    |--------------------------------------------------------------------------
    */

    /**
     * Makes a new Webpay Oneclick Reverse Charge transaction
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Transactions\AbstractServiceTransaction|WebpayTransaction
     */
    public function makeReverseCharge(array $attributes = [])
    {
        return $this->makeTransaction('oneclick.reverse', $attributes);
    }

    /**
     * Commits a new Webpay Oneclick Reverse Charge transaction and returns the results
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Responses\AbstractResponse|\DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse
     */
    public function createReverseCharge(array $attributes)
    {
        return $this->makeReverseCharge($attributes)->commit();
    }

    /*
    |--------------------------------------------------------------------------
    | Webpay Oneclick Mall Charge
    |--------------------------------------------------------------------------
    */

    /**
     * Makes a new Webpay Oneclick Mall Charge transaction
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Transactions\AbstractServiceTransaction|WebpayMallTransaction
     */
    public function makeMallCharge(array $attributes = [])
    {
        return $this->makeTransactionMall('oneclick.mall.charge', $attributes);
    }

    /**
     * Commits a new Webpay Oneclick Mall Charge transaction and returns the results
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Responses\AbstractResponse|\DarkGhostHunter\TransbankApi\Responses\WebpayPlusMallResponse
     */
    public function createMallCharge(array $attributes = [])
    {
        return $this->makeMallCharge($attributes)->commit();
    }

    /*
    |--------------------------------------------------------------------------
    | Webpay Oneclick Reverse Charge
    |--------------------------------------------------------------------------
    */

    /**
     * Makes a new Webpay Oneclick Mall Reverse Charge transaction
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Transactions\AbstractServiceTransaction|WebpayMallTransaction
     */
    public function makeMallReverseCharge(array $attributes = [])
    {
        return $this->makeTransactionMall('oneclick.mall.reverse', $attributes);
    }

    /**
     * Commits a new Webpay Oneclick Mall Reverse Charge transaction and returns the results
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Responses\AbstractResponse|\DarkGhostHunter\TransbankApi\Responses\WebpayPlusMallResponse
     */
    public function createMallReverseCharge(array $attributes = [])
    {
        return $this->makeMallReverseCharge($attributes)->commit();
    }

    /*
    |--------------------------------------------------------------------------
    | Webpay Oneclick Mall Nullify
    |--------------------------------------------------------------------------
    */

    /**
     * Makes a new Webpay Oneclick Mall Nullify transaction
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Transactions\AbstractServiceTransaction|WebpayTransaction
     */
    public function makeMallNullify(array $attributes = [])
    {
        return $this->makeTransaction('oneclick.mall.nullify', $attributes);
    }

    /**
     * Commits a new Webpay Oneclick Mall Nullify transaction and returns the results
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Responses\AbstractResponse|\DarkGhostHunter\TransbankApi\Responses\WebpayPlusMallResponse
     */
    public function createMallNullify(array $attributes = [])
    {
        return $this->makeMallNullify($attributes)->commit();
    }

    /*
    |--------------------------------------------------------------------------
    | Webpay Oneclick Mall Reverse Nullify
    |--------------------------------------------------------------------------
    */

    /**
     * Makes a new Webpay Oneclick Mall Reverse Nullify transaction
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Transactions\AbstractServiceTransaction|WebpayTransaction
     */
    public function makeMallReverseNullify(array $attributes = [])
    {
        return $this->makeTransaction('oneclick.mall.reverseNullify', $attributes);
    }

    /**
     * Commits a new Webpay Oneclick Mall Reverse Nullify transaction and returns the results
     *
     * @param array $attributes
     * @return \DarkGhostHunter\TransbankApi\Responses\AbstractResponse|\DarkGhostHunter\TransbankApi\Responses\WebpayPlusMallResponse
     */
    public function createMallReverseNullify(array $attributes = [])
    {
        return $this->makeMallReverseNullify($attributes)->commit();
    }

}
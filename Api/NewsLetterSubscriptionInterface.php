<?php

namespace Headle\ApiExtension\Api;

interface NewsLetterSubscriptionInterface
{
    /**
     * @param int $customerId
     * @return mixed
     */
    public function postNewsLetter($customerId);
}

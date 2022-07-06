<?php

namespace Headle\ApiExtension\Model;

use Headle\ApiExtension\Api\NewsLetterSubscriptionInterface;
use Magento\Customer\Model\ResourceModel\CustomerRepository;
use Magento\Framework\App\RequestInterface;
use Magento\Newsletter\Model\Subscriber;
use Magento\Newsletter\Model\SubscriberFactory;
use Magento\Store\Model\StoreManagerInterface;

class NewsLetterSubscription implements NewsLetterSubscriptionInterface
{
    /**
     * @var RequestInterface
     */
    private $request;
    /**
     * @var StoreManagerInterface
     */
    private $storeManager;
    /**
     * @var CustomerRepository
     */
    private $customerRepository;
    /**
     * @var SubscriberFactory
     */
    private $subscriberFactory;
    /**
     * @var Subscriber
     */
    private $subscriber;

    public function __construct(
        RequestInterface $request,
        StoreManagerInterface $storeManager,
        CustomerRepository $customerRepository,
        SubscriberFactory $subscriberFactory,
        Subscriber $subscriber
    ) {
        $this->request = $request;
        $this->storeManager = $storeManager;
        $this->customerRepository = $customerRepository;
        $this->subscriberFactory = $subscriberFactory;
        $this->subscriber = $subscriber;
    }


    public function postNewsLetter($customerId)
    {
        $email = $this->request->getParam('email', false);
        if (($customerId == null || $customerId == '' || $customerId == 0) && $email) {
            try {
                if ((boolean)$this->request->getParam('is_subscribed', false)) {
                    $this->subscriberFactory->create()->subscribe($email);
                    return 'You have successfully subscribed! Thanks for subscribing to our newsletter!';
                }
            } catch (\Exception $e) {
                return 'Something went wrong with your newsletter subscription.';
            }
        } else {
            try {
                $customer = $this->customerRepository->getById($customerId);
                $storeId = $this->storeManager->getStore()->getId();
                $customer->setStoreId($storeId);
                $this->customerRepository->save($customer);

                if ((boolean)$this->request->getParam('is_subscribed', false)) {
                    $this->subscriberFactory->create()->subscribeCustomerById($customerId);
                    return 'You have successfully subscribed! Thanks for subscribing to our newsletter!';
                } else {
                    $this->subscriberFactory->create()->unsubscribeCustomerById($customerId);
                    return 'You have successfully unsubscribed!';
                }
            } catch (\Exception $e) {
                return 'Something went wrong with your newsletter subscription.';
            }
        }
    }
}

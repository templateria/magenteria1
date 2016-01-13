<?php

class Templateria_NewsletterSubscribe_Observers_SubscriptionObserver
{
    public function subscribe(Varien_Event_Observer $observer)
    {
        $data      = $observer->getEvent()->getDataObject()->getData();
        $apikey    = Mage::getStoreConfig('newslettersubscribe/account/apikey');
        $accountId = Mage::getStoreConfig('newslettersubscribe/account/accountid');
        $listId    = Mage::getStoreConfig('newslettersubscribe/account/listid');
        
        if (empty($apikey) || empty($accountId) || empty($listId)) {
            Mage::log('Templateria Newsletter Subscribe failed for email "' . $data['subscriber_email'] . '": incomplete configuration.');
            return $observer;
        }

        $postUrl = 'https://api.templateria.com/v1/accounts/' . $accountId . '/lists/'  . $listId . '/contacts';
        $result  = null;

        if (function_exists('curl_init')) {
            $ch = curl_init();

            curl_setopt_array($ch, array(
                CURLOPT_URL            => $postUrl,
                CURLOPT_POST           => true,
                CURLOPT_POSTFIELDS     => http_build_query(array('email' => $data['subscriber_email'])),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER     => array(
                    'Authorization: Bearer ' . $apikey,
                    'Content-type: application/x-www-form-urlencoded',
                    'User-agent: Magenteria1',
                )
            ));

            $result = json_decode(curl_exec($ch));
        } else {
            $result = json_decode(file_get_contents($postUrl, false, stream_context_create(array(
                'http' => array(
                    'method'        => 'POST',
                    'ignore_errors' => true,
                    'content'       => http_build_query(array('email' => $data['subscriber_email'])),
                    'header'        => join("\r\n", array(
                        "Authorization: Bearer $apikey",
                        'Content-type: application/x-www-form-urlencoded',
                        'User-agent: Magenteria1'
                    )
                )
            )))));
        }

        if ($result->error && $res->error->message !== 'is already taken') { 
            Mage::log('Templateria Newsletter Subscribe failed for email "' . $data['subscriber_email'] . '": ' . $result->error->message);
        }

        return $observer;
    }
}

## Extension to enable Amazon Pay Alexa features on Magento 2

[Learn More about Amazon Pay](https://pay.amazon.com/sp/magento)

### Pre-Requisites
* Magento 2.2.4+, 2.3.x
* Amazon Pay module enabled

## Alexa Delivery Notifications
The Alexa Delivery Notifications feature lets you provide shipment tracking information to Amazon Pay so that Amazon Pay can notify buyers on Alexa when shipments are delivered.

Here's what your customer will experience:

`Customer: Alexa, read my notifications.`

`Alexa: One new notification, from Amazon Pay. Your shipment from <yourstorename> has been delivered.`

## Configuring Alexa Delivery Notifications

Private Key and Public Key Id are the required keys for Alexa Delivery Notifications. Follow the below instructions to get them from the Seller Central account(Please use admin account to log in)- 

1. Navigate to Amazon Pay Integration Central
2. Choose the "Alexa" Integration channel
    1. From the "What are you looking to do?" drop-down menu select “Set up delivery notifications”
    1. Select “Get instructions”
3. Create a public/private key pair
    1. Scroll down to the “API keys” section
    1. Choose “Create keys”
    1. Use the default “Generate API credentials” setting
    1. Name your API keys. Use a descriptive name, the name will be used to differentiate between multiple keys when you need to manage them in Integration Central. When naming the keys, you should consider who is using it and what they’re using it for
    1. Choose “Create keys” in the pop-up window to create the public/private key pair
4. Store the private key and Public Key ID
    1. Creating the key pair will automatically download the private key (.pem) file to your browser, you do not need the public key. Save the private key file in a secure location, you will need it to access Amazon Pay APIs.
    1. Store your Public Key ID, you will need it to access Amazon Pay APIs. Unlike the private key file, you can return to this page at a later time to access your Public Key ID.

## Merchant Experience
Once you have configured Alexa Delivery Notifications, your store is ready to use this feature.

Alexa Delivery Notification is called when:
* A shipment is submitted with the carrier code, name and tracking number
* On a successful Alexa Delivery Tracker API, you will see its status as ‘Amazon Pay has received shipping tracking information for carrier <carrier_name> and tracking number <tracking_number>’. 

The status will show under:
   * ‘Comments History’ in the Order view.
   * Under individual Shipment -> Shipment History.
   
## Installation
### (Prerequisite: write permissions to Magento 2 root folder)

### Install via composer (recommended):
```
$ composer require amzn/amazon-pay-magento-2-alexa-plugin
$ php bin/magento module:enable Amazon_Alexa
$ php bin/magento setup:upgrade
$ php bin/magento setup:di:compile
$ php bin/magento cache:clean
```
### Manual install:
```
$ mkdir -p app/code/Amazon/
$ git clone https://github.com/amzn/amazon-pay-magento-2-alexa-plugin.git app/code/Amazon/Alexa
$ composer require amzn/amazon-pay-sdk-v2-php
$ php bin/magento module:enable Amazon_Alexa
$ php bin/magento setup:upgrade
$ php bin/magento setup:di:compile
$ php bin/magento cache:clean
```

## Dependencies

You can find a list of modules in the require section of the `composer.json` file located in the
same directory as this `README.md` file.

## Extension Points

Amazon Pay does not provide any specific extension points.

## Additional Information

[View the Complete User Guide](https://amzn.github.io/amazon-payments-magento-2-plugin/)

## License

This library is licensed under the Apache 2.0 License. 

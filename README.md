## Extension to enable Amazon Pay Alexa features on Magento 2

[Learn More about Amazon Pay](https://pay.amazon.com/sp/magento)

### Pre-Requisites
* Magento 2.2.4 and above
* Amazon Pay module enabled

## Alexa Delivery Notifications
The Alexa Delivery Notifications feature lets you provide shipment tracking information to Amazon Pay so that Amazon Pay can notify buyers on Alexa when shipments are delivered.

Here's what your customer will experience:

`Customer: Alexa, read my notifications.`

`Alexa: One new notification, from Amazon Pay. Your shipment from <yourstorename> has been delivered.`

## Configuring Alexa Delivery Notifications

These are the required keys for Alexa Delivery Notifications:

### Public and Private Key
The utility link provided in the Alexa Delivery Notifications settings, generates a new Public and Private Key for Amazon Pay. 
* Click 'Generate a new public/private key pair for Amazon Pay'. This saves the Private Key in the settings and displays the text `[encrypted]`.
* Click 'Download Public Key' to save the Public Key locally.

### Public Key ID
To obtain the `Public Key ID`, you will need to email Amazon Pay and provide the `Merchant ID` and `Public Key`. Follow the steps below:

* Click contact link in the 'Please contact Amazon Pay to receive the Public Key ID.'
* `Public Key` and `Merchant ID` is attached to the email, click Send.
* Amazon Pay Support will respond with the `Public Key ID` to the email address associated with the primary account holder in Seller Central.

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

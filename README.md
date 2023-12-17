# IsyerimPOS Laravel Integration Package

## Installation

You can install the package via composer:

```bash
composer require mkeremcansev/isyerim-pos @dev
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="isyerim-pos-config"
```

Add env variables to your .env file

```env
ISYERIMPOS_API_URL=
ISYERIMPOS_API_KEY=
ISYERIMPOS_MERCHANT_ID=
ISYERIMPOS_USER_ID=
```

## Usage

```php
// use
use Mkeremcansev\IsyerimPos\Services\IsyerimPOSInterface;


$informations = resolve(IsyerimPOSInterface::class)
    ->setReturnUrl('http://redirect-url') // this parameter is the url that you want to redirect after payment
    ->setOrderId('Created order id') // this parameter is the order id that you created
    ->setClientIP(request()->getClientIp()) // this parameter if not set, will be set automatically
    ->setInstallments(0) // this parameter is how many installments you want to use
    ->setAmount('200.00') // this parameter is the amount of the order
    ->setIs3D(true) // this parameter is if you want to use 3D secure
    ->setIsAutoCommit(false) // this parameter is if you want to auto commit the order
    ->setCardInformation(
        cardOwner: 'Card owner',
        cardNo: 'Card number',
        month: 'Card month',
        year: 'Card year',
        cvv: 'Card cvv'
    ) // this parameter is the card information
    ->setCustomerInformation(
        name: 'Customer name',
        surname: 'Customer surname',
        phone: 'Customer phone',
        email: 'Customer email',
        address: 'Customer address',
        description: 'Customer description'
    ) // this parameter is the customer information
    ->setProducts(
        [
            [
                'Name' => 'Product 1',
                'Count' => 1,
                'UnitPrice' => '100.00',
            ],
            [
                'Name' => 'Product 2',
                'Count' => 1,
                'UnitPrice' => '100.00',
            ],
        ]
    ); // this parameter is the products information
```

## Available Methods

```php
// this method is for creating payment request
$payRequest = $informations->createPayRequest();

// get payment uuid
$payRequest->getUuid();

// get payment url
$payRequest->getPaymentLink();

// get payment html
$payRequest->getPaymentHtml();

// get payment order id
$payRequest->getOrderId();

// get payment confirm key
$payRequest->getConfirmKey();

// this method is for getting payment result for 3D secure
$paymentConfirmationResponse = resolve(IsyerimPOSInterface::class)->paymentConfirmationFor3DRequest(
    uuid: $payRequest->getUuid(),
    confirmKey: $payRequest->getConfirmKey()
);

// this method is canceling payment
$cancelPayment = resolve(IsyerimPOSInterface::class)->cancelRequest(
    uuid: $payRequest->getUuid(),
    description: 'Payment cancel description'
);

// this method is refunding payment
$refundPayment = resolve(IsyerimPOSInterface::class)->refundRequest(
    uuid: $payRequest->getUuid(),
    amount: 100.00,
    description: 'Payment refund description'
);

// this method is checking payment result

$checkPayment = resolve(IsyerimPOSInterface::class)->resultCheckRequest(
    uuid: $payRequest->getUuid()
);

// this method is get installments
$installments = $informations->getInstallmentsRequest(
    amount: 100.00,
    cardNo: 'Card number'
);

// this method is get comissions rates
$comissions = resolve(IsyerimPOSInterface::class)->getComissionsRatesRequest();

// this method is get transactions with between dates.
// *Date parameters format is Y-m-d
$transactions = resolve(IsyerimPOSInterface::class)->getTransactionsRequest(
    startDate: 'Start date',
    endDate: 'End date'
);

// All request responses has the following methods
$payRequest->isSuccess(); // this method is checking if the request is success
$payRequest->getErrorCode(); // this method is getting error code
$payRequest->isDone(); // this method is checking if the request is done
$payRequest->getMessage(); // this method is getting message

// If you cannot find the key you are looking for in the response class,
// you can find all keys and values with following method
$payRequest->getResponse(); // this method is getting response
```

X.509 certificates lookup library.

**CertLookup** is a PHP library for retrieving and parsing SSL/TLS certificates for a given domain. It provides an easy-to-use API to extract important information about the certificate.

## Installation
### 1. Install with Composer
You can install **CertLookup** using Composer by either requiring the package from **Packagist** or directly from the **GitHub repository**.

#### From Packagist:
```bash
composer require rukamuel/certlookup
```
#### From GitHub (with stability options):
To use a stable version:
```bash
composer require rukamuel/certlookup:dev-stable
```
For the main branch (the latest changes):
```bash
composer require rukamuel/certlookup:dev-main
```
Add this to your composer.json if you prefer:
```json
{
    "require": {
        "rukamuel/certlookup": "dev-stable"  
        // or "dev-main" for the latest development version
    }
}
```
Then, run:

```bash
composer install
```

### 2. Install without Composer
If you're not using Composer, you can clone the repository directly and include the CertLookup.php file manually in your project.
```bash
git clone https://github.com/rukamuel/certlookup.git
```
Include the file manually in your code:
```php
require_once 'path/to/certlookup/src/CertLookup.php';
```
Make sure to adjust the path to where you clone the repository and put it in your project.

## Basic Example

Once the library is installed, you can use it to retrieve and display SSL certificate information for a given domain.

```php
<?php
// If using Composer, autoload the library
require __DIR__ . '/vendor/autoload.php';

// Use the CertLookup namespace
use rukamuel\CertLookup\CertLookup;

// Create a CertLookup instance for a given domain
$certLookup = new CertLookup('example.com');

// Retrieve SSL certificate details
echo "Issuer: " . $certLookup->getIssuer() . PHP_EOL;
echo "Valid From: " . $certLookup->getValidFrom() . PHP_EOL;
echo "Valid To: " . $certLookup->getValidTo() . PHP_EOL;
echo "Common Name (CN): " . $certLookup->getCommonName() . PHP_EOL;
```

## Testing

To run the tests, you can use PHPUnit. If you have installed PHPUnit as a dev dependency, use the following command:

```bash
composer test
```

If you are using PHPUnit globally:
```bash
phpunit --configuration phpunit.xml
```

## Branches
- ```dev-stable```: For users who need stability and want a more tested and verified version of the library.
- ```dev-main```: For users who want the latest updates and can tolerate potential changes in development.

## License
This project is licensed under the MIT License. See the LICENSE file for details.

## Author
Emanuel Rukavina - rukamuel@proton.me
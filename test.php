<?php
require 'vendor/autoload.php';

use rukamuel\CertLookup\CertLookup;

$certLookup = new CertLookup('example.com');

echo "Issuer: " . $certLookup->getIssuer() . PHP_EOL;
echo "Valid From: " . $certLookup->getValidFrom() . PHP_EOL;
echo "Valid To: " . $certLookup->getValidTo() . PHP_EOL;
echo "Common Name (CN): " . $certLookup->getCommonName() . PHP_EOL;
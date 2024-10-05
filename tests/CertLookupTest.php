<?php
use PHPUnit\Framework\TestCase;
use rukamuel\CertLookup\CertLookup;

class CertLookupTest extends TestCase {

    protected $certLookup;

    protected function setUp(): void {
        $this->certLookup = new CertLookup('example.com');
    }

    public function testGetIssuer() {
        $issuer = $this->certLookup->getIssuer();
        $this->assertNotEmpty($issuer, "Issuer should not be empty");
    }

    public function testGetValidFrom() {
        $validFrom = $this->certLookup->getValidFrom();
        $this->assertNotEmpty($validFrom, "Valid From date should not be empty");
        $this->assertMatchesRegularExpression('/\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}/', $validFrom, "Valid From date should match date format");
    }

    public function testGetValidTo() {
        $validTo = $this->certLookup->getValidTo();
        $this->assertNotEmpty($validTo, "Valid To date should not be empty");
        $this->assertMatchesRegularExpression('/\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}/', $validTo, "Valid To date should match date format");
    }
}

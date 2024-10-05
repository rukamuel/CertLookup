<?php
namespace rukamuel\CertLookup;

class CertLookup {
    private $url;
    private $certInfo;

    public function __construct($url) {
        $this->url = $url;
        $this->certInfo = $this->retrieveCert();
    }

    private function retrieveCert() {
        $streamContext = stream_context_create([
            "ssl" => [
                "capture_peer_cert" => true
            ]
        ]);

        $client = @stream_socket_client(
            "ssl://$this->url:443",
            $errno, $errstr, 30, STREAM_CLIENT_CONNECT, $streamContext
        );

        if (!$client) {
            throw new \Exception("Unable to connect to {$this->url}: $errstr");
        }

        $params = stream_context_get_params($client);
        $certResource = $params["options"]["ssl"]["peer_certificate"];
        return openssl_x509_parse($certResource);
    }

    public function GetCert(){
        return $this->certInfo;
    }
    public function getIssuer() {
        return $this->certInfo['issuer']['O'] ?? null;
    }

    public function getValidFrom() {
        return date('Y-m-d H:i:s', $this->certInfo['validFrom_time_t']);
    }

    public function getValidTo() {
        return date('Y-m-d H:i:s', $this->certInfo['validTo_time_t']);
    }

    public function getCommonName() {
        return $this->certInfo['subject']['CN'] ?? null;
    }
}

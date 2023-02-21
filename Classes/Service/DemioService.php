<?php

namespace Netresearch\Demio\Service;

use GuzzleHttp\Client;
use phpDocumentor\Reflection\Types\Integer;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class DemioService
 *
 * @package Netresearch\Demio\Service
 */
class DemioService implements LoggerAwareInterface
{

    /**
     * Use the logger trait to get a logger in your class
     */
    use LoggerAwareTrait;

    /**
     * API URL from Demio
     */
    const API_URL = 'https://my.demio.com/api/v1/';

    /**
     * @var Client $httpClient The HTTP client
     */
    protected Client $httpClient;

    /**
     * @var array $settings The extension settings
     */
    protected mixed $settings;

    protected mixed $headers;

    /**
     * DemioService constructor.
     */
    public function __construct()
    {
        $this->httpClient = new Client();
        $extensionConfiguration = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class);
        $this->settings = $extensionConfiguration->get('demio');
        $this->headers = [
            'Api-Key'      => $this->settings['key'],
            'Api-Secret'   => $this->settings['secret'],
            'Content-Type' => 'application/json'
        ];
    }

    /**
     * Fetches events from the Demio API
     *
     * @param string $type The type of events to fetch
     *
     * @return mixed
     * @throws \RuntimeException|\GuzzleHttp\Exception\GuzzleException
     */
    public function fetchEventsFromApi(string $type = ''): mixed
    {
        $response = $this->httpClient->request('GET', self::API_URL . 'events?type=' . $type, [
            'headers' => $this->headers
        ]);
        $statusCode = $response->getStatusCode();

        if ($statusCode === 200) {
            return json_decode($response->getBody(), true);
        } else {
            $error = 'API request failed with status code ' . $statusCode;
            $this->logger->error($error);
            throw new \RuntimeException($error);
        }
    }

    /**
     * Fetches a single event from the demio API
     *
     * @param Integer $id
     * @param bool    $active
     *
     * @return mixed
     * @throws \RuntimeException|\GuzzleHttp\Exception\GuzzleException
     */
    public function fetchEventFromApi(int $id, bool $active = true): mixed
    {
        $response = $this->httpClient->request('GET', self::API_URL.'event/' . $id . '?active=' . $active, [
            'headers' => $this->headers
        ]);

        // Check the status code of the response.
        $statusCode = $response->getStatusCode();

        if ($statusCode === 200) {
            return json_decode($response->getBody(), true);
        } else {
            $error = 'API request failed with status code ' . $statusCode;
            $this->logger->error($error);
            throw new \RuntimeException($error);
        }
    }

}
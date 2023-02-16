<?php

namespace Netresearch\Demio\Service;

use GuzzleHttp\Client;
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
    const API_URL = 'https://my.demio.com/api/v1/events';

    /**
     * @var Client $httpClient The HTTP client
     */
    protected Client $httpClient;

    /**
     * @var array $settings The extension settings
     */
    protected mixed $settings;


    /**
     * DemioService constructor.
     */
    public function __construct()
    {
        $this->httpClient = new Client();
        $extensionConfiguration = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class);
        $this->settings = $extensionConfiguration->get('demio');
    }

    /**
     * Fetches events from the demio API
     *
     * @param string $type
     *
     * @return mixed
     * @throws \RuntimeException
     */
    public function fetchEventsFromApi(string $type = ''): mixed
    {
        $headers = [
            'Api-Key'      => $this->settings['key'],
            'Api-Secret'   => $this->settings['secret'],
            'Content-Type' => 'application/json'
        ];

        $response = $this->httpClient->request('GET', self::API_URL . '?type=' . $type, [
            'headers' => $headers
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
}

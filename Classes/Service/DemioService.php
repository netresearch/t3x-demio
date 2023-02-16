<?php

namespace Netresearch\T3Demio\Service;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use GuzzleHttp\Client;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;

/**
 * Class DemioService
 * @package Netresearch\T3Demio\Service
 */
class DemioService implements LoggerAwareInterface
{

    /**
     * Use the logger trait to get a logger in your class
     */
    use LoggerAwareTrait;

    /**
     * API URL from demio
     */
    const API_URL = 'https://my.demio.com/api/v1/events?type=past';

    /**
     * @var Client $httpClient The HTTP client
     */
    protected $httpClient;

    /**
     * @var array $settings The extension settings
     */
    protected $settings;


    public function __construct()
    {   
        $this->httpClient = new Client();
        $extensionConfiguration = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class);
        $this->settings = $extensionConfiguration->get('t3_demio');
    }

    /**
     * Fetches events from the demio API
     *
     * @param string $type
     * @throws \RuntimeException
     * @return mixed
     */
    public function fetchEventsFromApi(string $type = 'all'):mixed
    {
        $headers = [
            'Api-Key' => $this->settings['API_KEY'],
            'Api-Secret' => $this->settings['API_SECRET'],
            'Content-Type' => 'application/json'
        ];

        $response = $this->httpClient->request('GET', self::API_URL, [
            'headers' => $headers
        ]);
        $statusCode = $response->getStatusCode();
        
        if ($statusCode === 200) {
            $responseData = json_decode($response->getBody(), true);
            return $responseData;
        } else {
            $error = 'API request failed with status code ' . $statusCode;
            $this->logger->error($error);
            throw new \RuntimeException($error);
        }
    }
}

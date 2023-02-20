<?php

namespace Netresearch\T3Demio\Service;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use GuzzleHttp\Client;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;


/**
 * This class provides functionality to fetch event data from Demio API using Guzzle.
 * It implements LoggerAwareInterface to enable logging functionality.
 */
class DemioService implements LoggerAwareInterface
{

    use LoggerAwareTrait;

    /**
     * URL for Demio API.
     */
    const API_URL = 'https://my.demio.com/api/v1/events?type=past';

    /**
     * HTTP client to be used to make requests to API.
     * 
     * @var Client
     */
    protected $httpClient;

    /**
     * Extension settings.
     * 
     * @var array
     */
    protected $settings;

    /**
     * Constructor method to instantiate the class.
     * It initializes the HTTP client and loads the extension settings.
     */
    public function __construct()
    {   
        $this->httpClient = new Client();
        $extensionConfiguration = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class);
        $this->settings = $extensionConfiguration->get('t3_demio');
    }

    /**
     * Method to fetch event data from API.
     * It takes an optional parameter 'type' to filter events by type.
     * It returns an array of event data on success and throws an exception on failure.
     * 
     * @param string $type
     * 
     * @return mixed
     * 
     * @throws \RuntimeException
     */
    public function fetchEventsFromApi(string $type = 'all'): mixed
    {
        // Set API request headers.
        $headers = [
            'Api-Key' => $this->settings['API_KEY'],
            'Api-Secret' => $this->settings['API_SECRET'],
            'Content-Type' => 'application/json'
        ];

        // Make GET request to API using Guzzle.
        $response = $this->httpClient->request('GET', self::API_URL, [
            'headers' => $headers
        ]);

        // Check the status code of the response.
        $statusCode = $response->getStatusCode();
        if ($statusCode === 200) {
            // If status code is 200, parse the response data and return it.
            $responseData = json_decode($response->getBody(), true);
            return $responseData;
        } else {
            // If status code is not 200, log an error and throw an exception.
            $this->logger->error('API request failed with status code ' . $statusCode);
            throw new \RuntimeException('API request failed with status code ' . $statusCode);
        }
    }
}
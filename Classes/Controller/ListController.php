<?php
declare(strict_types=1);

namespace Netresearch\T3Demio\Controller;

use GuzzleHttp\Exception\GuzzleException;
use Netresearch\T3Demio\Service\DemioService;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * This file is part of the "Demio" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023 André Lademann <andre.lademann@netresearch.de>, Netresearch DTT GmbH
 *          Philipp Madl <philipp.madl@netresearch.de>, Netresearch DTT GmbH
 */

/**
 * EventController
 */
class ListController extends ActionController
{
    public function __construct(
        private readonly DemioService $demioService
    ) {}

    /**
     * action list
     *
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function listAction(): ResponseInterface
    {
        $events = $this->demioService->fetchEventsFromApi($this->settings['type']);

        // Use TYPO3 cache framework to cache the events

        $this->view->assign('events', $events);
        return $this->htmlResponse();
    }


}

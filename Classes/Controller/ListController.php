<?php
declare(strict_types=1);

namespace Netresearch\Demio\Controller;

use GuzzleHttp\Exception\GuzzleException;
use Netresearch\Demio\Service\DemioService;
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
    private DemioService $demioService;

    public function __construct(DemioService $demioService)
    {
        $this->demioService = $demioService;
    }

    /**
     * action list
     *
     * @throws GuzzleException
     */
    public function listAction()
    {
        $events = $this->demioService->fetchEvents($this->settings['type']);

        // Use TYPO3 cache framework to cache the events
        $this->view->assign('events', $events);
    }
}

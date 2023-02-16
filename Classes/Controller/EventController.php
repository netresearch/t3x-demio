<?php
declare(strict_types=1);

namespace Netresearch\Demio\Controller;

use Netresearch\Demio\Service\DemioService;
use TYPO3\CMS\Core\Service\FlexFormService;
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
class EventController extends ActionController
{

    /**
     * @param DemioService    $demioService
     * @param FlexFormService $flexFormService
     */
    public function __construct(
        private DemioService             $demioService,
        private readonly FlexFormService $flexFormService)
    {
        $this->demioService = $demioService;
    }


    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $events = $this->demioService->fetchEventsFromApi($this->settings['type']);

        $this->view->assign('events', $events);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction($event): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('event', $event);
        return $this->htmlResponse();
    }

}

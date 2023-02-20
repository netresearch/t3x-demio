<?php
declare(strict_types=1);

namespace Netresearch\Demio\Controller;

use Netresearch\Demio\Service\DemioService;
use phpDocumentor\Reflection\Types\Integer;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;


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
     * @param DemioService $demioService
     */
    public function __construct(private readonly DemioService $demioService){}

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $events = $this->demioService->fetchEventsFromApi($this->settings['type']);

        // Use TYPO3 cache framework to cache the events




        $this->view->assign('events', $events);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(): \Psr\Http\Message\ResponseInterface
    {
        if($this->request->hasArgument('event')) {
            $id = (int) $this->request->getArgument('event')['id'];
            $event = $this->demioService->fetchEventFromApi($id);
            $this->view->assign('event', $event);
        } else {
            $this->view->assign('event', null);
        }
        return $this->htmlResponse();
    }

}

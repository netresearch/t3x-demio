<?php
declare(strict_types=1);

namespace Netresearch\Demio\Controller;

use GuzzleHttp\Exception\GuzzleException;
use Netresearch\Demio\Service\DemioService;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Mvc\Exception\NoSuchArgumentException;


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
class SingleController extends ActionController
{
    private DemioService  $demioService;

    /**
     * @param DemioService $demioService
     */
    public function __construct(DemioService $demioService)
    {
        $this->demioService = $demioService;
    }

    /**
     * action show
     *
     * @throws GuzzleException
     * @throws NoSuchArgumentException
     */
    public function showAction()
    {
        // If the url contains an event id, fetch the event from the api and assign it to the view
        if($this->request->hasArgument('event')) {
            $id = (int) $this->request->getArgument('event')['id'];
            $event = $this->demioService->fetchEvent($id);
            $this->view->assign('showBackLink', true);
            $this->view->assign('event', $event);
        } else {
            $id = (int) $this->settings['event'];
            $event = $this->demioService->fetchEvent($id);
            $this->view->assign('event', $event);
        }
    }

}

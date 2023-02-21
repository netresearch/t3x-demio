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
    public function __construct(
        private readonly DemioService $demioService
    ) {}

    /**
     * action show
     *
     * @return ResponseInterface
     * @throws GuzzleException
     * @throws NoSuchArgumentException
     */
    public function showAction(): ResponseInterface
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

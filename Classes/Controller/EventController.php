<?php


namespace Netresearch\T3Demio\Controller;

use Netresearch\T3Demio\Service\DemioService;
use TYPO3\CMS\Core\Service\FlexFormService;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class EventController extends ActionController
{

    /**
     * @param DemioService    $demioService
     * @param FlexFormService $flexFormService
     */
    public function __construct(
        private DemioService $demioService,
        private readonly FlexFormService $flexFormService)
    {
        $this->demioService = $demioService;
    }

    /**
     * Summary of listAction
     *
     * @return void
     */
    public function listAction()
    {
        // Get plugin configuration
        $this->flexFormService->convertFlexFormContentToArray();
        $data = $this->demioService->fetchEventsFromApi();
        $this->view->assign('events', $data);

    }

}

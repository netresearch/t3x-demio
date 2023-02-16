<?php


namespace Netresearch\T3Demio\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

use Netresearch\T3Demio\Service\DemioService;

class EventController extends ActionController
  {

    /**
     * @var DemioService
     */
    private ?DemioService $demioService = null;

    public function __construct(DemioService $demioService)
     {
        $this->demioService = $demioService;
     }

    /**
     * Summary of listAction
     * @return void
     */
    public function listAction()
    {
      $data =  $this->demioService->fetchEventsFromApi();
        $this->view->assign('events', $data);

    }

}

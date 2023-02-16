<?php


namespace Netresearch\T3Demio\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Core\Core\Environment;

use Netresearch\T3Demio\Service\DemioService;

class ListController extends ActionController
  {

    /**
     * @var DemioService
     */
    private ?DemioService $demioService = null;

    public function __construct(DemioService $demioService)
     {
        $this->demioService = $demioService;
     }
    

    public function listAction()
    {
      $data =  $this->demioService->fetchEventsFromApi();
        DebuggerUtility::var_dump($data);
        $this->view->assign('events', $data);

    }


}
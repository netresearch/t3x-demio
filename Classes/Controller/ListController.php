<?php


namespace Netresearch\T3Demio\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Core\Core\Environment;

class ListController extends ActionController
{

    public function listAction()
    {
//        DebuggerUtility::var_dump();die;
        $this->view->assign('events', 'dirk');

    }


}
<?php
declare(strict_types=1);

namespace Netresearch\Demio\Form\Element;

use GuzzleHttp\Exception\GuzzleException;
use Netresearch\Demio\Service\DemioService;
use TYPO3\CMS\Backend\Form\Element\AbstractFormElement;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class SelectEvent extends AbstractFormElement
{
    /**
     * Render select event field
     *
     * @return array
     * @throws GuzzleException
     */
    public function render():array
    {
        // Get events from API
        $demioService = GeneralUtility::makeInstance(DemioService::class);
        $events = $demioService->fetchEvents();

        $html = [];
        $html[] = '<select class="form-select form-control-adapt" name="' . $this->data['parameterArray']['itemFormElName'] . '">';

        foreach ($events as $event) {
            if ($event['id'] ===  (int) $this->data['parameterArray']['itemFormElValue']) {
                $html[] = '<option value="' . $event['id'] . '" selected>' . $event['name'] . ' ['. $event['id'] .']</option>';
            } else {
                $html[] = '<option value="' . $event['id'] . '">' . $event['name'] . ' ['. $event['id'] .']</option>';
            }
        }
        $html[] = '</select>';

        $resultArray = $this->initializeResultArray();
        $resultArray['html'] = implode('', $html);

        return $resultArray;
    }
}

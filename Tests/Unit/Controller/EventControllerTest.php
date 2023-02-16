<?php

declare(strict_types=1);

namespace Netresearch\Demio\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 *
 * @author André Lademann <andre.lademann@netresearch.de>
 * @author Philipp Madl <philipp.madl@netresearch.de>
 */
class EventControllerTest extends UnitTestCase
{
    /**
     * @var \Netresearch\Demio\Controller\EventController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\Netresearch\Demio\Controller\EventController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllEventsFromRepositoryAndAssignsThemToView(): void
    {
        $allEvents = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $eventRepository = $this->getMockBuilder(\::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $eventRepository->expects(self::once())->method('findAll')->will(self::returnValue($allEvents));
        $this->subject->_set('eventRepository', $eventRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('events', $allEvents);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenEventToView(): void
    {
        $event = new \Netresearch\Demio\Domain\Model\Event();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('event', $event);

        $this->subject->showAction($event);
    }
}

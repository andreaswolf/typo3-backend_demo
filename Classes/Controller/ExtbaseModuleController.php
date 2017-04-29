<?php
namespace AndreasWolf\BackendDemo\Controller;

use TYPO3\CMS\Backend\Template\Components\ButtonBar;
use TYPO3\CMS\Backend\View\BackendTemplateView;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Imaging\Icon;
use TYPO3\CMS\Core\Imaging\IconFactory;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\VersionNumberUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class ExtbaseModuleController extends ActionController
{
    /**
     * Make sure we get a correct backend module layout, including the docheader and proper styles. This is the
     * "Extbase way" of doing this; without Extbase, we have to do a lot of this manually.
     *
     * Using this view also enables us to use everything it provides, mainly the ModuleTemplate instance.
     *
     * @var string
     */
    protected $defaultViewObjectName = BackendTemplateView::class;

    /** @var BackendTemplateView */
    protected $view;

    /** @var IconFactory */
    protected $iconFactory;

    public function __construct()
    {
        parent::__construct();
        $this->iconFactory = GeneralUtility::makeInstance(IconFactory::class);
    }

    public function demoAction()
    {
        //
    }

    public function secondAction()
    {
        $buttonBar = $this->view->getModuleTemplate()->getDocHeaderComponent()->getButtonBar();

        $inputButton = $buttonBar->makeLinkButton();
        $inputButton->setHref('#')->setTitle('Demo link button')
            ->setIcon($this->iconFactory->getIcon('actions-document-save', Icon::SIZE_SMALL))
            ->setOnClick('alert("Button was clicked");')
            ->setShowLabelText(true);
        $buttonBar->addButton($inputButton, ButtonBar::BUTTON_POSITION_RIGHT);
    }

    public function listAction()
    {
        if (VersionNumberUtility::convertVersionNumberToInteger(TYPO3_version) < 8007000) {
            // TODO implement
        } else {
            /** @var ConnectionPool $connectionPool */
            $connectionPool = GeneralUtility::makeInstance(ConnectionPool::class);
            $qb = $connectionPool->getQueryBuilderForTable('tt_content');

            /**

             * Enable fields are evaluated by default. To remove them, use this:
            $qb->getRestrictions()->removeAll()

             * Adding restrictions can be done like this:
            $qb->getRestrictions()->add(GeneralUtility::makeInstance(DeletedRestriction::class))

            /**/
            $qb->getRestrictions()->removeByType('');
            $query = $qb->select('*')
                ->from('tt_content', 'content')
                ->orderBy('content.tstamp', 'DESC')
                ->setFirstResult(0)->setMaxResults(10)
                // "execute" is actually "build the query"
                ->execute();

            $query->execute();


            $rows = [];
            while ($row = $query->fetch(\PDO::FETCH_ASSOC)) {
                $rows[] = $row;
            }

            $this->view->assign('rows', $rows);
        }
    }

}

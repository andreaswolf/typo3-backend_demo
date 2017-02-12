<?php
namespace AndreasWolf\BackendDemo\Controller;

use TYPO3\CMS\Backend\View\BackendTemplateView;
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

    public function demoAction()
    {
        //
    }

    public function secondAction()
    {
        //
    }

}

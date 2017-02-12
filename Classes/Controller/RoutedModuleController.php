<?php
namespace AndreasWolf\BackendDemo\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;

class RoutedModuleController
{

    /**
     * Request dispatching method. This is set in the module configuration as the route target and called by the module
     * dispatcher.
     *
     * @param ServerRequestInterface $request PSR7 Request Object
     * @param ResponseInterface $response PSR7 Response Object
     *
     * @return ResponseInterface
     *
     * @throws \InvalidArgumentException In case an action is not callable
     */
    public function processRequest(ServerRequestInterface $request, ResponseInterface $response)
    {
        /** @var StandaloneView $view */
        $view = GeneralUtility::makeInstance(StandaloneView::class);
        $view->setLayoutRootPaths([ExtensionManagementUtility::extPath('backend_demo', 'Resources/Private/Layouts/')]);
        $view->setTemplateRootPaths([ExtensionManagementUtility::extPath('backend_demo', 'Resources/Private/Templates/BackendDemo/')]);
        $view->setTemplate('Main');

        // The response object is immutable as per PSR-7. Therefore we must return it here
        $response->getBody()->write($view->render());
        return $response;
    }

}

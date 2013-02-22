<?php
namespace NethServer\Module;
use Nethgui\System\PlatformInterface as Validate;

class MyModule extends \Nethgui\Controller\AbstractController
{

    // Add the module under the 'Configuration' section, at position 30
    protected function initializeAttributes(\Nethgui\Module\ModuleAttributesInterface $base)
    {
        return \Nethgui\Module\SimpleModuleAttributesProvider::extendModuleAttributes($base, 'Configuration', 30);
    }

    // Declare all parameters
    public function initialize()
    {
        parent::initialize();
        // Bind 'status' view parameter to 'myprop' prop in myserver key of configuration db
        $this->declareParameter('MyValues', Validate::SERVICESTATUS, array('configuration', 'myserver', 'myprop'));
    }

    // Prepare all values for view
    public function prepareView(\Nethgui\View\ViewInterface $view)
    {
        parent::prepareView($view);

        // When dealing with selector, the view will search for a paramater named <param_name>Datasource
        $view['MyValuesDatasource'] = $this->readMyValuesNameDatasource($view);
    }


    // Execute actions when saving parameters
    protected function onParametersSaved($changes)
    {
        // Signal nethserver-ejabberd-save event after saving props to db
        $this->getPlatform()->signalEvent('nethserver-myserver-save@post-process');
    }


    private function readMyValuesDatasource($view)
    {
        $res = array();

        foreach ($this->getPlatform()->getDatabase('accounts')->getAll('pseudonym') as $key => $prop) {
            $res[] = array($key, $view->translate($key));
        }

        return $res;
    }

}


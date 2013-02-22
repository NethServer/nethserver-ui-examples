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
        // Bind 'status' view parameter to 'status' prop in myserver key of configuration db
        $this->declareParameter('status', Validate::SERVICESTATUS, array('configuration', 'myserver', 'status'));
    }

    // Execute actions when saving parameters
    protected function onParametersSaved($changes)
    {
        // Signal nethserver-ejabberd-save event after saving props to db
        $this->getPlatform()->signalEvent('nethserver-myserver-save@post-process');
    }

}


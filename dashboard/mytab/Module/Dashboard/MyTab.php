<?php
namespace NethServer\Module\Dashboard;

class MyTab extends \Nethgui\Controller\AbstractController
{

    public $sortId = 40;

    private $data = "";

    private function readData()
    {
        return "My custom tab data";
    }

    public function process()
    {
        $this->data = $this->readData();
    }

    public function prepareView(\Nethgui\View\ViewInterface $view)
    {
        if (!$this->data) {
            $this->data = $this->readData();
        }
        $view['data'] = $this->data;
    }
}

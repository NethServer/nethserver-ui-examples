<?php
namespace NethServer\Module\Dashboard\SystemStatus;

class MyResource extends \Nethgui\Controller\AbstractController
{

    public $sortId = 50;
 
    private $res = "";

    private function readMyResource()
    {
        if (file_exists("/proc/cpuinfo")) {
            return trim(file_get_contents("/proc/cpuinfo"));
        }
        return "";
    }

    public function process()
    {
        $this->res = $this->readMyResource();
    }
 
    public function prepareView(\Nethgui\View\ViewInterface $view)
    {
        if (!$this->res) {
            $this->res = $this->readMyResource();
        }

        $view['res'] = $this->res;
    }

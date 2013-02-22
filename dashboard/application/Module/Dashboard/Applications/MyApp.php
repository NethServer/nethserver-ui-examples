class MyApp extends \Nethgui\Module\AbstractModule implements \NethServer\Module\Dashboard\Interfaces\ApplicationInterface
{

    public function getName()
    {
        return "MyApp";
    }

    public function getInfo() 
    {
         $app = $this->getPlatform()->getDatabase('configuration')->getKey('myapp');
         $hostname = $this->getPlatform()->getDatabase('configuration')->getType('SystemName');
         $domain = $this->getPlatform()->getDatabase('configuration')->getType('DomainName');
         return array(
            'url' => "http://$hostname.$domain/".$cweb['alias'],
         );
    } 
}


<?php 



class Milil{

    public function __construct()
    {
        $this->init();
    }

    private function init()
    {
        $this->includeAssets();

        $this->includeShortCodes();
    }

    public function includeAssets()
    {
        include_once 'scripts.php';
    }


    public function includeShortCodes()
    {
        $shortCodeFiles = scandir(getcwd().DIRECTORY_SEPARATOR.'shortcodes');

        die($shortCodeFiles);

        foreach($shortCodeFiles as $file){
            if(!is_dir($file)){
                require_once $file;
            }
            
        }
    }



}
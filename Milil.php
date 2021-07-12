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
        require_once 'scripts.php';
    }


    public function includeShortCodes()
    {
        $shortCodeFiles = scandir(__DIR__.DIRECTORY_SEPARATOR.'shortcodes');

        foreach($shortCodeFiles as $file){
            if(!is_dir(__DIR__.DIRECTORY_SEPARATOR.'shortcodes/'.$file)){
                require_once 'shortcodes'.DIRECTORY_SEPARATOR.$file;
            }
            
        }
    }



}
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

    private function includeAssets()
    {
        $this->jsFilesHookInit();
    }


    private function includeShortCodes()
    {
        $shortCodeFiles = scandir(__DIR__.DIRECTORY_SEPARATOR.'shortcodes');

        foreach($shortCodeFiles as $file){
            if(!is_dir(__DIR__.DIRECTORY_SEPARATOR.'shortcodes/'.$file)){
                require_once 'shortcodes'.DIRECTORY_SEPARATOR.$file;
            }
            
        }
    }


    private function jsFilesHookInit()
    {
        add_action('wp_footer', [$this, 'jsScripts']);
    }

    public function jsScripts()
    {
        $shortCodeFiles = scandir(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'js');
        foreach($shortCodeFiles as $file){
            if(!is_dir(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'js'.$file)){
                echo '<script src="' . get_template_directory_uri() . '/milil/assets/js/'.$file.'"></script>';
            }
            
        }
    }



}
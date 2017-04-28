<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Generate extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        if( ! is_cli())
        {
            echo 'Hanya boleh diakses lewat CLI', "\n";
            return false;
        }
    }

    //build controller
    public function module($path = '', $type = '')
    {
        if (empty($path))
        {
            echo 'Silahkan tambahkan parameter path!', "\n";
            echo 'Contoh foo_bar_bas untuk foo/bar/bash.php', "\n";
            return false;
        }

        if(empty($type))
        {
            echo 'Silahkan pilih jenis module!', "\n";
            echo 'Pilihan yang ada f: general-form, m: multipart-form, t: table-2-column', "\n";
            return false;

        }
            
        $configPath = APPPATH .'config/';
        $paths = explode('_', strtolower($path));
        foreach($paths as $k=>$p)
        {
            if($k < count($paths)-1)
            {
                $configPath .= $p .'/';
                if(!file_exists($configPath))
                {
                    mkdir($configPath, 0775, true );
                    echo $configPath, " telah dibuat. \n";
                }
                else
                {
                   echo $configPath, " telah ada. \n";
                }
            }
            else
            {
                $configPath .= $p.'.php';
            }
        }

        $template = APPPATH . 'template/controller.tpl';
        $file = fopen($template, "r");
        $code = fread($file, filesize($template));
        fclose($file);
            
        $code = str_replace('**controller**', ucfirst($paths[0]), $code);

        $controller = APPPATH .'controllers/'. ucfirst($paths[0]) .'.php';

        if(! file_exists($controller))
        {
            $ftarget = fopen($controller, "w");
            fwrite($ftarget, html_entity_decode($code));
            fclose($ftarget);
            echo $configPath, " telah dibuat. \n";
        }
        else
        {
            echo $configPath, " telah ada. \n";   
        }
            
        $file = [
            'f' => 'Form',
            'm' => 'Upload',
            't' => '2Column',
        ];

        $template = APPPATH . 'template/config'.$file[$type].'.tpl';
        $file = fopen($template, "r");
        $code = fread($file, filesize($template));
        fclose($file);

        $code = str_replace('**actor**', $paths[0], $code);
        $code = str_replace('**object**', $paths[count($paths)-1], $code);

        if(! file_exists($configPath))
        {
            $ftarget = fopen($configPath, "w");
            fwrite($ftarget, html_entity_decode($code));
            fclose($ftarget);
            echo $configPath, " telah dibuat. \n";
        }
        else
        {
            echo $configPath, " telah ada. \n";   
        }
    }

}
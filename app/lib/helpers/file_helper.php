<?php
class FileHelper{
    private $path;
    public function __construct($path){
        $this->path = $path;
    }
    public function getId(){
        global $config;
        $file_name = $config['LIB_PATH'] . 'helpers' . DS . $this->path . '.txt' ;
        if (!file_exists($file_name))
        {
            touch($file_name);
            $handle = fopen($file_name, 'r+');
            $id = 0;
        }
        else
        {
            $handle = fopen($file_name, 'r+');
            $id = fread($handle, filesize($file_name));
            settype($id, "integer");
        }
        rewind($handle);
        fwrite($handle, ++$id);

        fclose($handle);
        return $id;
    }
}
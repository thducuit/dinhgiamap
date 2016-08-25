<?php
namespace Ducnguyen\CenValue\UploadZip;

class UploadZip 
{
    //private $extensions = array();
    private $uploadFolderName = 'upload';
    
    
    public function __construct()
    {
        
    }
    
    public function setUploadFolderName($name)
    {
        $this->$uploadFolderName = $name;
        return $this;
    }
    
    private function validate()
    {
        
    }
    
    private function getExtension($file)
    {
        return pathinfo($file, PATHINFO_EXTENSION);
    }
    
    private function upload()
    {
        
    }
    
    private function setUploadPath()
    {
        
    }
    
    private function isExistedFile()
    {
        
    }
}
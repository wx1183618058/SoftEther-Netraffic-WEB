<?php 
class F{
public $filename;

function __construct($filename){
	if(is_dir($filename)){
		$this->filename = $filename;
	}
}

function listDir($dir = null)
{
$dir = $dir == null ? $this->filename : $dir;
  if(is_dir($dir))
  {
      if ($dh = opendir($dir))
      {
          while (($file = readdir($dh)) !== false)
          {
               if($file!="." && $file!=".."){
				   $a[] = $file;
			   }
          }
          closedir($dh);
      }
   }
   return $a;
}
function listDirAll($dir = null)
{
$dir = $dir == null ? $this->filename : $dir;
  if(is_dir($dir))
  {
      if ($dh = opendir($dir))
      {
          while (($file = readdir($dh)) !== false)
          {
              if((is_dir($dir."/".$file)) && $file!="." && $file!="..")
              {
               //   echo "<b><font color='red'>文件名：</font></b>",$file,"<br><hr>";
                  $this->listDir($dir."/".$file."/");
              }
              else
              {
                  if($file!="." && $file!="..")
                  {
                      echo $file."<br>";
                  }
              }
          }
          closedir($dh);
      }
    }
	}
}
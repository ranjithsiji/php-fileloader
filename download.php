<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">
        <title>File Loader - Server to Server File Transfer</title>
        <link rel="stylesheet" media="screen" href="error.css" />
        <link rel="shortcut icon" href="img/boxkb.png"  />
    </head>
    <body>
        <table width="100%" height="100%" cellpadding="30">
            <tr>
                <td align="center" valign="center">
                    <img src="img/boxkb.png" alt="File Loader" />
                    <h1>PHP File Loader</h1>
                    <p>Script to transfer files from one server to anoter server using php.</p>
                    <table align="center" width="900">
                        <tr>
                            <td colspan="3">
                                <h2>Message from Server</h2>
                            </td>
                        </tr>
                        <tr>
                            <td>
<?php
$setp = true;
$folder = "ds";
$execute ='FlyingBox';
if (isset($_POST['xfer'])){ if ($_POST['xfer'] === 'xferok') {  // Transload files if command is present
    if($_POST['execute'] === $execute){
        if ($_POST['from'] == "")  {// Blank source url        
            print '<h3 align="center" class="red">Cannot Copy File.</h3><p align="center">You forgot to enter the link to the file you want to download. <a href="index.php">Try Again.</a></p>';
        }
        else
        {
            
            $from = $_POST['from'];
            
            if ($_POST['to'] === "")
            {
               $to = basename("$from");
            }
            else $to = $_POST['to'];
            
            $down = "$folder/$to";
            
            $method = $_POST['method'];
            
            if($method="copy"){
                if (!copy($_POST['from'],$down))
                {
                   echo '<h3 align="center" class="red">Failed to transload file.</h3><p>An error occured to copy the file to the deisred destination. <a href="index.php">Try Again.</a></p>';
                }            
            }
            elseif($method="curl"){
    
               $ch = curl_init(); 
               curl_setopt($ch, CURLOPT_URL, $_POST['from']); 
               curl_setopt ($ch, CURLOPT_HEADER, 0);    
               curl_setopt($ch, CURLOPT_BINARYTRANSFER, true); 
               curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
               curl_setopt($ch, CURLOPT_TIMEOUT, 3000);  
               $result =base64_encode(curl_exec ($ch)); 
               curl_close ($ch); 
               
               $handle = fopen($down, 'w+');
               fwrite($handle, $result); 
               fclose($handle);            
                
            }elseif($method="fget"){
                @$file = fopen ($_POST[from], "rb");
                $fc = fopen($down, "wb"); 
                while (!feof ($file)) { 
                   $line = fread ($file, 1028); 
                   fwrite($fc,$line); 
                } 
                fclose($fc);
            }
    
            $size = round((filesize("$down")/(1024 * 1024)), 3);
       
        ?>
        <center>
    <table border="0" cellspacing="1" width="880" cellpadding="5" class="success">
        <tr>
            <td>
                <h3 class="green"> Files copied to server successfully.</h3>
                <p>File Copied From :<?php echo $from; ?></p>
                <hr/>
                <p>File Copied To :  <a target="_blank" href="<?php echo $down; ?>"><?php echo $to; ?> </b>(<?php echo $size; ?> MB)</a></p>
            </td>
        </tr>
    </table>
    </center>
        <?php
         }
    }else{
        print '<p align="center" class="red">Incorrect password.</p>';
    }
}}
?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <h2>About PHP File Uploader</h2>
                                <p>PHP File Uploader is a very small php script to transfer files from a remote location to the script hosted server. This script uses PHP copy, PHP Curl, PHP Fget Methodes. This script helps to transfer files from various remote locations to a server easly. A very small utility to copy files easly.</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="logo">
                                    <a href="http://www.smashingweb.info/">&copy; <?php echo date('Y'); ?> Smashing Web</a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
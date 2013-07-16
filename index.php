<?php
$setp = true;
$getp=$_POST['execute'];
$execute ='FlyingBox';
?>

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
                    <img src="img/files.png" alt="File Loader" />
                    <h1>PHP File Loader</h1>
                    <p>Script to transfer files from one server to anoter server using php.</p>
                    <table align="center" width="900">
                        <tr>
                            <td colspan="3">
                                <h2>Enter File and Server Details</h2>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <ul>
                                    <li>Enter the url you want to download the file from first.</li>
                                    <li>Fill up the second field for custom filename (optional)</li>
                                    <li>Select a Method for transfer</li>
                                </ul>
                            </td>
                            <td width="4%">
                            </td>
                            <td align="left" valign="middle">
                                <?php if (isset($getp)) {
                                    if ($getp === $execute) { 
                                    
                                    ?>
                                <form action="download.php" method="post" >
                                <input type="hidden" name="execute" value="<?php echo $getp; ?>" />
                                <input type="hidden" name="xfer" value="xferok" />
                                <label for="from">From (http://):</label>
                                <input type="text" class="inputBox" name='from' size=58><br/>
                                    <label for="to">To (filename):</label>
                                    <input type="text" name='to' class="inputBox" size=58><br/>
                                        <label for="method">Method :</label>
                                        <select name="method" class="selectBox">
                                            <option value="copy">PHPCopy</option>
                                            <option value="curl">PHP Curl</option>
                                            <option value="fget">PHP Fget</option>
                                        </select>
                                <div id="bigCallsToAction">
                                    <span class="bigCallsToAction-item">
                                        <input type="submit" class="btn" value="Start Copy">
                                    </span>
                                </div>
                                </form>
                             <?php } else { ?>
                                <p class="err">The Password is incorrect. <br/> The script cannot be executed.</p>
                             <?php 
                             }
                                
                             } else { ?>
                                <form action="index.php" method="post" >
                                    <p>Password required to Execute the Script</p>
                                    <label for="to">Password to Open:</label>
                                    <input type="password" name='execute' class="inputBox" size=58><br/>
                                        <input type="submit" class="btn" value="Start Script">
                                </form>
                             
                             <?php } ?>
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

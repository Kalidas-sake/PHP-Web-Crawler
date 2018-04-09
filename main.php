<?php
$page = file_get_contents('yourweburl.com/search_query');

$dom = new DOMDocument;

libxml_use_internal_errors(true); #for ignoring warnings due to un-organized html code 
@$dom->loadHTML($page);
libxml_clear_errors();

$links = $dom->getElementsByTagName('a'); #getting array of all link elements with tag 'a'
foreach ($links as $link){
    if ($link->getAttribute('class')==='className') {
    	#this condition separates links that contains info about search results

    	if(!preg_match('/adredir?/', $link->getAttribute('href'))) {
    		#this condition ignores advertise links from search result and gets only required result
			echo $link->nodeValue .'<br>';
    	}
    }
}
?>

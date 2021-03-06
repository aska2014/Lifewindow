<html>
<head>
	<title></title>
</head>
<body>

<ul>
<?php
//function to retrieve posts from facebook’s server
function loadFB($fbID){
    $url="http://graph.facebook.com/".$fbID."/feed?limit=3";
    //load and setup CURL
     $c = curl_init($url);
     curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    //get data from facebook and decode JSON
     $page = json_decode(curl_exec($c));
    //close the connection
     curl_close($c);

     var_dump($page);
     exit();
    //return the data as an object
     return $page->data;
}

/* Change These Values */
// Your Facebook ID
 $fbid = "277738978965645";
// How many posts to show?
 $fbLimit = 10;
// Your Timezone
date_default_timezone_set("America/Chicago");

/* Dont Change */
// Variable used to count how many we’ve loaded
 $fbCount = 0;
// Call the function and get the posts from facebook
 $myPosts = loadFB($fbid);


//loop through all the posts we got from facebook
foreach($myPosts as $dPost){
    //only show posts that are posted by the page admin
    if($dPost->from->id==$fbid){
        //get the post date / time and convert to unix time
         $dTime = strtotime($dPost->created_time);
        //format the date / time into something human readable
        //if you want it formatted differently look up the php date function
         $myTime=date("M d Y h:ia",$dTime);
        ?>
        <ul>
            <li><?php echo($dPost->message) . $myTime; ?></li>
        </ul>
        <?php
        //increment counter
         $fbCount++;
        //if we’ve outputted the number set above in fblimit we’re done
         if($fbCount >= $fbLimit) break;
    }
}
?>
</ul>


</body>
</html>
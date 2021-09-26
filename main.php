<?php
// usage main.php?c=0-9-129 
$input = $_GET["c"];
if (!$input){
   exit("Channel ID not found");
}
$channel_meta = JsonfromURI("https://catalogapi.zee5.com/v1/channel/${input}");
$stream_url = $channel_meta->stream_url_hls;
$tok_json = JsonfromURI("https://useraction.zee5.com/token/live.php");
$video_token = $tok_json->video_token;
$m3u8 = $stream_url.$video_token;
echo $m3u8;

function JsonfromURI($url) {
   $resp = file_get_contents($url);       
   return json_decode($resp);
};


/*
ALSO REFER https://github.com/avipatilpro


*/

<?php
include("phpqrcode/intechost.php");
include("get.php");
if ($lastSegment === 'Thanks.php') {
    array_pop($uriSegments);
    $uri = implode('/', $uriSegments) . '/index.php';
}
$currentUrl2 = "$protocol://$host/$uri";
$WebHookUrl = "https://api.telegram.org/bot$BotToken/setWebhook?url=$currentUrl2";
$ch = curl_init($WebHookUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="broadcast/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css">
    <title>Installation Form</title>
</head>
<body><div class="glass-container">
        <script type="text/javascript">document.write(unescape('%3c%68%32%20%73%74%79%6c%65%3d%22%74%65%78%74%2d%61%6c%69%67%6e%3a%63%65%6e%74%65%72%3b%22%3e%49%6e%73%74%61%6c%6c%61%74%69%6f%6e%20%49%4e%44%4f%20%49%47%20%42%6f%74%3c%2f%68%32%3e%0d%0a%3c%68%32%3e%42%79%20%3c%61%20%68%72%65%66%3d%22%68%74%74%70%73%3a%2f%2f%77%77%77%2e%69%6e%74%65%63%68%6f%73%74%2e%69%6e%2f%22%20%74%61%72%67%65%74%3d%22%5f%62%6c%61%6e%6b%22%3e%77%77%77%2e%49%6e%74%65%63%48%6f%73%74%2e%69%6e%3c%2f%61%3e%3c%2f%68%32%3e'));</script>
        <h2>
            Your Installation has been done!<br><br><img src="broadcast/smiling.svg" style="width:92px;">
            <?php
            include("get.php");
            if ($lastSegment === 'Thanks.php') {
                array_pop($uriSegments);
                $uri = implode('/', $uriSegments) . '/broadcast';
                }
                $IntecHostBroadCast = "$protocol://$host/$uri";
            include("get.php");
            if ($lastSegment === 'Thanks.php') {
                array_pop($uriSegments);
                $uri = implode('/', $uriSegments) . '/users.php';
                }
                $IntecHostUsersURL = "$protocol://$host/$uri";
            ?>
            <h2>Your Broadcast URL</h2>
            <h3><a target="_blank" href="<?php echo $IntecHostBroadCast; ?>"><?php echo $IntecHostBroadCast; ?></a></h3>
            <h2>Your Users URL</h2>
            <h3><a target="_blank" href="<?php echo $IntecHostUsersURL; ?>"><?php echo $IntecHostUsersURL; ?></a></h3>
            <hr style="border:none;height:2px;background-color:black;">
            <p style="font-size:20px;text-align:center;">
                Now Close This Page and open bot in Telegram everything is working no need to put Web Hook already Done
            </p>
        </h2>
</div>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $Serverhost = $_POST["Serverhost"];
    $Serverusername = $_POST["Serverusername"];
    $Serverpassword = $_POST["Serverpassword"];
    $Serverdatabase = $_POST["Serverdatabase"];
    $BotToken = $_POST["BotToken"];
    $adminId = $_POST["adminId"];
    $channelUsername = $_POST["channelUsername"];
    $adminContact = $_POST["adminContact"];
    $PayTmMerchentId = $_POST["PayTmMerchentId"];
    $PayTmMerchentKey = $_POST["PayTmMerchentKey"];
    $PayTmupiId = $_POST["PayTmupiId"];

    // Update intechost.php
    $intechostCode = "
    <?php
    //Do NOT EDIT HERE ANYTHING
    // Database Details <-- IntecHost.in
    \$Serverhost = \"$Serverhost\";
    \$Serverusername = \"$Serverusername\";
    \$Serverpassword = \"$Serverpassword\";
    \$Serverdatabase = \"$Serverdatabase\";
    // Bot Details <-- IntecHost.in
    \$BotToken = \"$BotToken\";
    \$adminId = \"$adminId\";
    \$channelUsername = \"$channelUsername\";
    \$adminContact = \"$adminContact\";
    \$PayTmMerchentId = \"$PayTmMerchentId\";
    \$PayTmMerchentKey = \"$PayTmMerchentKey\";
    \$PayTmupiId = \"$PayTmupiId\";
    ?>
    ";

    file_put_contents('phpqrcode/intechost.php', $intechostCode);

    // Import database.sql file
    $sqlFile = 'database.sql';
    $command = "mysql -u$Serverusername -p$Serverpassword -h$Serverhost $Serverdatabase < $sqlFile";
    exec($command, $output, $return_var);

    if ($return_var === 0) {
    header("Location: Thanks.php");
    exit;
    } else {
    echo "Installation failed. Please check your database details and try again.";
    }
    } else {
    header("Location: install.php");
}
?>

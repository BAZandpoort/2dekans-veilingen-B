<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once DATABASE . '/connect.php';
require_once LIB . '/util/util.php';


$userssid = $_SESSION['user']['id'];

$outgoing_id = $userssid;
$sql = mysqli_query($connection, "SELECT * FROM users,user_profile
WHERE users.id=user_profile.userid");
$output = "";

if (mysqli_num_rows($sql) == 1)
{
    $output .= "No users available to chat"; 
} elseif (mysqli_num_rows($sql) > 0)
{
    while ($row = mysqli_fetch_assoc($sql)) {
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['userid']} OR outgoing_msg_id = {$row['userid']}) 
                AND (outgoing_msg_id = {$outgoing_id} OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($connection, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        if (mysqli_num_rows($query2) > 0) {
            $result = $row2['msg'];
        } else {
            $result = "No message available";
        }
        (strlen($result) > 28) ? $msg = substr($result, 0, 28).'...' : $msg = $result;

        $output .= '<a href="/chats/chat?userid=' . $row['userid'] . '">
                        <div class="content">
                            <img src="' . $row['profilePictureUrl'] . '">
                            <div class="details">
                            <span>' . $row['firstname'] . " " . $row['lastname'] .'</span>
                            <p>'. $msg .'</p>
                        </div>
                        </div>
                        <div class="status-dot"><i class="fas fa-circle"></i></div>
                    </a>';
    }
}
echo $output;
?>
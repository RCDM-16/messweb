<?php
session_start();
if (isset($_SESSION['id_diff'])) {
    include_once "config.php";
    $outgoing_id = $_SESSION['id_diff'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $output = "";
    $sql = "SELECT * FROM messages LEFT JOIN users ON users.id_diff = messages.id_msg_out
                WHERE (id_msg_out = {$outgoing_id} AND id_msg_in = {$incoming_id})
                OR (id_msg_out = {$incoming_id} AND id_msg_in = {$outgoing_id}) ORDER BY id_msg";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            if ($row['id_msg_out'] === $outgoing_id) {
                $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>' . $row['message'] . '</p>
                                </div>
                                </div>';
            } else {
                $output .= '<div class="chat incoming">
                                <img src="php/images/' . $row['img_profile'] . '" alt="">
                                <div class="details">
                                    <p>' . $row['message'] . '</p>
                                </div>
                                </div>';
            }
        }
    } else {
        $output .= '<div class="text">No hay mensajes disponibles. Una vez que envíe el mensaje, aparecerán aquí.</div>';
    }
    echo $output;
} else {
    header("location: ../login.php");
}

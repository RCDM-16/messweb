<?php
while ($row = mysqli_fetch_assoc($query)) {
    $sql2 = "SELECT * FROM messages WHERE (id_msg_in = {$row['id_diff']}
                OR id_msg_out = {$row['id_diff']}) AND (id_msg_out = {$outgoing_id} 
                OR id_msg_in = {$outgoing_id}) ORDER BY id_msg DESC LIMIT 1";
    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    (mysqli_num_rows($query2) > 0) ? $result = $row2['message'] : $result = "No hay mensajes disponibles";
    (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
    if (isset($row2['id_msg_out'])) {
        ($outgoing_id == $row2['id_msg_out']) ? $you = "Tu: " : $you = "";
    } else {
        $you = "";
    }
    ($row['st'] == "Fuera de Línea") ? $offline = "offline" : $offline = "";
    ($outgoing_id == $row['id_diff']) ? $hid_me = "hide" : $hid_me = "";

    $output .= '<a href="chat.php?id_user=' . $row['id_diff'] . '">
                    <div class="content">
                    <img src="php/images/' . $row['img_profile'] . '" alt="">
                    <div class="details">
                        <span>' . $row['n_user'] . " " . $row['l_user'] . '</span>
                        <p>' . $you . $msg . '</p>
                    </div>
                    </div>
                    <div class="status-dot ' . $offline . '"><i class="fas fa-circle"></i></div>
                </a>';
}

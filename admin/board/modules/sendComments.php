<?php
//подключаем базу даних
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
    /*=====    Отправка сообщений выбраномкпользователю ===========================*/
    // echo "<h2>Вы пытаетесь отправить коментарий!</h2>";
    // echo "<h2>";
    // echo $_POST["board_id"];
    // echo "</h2>";
    // echo "<h2>";
    // echo $_POST["card_id"];
    // echo "</h2>";
    // echo "<h2>";
    // echo $_POST["task_id"];
    // echo "</h2>";
    // echo "<h2>";
    // echo $_POST["user_id"];
    // echo "</h2>";
    // echo "<h2>";
    // echo $_POST["comment"];
    // echo "</h2>";

    //  Проверяем есть ли коментарии и не пустое ли ополе коментария
    if(isset($_POST["comment"]) && $_POST["comment"] != "") {

        $sql_comments = "INSERT INTO board_comments (task_id, developer_id, comment) VALUES ('" . $_POST["task_id"] . "', '" . $_POST["user_id"] ."', '" . $_POST["comment"] ."' )";
        $connect->query($sql_comments);
        // if(mysqli_query($connect, $sql_comments)) {
        //     echo "<h2>Выдобавили коментарий!</h2>";
        //     include "../modules/listComments.php";
        // } else {
        //     echo "<h2>произошла ошибка!!!</h2>" . mysqli_error($connect);
        // }
    }
    // /*==========================================================================*/

    $task_id = $_POST["task_id"];
    include $_SERVER['DOCUMENT_ROOT'] . "/admin/board/modules/listComments.php";

?>

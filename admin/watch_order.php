<?php
// Подключаем базу даних.
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";

?>

<?php


$sql = "SELECT * FROM orders where id =" . $_GET['id'];
$result = $connect->query($sql);
$row = mysqli_fetch_assoc($result);
$order_servise = $row['service'];

//echo $order_servise;
if (isset($_POST))
{
    //echo $order_servise;
    /// Создаем доску в таблице boards и добавляем связь пользователя с таблицей в board_users
        $sql = "SELECT * FROM boards WHERE order_id=" . $_GET['id'];

        if (!mysqli_fetch_assoc($connect->query($sql))) {

            $sql_boards = "INSERT INTO `boards` (order_id, order_servise) VALUES ('" . $_GET['id'] . "', '" . $order_servise . "');";
            mysqli_query($connect, $sql_boards);
            $sql_m = "SELECT * FROM `boards` WHERE `order_id` = " . $_GET['id'] . " ORDER BY `id` DESC";
            $boards = mysqli_fetch_assoc($connect->query($sql_m));
            $boards["id"];
            // $sql = "INSERT INTO `board_developers` (`board_id`, `user_id`, `access`) VALUES ('" . $boards["id"] . "', '" . $_COOKIE["user_id"] ."', '3');";
            // $connect->query($sql);
        }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/head.php" ?>
</head>

<body id="page-top">
<div id="wrapper">
    <!-- Sidebar -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/nav.php" ?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <!-- TopBar -->
            <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <?php include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/top-bar.php" ?>
            </nav>
            <!-- Topbar -->
            <!-- <form method="POST"> -->
            <form action="/admin/board/board.php?order=<?php echo $_GET["id"]; ?>" method="POST">
                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <!-- Row -->
                    <div class="row">
                        <!-- DataTable with Hover -->
                        <div id="" class="col-lg-12">
                            <div class="card mb-4 text-center">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Подробности заказа</h6>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table">
                                      <thead>
                                        <tr>
                                            <th scope="col">№</th>
                                            <th scope="col">Технология</th>
                                            <th scope="col">Категории</th>
                                            <th scope="col">Цена</th>
                                            <td scope="col">Статус заказа</td>
                                        </tr>
                                      </thead>

                                            <tbody>
                                                <tr>
                                                    <?php
                                                    $sql = "SELECT * FROM orders where id =" . $_GET['id'];
                                                        $result = $connect->query($sql);
                                                        $row = mysqli_fetch_assoc($result);
                                                        // $order_servise = $row['service'];
                                                            $basket = json_decode($row['service'], true);

                                                                for ($i = 0; $i < count($basket['basket']); $i++) {
                                                                    $sql = "SELECT * FROM services WHERE id =" . $basket['basket'][$i]['service_id'];
                                                                    $resultCategories = mysqli_query($connect, $sql);
                                                                    $service = mysqli_fetch_assoc($resultCategories);
                                                                ?> 
                                                                        <tr>
                                                                            <td><?php echo $service['id']; ?></td>
                                                                            <td><?php echo $service['title']; ?></td>

                                                                            <!-- Вывод категорий товара -->
                                                                            <td>...</td>

                                                                            <!-- Расчет стоимости заказа -->
                                                                            <input id="start_price<?php echo $service['id'];?>" type="hidden" name="start_prise" value="<?php echo $service['cost'];?>" >

                                                                            <td class="price" id="cost<?php echo $service['id'];?>" data-sum="<?php echo ($service['cost'] * $basket['basket'][$i]['count']);?>"><?php echo ($service['cost'] * $basket['basket'][$i]['count']);?> $</td>


                                                                            <td>
                                                                                <div id="status<?php echo $row['id']; ?>">

                                                                                    <?php
                                                                                    if($row['status'] == 0) {
                                                                                        ?>
                                                                                        <div class="btn btn-danger" onclick="statusNew(<?php echo $row['id']; ?>)">Новый</div>
                                                                                    <?php 
                                                                                    }

                                                                                    if($row['status'] == 1) {
                                                                                        ?>
                                                                                        <div class="btn btn btn-success" onclick="statusSend(<?php echo $row['id']; ?>)">Отправлено</div>
                                                                                    <?php
                                                                                    }
                                                                                    ?>

                                                                                </div>
                                                                            </td>
                                                                            

                                                                        </tr>
                                                                <?php
                                                                }
                                                                ?>
                                            </tbody>
                                        </table>

                                </div>
                            </div>
                        </div>
                        <!--Row-->
                    </div>
                    <!---Container Fluid-->
                </div>
                <button class="btn__progress">Прогресс</button>
            </form>

    </div>
    </div>
</div>



    <!-- Footer -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/footer.php" ?>
    <!-- Footer -->

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="assets/js/changeStatus.js"></script>
<script src="assets/js/main.js"></script>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/scripts.php"

?>
</body>

</html>

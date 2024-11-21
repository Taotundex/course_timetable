<?php
    session_start();
    include "connect.php";

    $msg="";
    if(isset($_POST['login'])) {
        $matric_no = $_POST["matric_no"];
        $password = $_POST["password"];

        if($matric_no == "123456" && $password == "admin"){
            $_SESSION["matric_no"] = $matric_no;
            $_SESSION["password"] = $password;
            header("location: admin/index.php");
        }
        else{
            $result = mysqli_query($conn, "SELECT * FROM `students` WHERE `matric_no`='$matric_no' AND `password`='$password'");
            if((mysqli_num_rows($result) > 0)) {
                    $user = mysqli_fetch_assoc($result);
                    $_SESSION['matric_no'] = $user['matric_no'];
                    $_SESSION['password'] = $user['password'];
                    header("location: dashboard.php");
            }
            else{
                $msg = "<center class='text-[red] font-medium'>Invalid matric number or password.</center>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timetable Allocation</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body>
    <div class="account flex items-center justify-center w-full h-[100vh]">
        <div class="container lg:w-[500px] md:w-[500px] w-[90%] bg-[#e4e4e4] rounded-[10px] border-[3px] border-[#000061bb] p-[35px]">
            <form action="" method="post" class="flex flex-col gap-3 text-[#000061]">
                <h1 class="font-[900] text-[50px] text-[#000061]">LOGIN</h1>
                <div class="form-group flex flex-col gap-1">
                    <label class="font-[500]" for="matric_no">Matric Number:</label>
                    <input class="w-full h-[45px] px-4 rounded-[5px] border bg-[#0000611c] border-[#00006180] focus:bg-[#e4e4e4] focus:border-0 focus:border-[#00006180]" type="number" id="matric_no" placeholder="123456" name="matric_no" required>
                </div>
                <div class="form-group flex flex-col gap-1">
                    <label class="font-[500]" for="password">Password:</label>
                    <input class="w-full h-[45px] px-4 rounded-[5px] border bg-[#0000611c] border-[#00006180] focus:bg-[#e4e4e4] focus:border-0 focus:border-[#00006180]" type="password" id="password" placeholder="* * * * * * * *" name="password" required>
                </div>
                <?php echo $msg;?>
                <button class="w-full h-[45px] rounded-[5px] bg-[#000061] text-[#e4e4e4]" type="submit" name="login">LOGIN</button>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>
<?php
    include "../connect.php";

    $msg = "";
    if(isset($_POST["add_student"])){
        $student_name = $_POST["student_name"];
        $matric_no = $_POST["matric_no"];
        $password = $_POST["password"];
        $datetime = date("jS M, Y - h:i:sa");

        $query = "SELECT * FROM `students` WHERE `matric_no` = '$matric_no'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $msg = "<center class='text-[red] font-medium'>Student already exists. Please add a new student.</center>";
        } 
        else {
            $insert = mysqli_query($conn, "INSERT INTO `students`(`student_name`, `matric_no`, `password`, `datetime`) VALUES ('$student_name', '$matric_no', '$password', '$datetime')");
            if ($insert == true){
                // header("location: dashboard.php");
                $msg = "<center class='text-[green] font-medium'>Student successfully added.</center>";
            }
            else {
                $msg = "<center class='text-[red] font-medium'>Error creating student account.</center>";
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
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body>
    <div class="dashboard grid grid-cols-5 bg-[#000061] gap-0">
        <?php
            include '../bars/admin-bars/sidebar.php';
        ?>
            <div class="body bg-[#e4e4e4] shadow-lg">
                <div class="lg:p-5 md:p-4 p-3 flex flex-col lg:gap-5 md:gap-4 gap-3 h-[86vh]">
                    <div class="top w-full text-[#000061] flex flex-col justify-center">
                        <h1 class="font-[900] lg:text-[36px] md:text-[30px] text-[24px]">Add Students.</h1>
                        <p class="lg:text-[16px] md:text-[14px] text-[12px]">Lorem ipsum dolor, sit amet pisicing elit. Laudantium perferendis, iste corrupti minima maxime.</p>
                    </div>
                    <div class="left">
                        <form class="lg:w-[450px] md:w-[450px] w-[95%] mx-auto my-5 flex flex-col gap-3 bg-[#0000610c] hover:scale-[102%] transition ease-in-out delay-150 p-[30px] rounded-[15px] border-2 border-[#00006130]" action="" method="post">
                            <h2 class="lg:text-[30px] md:text-[24px] text-[20px] text-[#000061] font-[900]">Create Student Account</h2>
                            <div class="form-control">
                                <label class="font-medium text-[#000061bb]" for="student_name">Student's Name:</label>
                                <input class="w-full h-[45px] rounded-[5px] bg-[#0000610c] focus:bg-[#e4e4e4bb]" type="text" name="student_name" id="student_name" placeholder="Fullname" required>
                            </div>
                            <div class="form-control">
                                <label class="font-medium text-[#000061bb]" for="matric_no">Matric Number:</label>
                                <input class="w-full h-[45px] rounded-[5px] bg-[#0000610c] focus:bg-[#e4e4e4bb]" type="number" name="matric_no" id="matric_no" placeholder="123456" required>
                            </div>
                            <div class="form-control">
                                <label class="font-medium text-[#000061bb]" for="password">Password:</label>
                                <input class="w-full h-[45px] rounded-[5px] bg-[#0000610c] focus:bg-[#e4e4e4bb]" type="password" name="password" id="password" placeholder="* * * * * * * *" required>
                            </div>
                            <?php echo $msg;?>
                            <button class="w-full h-[45px] border-0 bg-[#000061] text-[#e4e4e4] rounded-full" type="submit" name="add_student">Add Student</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        
        <?php
            include '../bars/admin-bars/offcanvas.php';
        ?>
    </div>


    <script>
        const currentPageId = "students";
        document.getElementById(currentPageId).classList.add("active");
    </script>
    <script src="../script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>
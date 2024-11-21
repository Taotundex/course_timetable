<?php
    session_start();
    include "../connect.php";
    
    $email = $_SESSION['email'];
    if (!isset($_SESSION['email'])) {
        header("Location: index.php");
        exit();
    }

    $select_lecturer = mysqli_query($conn, "SELECT * FROM `lecturers` WHERE `email`='$email'");
    $lecturer = mysqli_fetch_assoc($select_lecturer);

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
            include '../bars/lecturer-bars/sidebar.php';
        ?>
            <div class="body bg-[#e4e4e4] shadow-lg">
                <div class="lg:p-5 md:p-4 p-3 flex flex-col lg:gap-5 md:gap-4 gap-3">
                    <div class="top w-full text-[#e4e4e4] lg:h-[250px] md:h-[200px] h-[150px] flex flex-col justify-center bg-[#000061] rounded-[15px] px-[30px]">
                        <h1 class="font-[900] lg:text-[50px] md:text-[35px] text-[25px]">All <span class="uppercase">Students</span>!</h1>
                        <p class="lg:text-[16px] md:text-[14px] text-[12px]">List of all students in Computer Science...</p>
                    </div>
                    <div class="grid lg:grid-cols-2 md:grid-cols-2 grid-cols-2 lg:gap-5 md:gap-4 gap-3 flex items-start">
                        <?php
                            $all_student = mysqli_query($conn, "SELECT * FROM `students`");
                            while ($lect = mysqli_fetch_assoc($all_student)) {
                            ?>
                            <a href="#" class="flex flex-col items-center bg-[#000061] border border-[#000061] rounded-lg shadow md:flex-row">
                                <img class="object-cover w-full rounded-t-lg h-[150px] md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="../images/image-4.jpg" width="100%" alt="">
                                <div class="flex flex-col gap-3 justify-between p-4 leading-normal">
                                    <h2 class="lg:text-[30px] md:text-[20px] text-[12px] font-[700] text-[#e4e4e4bb] underline"><?php echo $lect['matric_no'] ?></h2>
                                    <div class="details">
                                        <h5 class="mb-2 lg:text-[24px] md:text-[20px] text-[16px] font-bold tracking-tight text-[#e4e4e4]"><?php echo $lect['student_name'] ?></h5>
                                        <p class="mb-3 font-normal text-[#e4e4e480] lg:text-[14px] md:text-[12px] text-[10px]"><?php echo $lect['email'] ?></p>
                                        <p class="mb-3 font-normal text-[#e4e4e480] lg:text-[12px] md:text-[10px] text-[8px]">Account Creation : <span><?php echo $lect['datetime'] ?></span></p>
                                    </div>
                                </div>
                            </a>
                            <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>



        <?php
            include '../bars/lecturer-bars/offcanvas.php';
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
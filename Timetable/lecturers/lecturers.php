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
                        <h1 class="font-[900] lg:text-[50px] md:text-[35px] text-[25px]">All <span class="uppercase">Lecturers</span>!</h1>
                        <p class="lg:text-[16px] md:text-[14px] text-[12px]">List of all Lecturers available in Computer Science...</p>
                    </div>
                    <div class="grid lg:grid-cols-3 md:grid-cols-3 grid-cols-2 lg:gap-5 md:gap-4 gap-3 flex items-start">
                        <?php
                            $all_lecturer = mysqli_query($conn, "SELECT * FROM `lecturers`");
                            while ($lect = mysqli_fetch_assoc($all_lecturer)) {
                            ?>
                            <div class="text-center w-full lg:p-5 md:p-4 p-3 bg-white border border-[#000061] rounded-lg shadow">
                                <div class="flex flex-col items-center">
                                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="../images/profile-picture-3.jpg" alt="Bonnie image"/>
                                    <h5 class="mb-1 lg:text-[20px] md:text-[18px] text-[16px] font-medium text-[#000061]"><?php echo $lect['lecturer_name'] ?></h5>
                                    <span class="lg:text-[14px] md:text-[12px] text-[10px] text-gray-500"><?php echo $lect['about'] ?></span>
                                    <div class="flex mt-4 md:mt-6">
                                        <a href="#" class="py-2 px-5 text-[12px] font-medium text-[#000061] focus:outline-none bg-white rounded-lg border border-[#000061] hover:bg-[#00006180] hover:text-[#e4e4e4] focus:z-10 focus:ring-4 focus:ring-[#e4e4e4]">CSC 323</a>
                                    </div>
                                </div>
                            </div>
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
        const currentPageId = "lecturers";
        document.getElementById(currentPageId).classList.add("active");
    </script>
    <script src="../script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>
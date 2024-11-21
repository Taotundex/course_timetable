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
                        <h1 class="font-[900] lg:text-[50px] md:text-[35px] text-[25px]"><span class="uppercase"><?php echo $lecturer['lecturer_name'];?></span>'s profile!</h1>
                        <p class="lg:text-[16px] md:text-[14px] text-[12px]">Update your profile below. Note, some profile cannot be editted...</p>
                    </div>
                    <div class="grid lg:grid-cols-2 md:grid-cols-2 grid-cols-1 lg:gap-5 md:gap-4 gap-3 flex items-start">
                        <div class="left">
                            <form action="" method="post" enctype="multipart/form-data" class="flex flex-col lg:p-[35px] md:p-[25px] gap-3 p-5 border-2 border-[#00006180] bg-[#0000611c] rounded-[15px]">
                                <div class="form-control flex flex-col gap-3">
                                    <label for="" class="text-[#000061] font-[700] lg:text-[30px] md:text-[25px] text-[20px]">Upload Profile Picture</label>
                                    <div class="inputs relative flex items-center justify-center">
                                        <input class="z-[10] opacity-[0.00001] relative w-[200px] h-[200px] rounded-[20px]" type="file" name="picture" id="picture" title="Upload Profile Picture" required>
                                        <div class="img absolute top-0">
                                            <img src="../images/profile-icon.png" width="100%" class="shadow-lg w-[200px] h-[200px] border-2 border-[#00006180] p-2 bg-[#e4e4e4bb] rounded-[20px]" alt="">
                                            <i class="shadow-lg bi bi-plus-circle-fill border-2 border-[#00006180] text-[25px] text-[#000061] w-[40px] h-[40px] flex items-center justify-center bg-[#e4e4e4bb] rounded-[5px] absolute"></i>
                                        </div>
                                    </div>
                                </div>
                                <button class="w-full h-[45px] border-0 bg-[#000061] text-[#e4e4e4] rounded-full mt-5" type="submit" name="update_picture">Update Picture</button>
                            </form>
                        </div>
                        <div class="right">
                            <form action="" method="post" class="flex flex-col lg:p-[35px] md:p-[25px] gap-3 p-5 border-2 border-[#00006180] bg-[#0000611c] rounded-[15px]">
                                <label for="" class="text-[#000061] font-[700] lg:text-[30px] md:text-[25px] text-[20px]">Update Profile Details</label>
                                <div class="form-control">
                                    <label for="name">Fullname:</label>
                                    <input class="w-full px-3 h-[45px] border-1 border-[#00006180] bg-[#e4e4e4bb] rounded-[5px] outline-0" type="text" name="name" id="name" placeholder="Your fullname">
                                </div>
                                <!-- <div class="grid grid-cols-2 gap-3"> -->
                                    <div class="form-control">
                                        <label for="email">Email Address:</label>
                                        <input class="w-full px-3 h-[45px] border-1 border-[#00006180] bg-[#e4e4e4bb] rounded-[5px] outline-0" type="email" name="email" id="email" placeholder="Your Email Address" readonly>
                                    </div>
                                    <!-- <div class="form-control">
                                        <label for="matric_number">Matric Number:</label>
                                        <input class="w-full px-3 h-[45px] border-1 border-[#00006180] bg-[#e4e4e4bb] rounded-[5px] outline-0" type="number" name="matric_number" id="matric_number" placeholder="Your matric number" readonly>
                                    </div> -->
                                <!-- </div> -->
                                <div class="form-control">
                                    <label for="password">Old Password:</label>
                                    <input class="w-full px-3 h-[45px] border-1 border-[#00006180] bg-[#e4e4e4bb] rounded-[5px] outline-0" type="password" name="password" id="password" placeholder="* * * * * * * *" readonly>
                                </div>
                                <div class="grid grid-cols-2 gap-3">
                                    <div class="form-control">
                                        <label for="password">New Password:</label>
                                        <input class="w-full px-3 h-[45px] border-1 border-[#00006180] bg-[#e4e4e4bb] rounded-[5px] outline-0" type="password" name="new_password" id="new_password" placeholder="* * * * * * * *">
                                    </div>
                                    <div class="form-control">
                                        <label for="password">Confirm New Password:</label>
                                        <input class="w-full px-3 h-[45px] border-1 border-[#00006180] bg-[#e4e4e4bb] rounded-[5px] outline-0" type="password" name="confirm_new_password" id="confirm_new_password" placeholder="* * * * * * * *">
                                    </div>
                                </div>
                                <button class="w-full h-[45px] border-0 bg-[#000061] text-[#e4e4e4] rounded-full" type="submit" name="update_profile">Update Profile</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
            include '../bars/lecturer-bars/offcanvas.php';
        ?>
    </div>


    <script>
        const currentPageId = "settings";
        document.getElementById(currentPageId).classList.add("active");
    </script>
    <script src="../script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>
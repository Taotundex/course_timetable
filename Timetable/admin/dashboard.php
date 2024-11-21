<?php
    session_start();
    include "../connect.php";
    
    $email = $_SESSION['email'];
    if (!isset($_SESSION['email'])) {
        header("Location: index.php");
        exit();
    }
    
    $select_signup = mysqli_query($conn, "SELECT * FROM `lecturers` WHERE `email`='$email'");
    $signup = mysqli_fetch_assoc($select_signup);

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
            <div class="body bg-[#e4e4e4] shadow-lg h-[100vh]">
                <div class="lg:p-5 md:p-4 p-3 flex flex-col lg:gap-5 md:gap-4 gap-3">
                    <div class="top w-full text-[#000061] flex flex-col justify-center">
                        <h1 class="font-[900] lg:text-[36px] md:text-[30px] text-[24px]">Allocate Courses to Lecturer.</h1>
                        <p class="lg:text-[16px] md:text-[14px] text-[12px]">Lorem ipsum dolor, sit amet pisicing elit. Laudantium perferendis, iste corrupti minima maxime.</p>
                    </div>
                    <div class="left">
                        <form class="lg:w-[450px] md:w-[450px] w-[95%] mx-auto my-5 flex flex-col gap-3 bg-[#0000610c] hover:scale-[102%] transition ease-in-out delay-150 p-[30px] rounded-[15px] border-2 border-[#00006130]" action="" method="post" enctype="multipart/form-data">
                            <div class="form-control">
                                <label class="font-medium text-[#000061bb] for="lecturer_name">Lecturer's Name:</label>
                                    <select name="course_code" id="course_code" class="w-full h-[45px] rounded-[5px] bg-[#0000610c] focus:bg-[#e4e4e4bb] px-2">
                                        <option value="" selected disabled>-- Select course --</option>
                                        <?php 
                                            $select = mysqli_query($conn, "SELECT * FROM `lecturers`");
                                            while ($lecturer = mysqli_fetch_assoc($select)) {
                                                ?>
                                                <option value="<?php echo $lecturer['lecturer_name'] ?>"><?php echo $lecturer['lecturer_name']?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                <!-- <input class="w-full h-[45px] rounded-[5px] bg-[#0000610c] focus:bg-[#e4e4e4bb]" type="text" name="lecturer_name" id="lecturer_name" placeholder="Fullname" required> -->
                            </div>
                            <div class="form-control">
                                <label class="font-medium text-[#000061bb] for="course_code">Course Code:</label>
                                <select name="course_code" id="course_code" class="w-full h-[45px] rounded-[5px] bg-[#0000610c] focus:bg-[#e4e4e4bb] px-2">
                                    <option value="" selected disabled>-- Select course --</option>
                                    <?php 
                                        $select = mysqli_query($conn, "SELECT * FROM `courses`");
                                        while ($course = mysqli_fetch_assoc($select)) {
                                            ?>
                                            <option value="<?php echo $course['course_code'] ?>"><?php echo $course['course_code']?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                                <!-- <input class="w-full h-[45px] rounded-[5px] bg-[#0000610c] focus:bg-[#e4e4e4bb]" type="text" name="course_code" id="course_code" placeholder="Course Code" required> -->
                            </div>
                            <div class="form-control">
                                <label class="font-medium text-[#000061bb] for="course_title">Course Title:</label>
                                <input class="w-full h-[45px] rounded-[5px] bg-[#0000610c] focus:bg-[#e4e4e4bb]" type="text" name="course_title" id="course_title" placeholder="Course Title" required>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div class="form-control">
                                    <label class="font-medium text-[#000061bb] for="date">Date:</label>
                                    <input class="w-full h-[45px] rounded-[5px] bg-[#0000610c] focus:bg-[#e4e4e4bb]" type="date" name="date" id="date" required>
                                </div>
                                <div class="form-control">
                                    <label class="font-medium text-[#000061bb] for="time">Time:</label>
                                    <input class="w-full h-[45px] rounded-[5px] bg-[#0000610c] focus:bg-[#e4e4e4bb]" type="time" name="time" id="time" required>
                                </div>
                            </div>
                            <button class="w-full h-[45px] border-0 bg-[#000061] text-[#e4e4e4] rounded-full" type="submit" name="allocate_course">Allocate Course</button>
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
        const currentPageId = "dashboard";
        document.getElementById(currentPageId).classList.add("active");
    </script>
    <script src="../script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>
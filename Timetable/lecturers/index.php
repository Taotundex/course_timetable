<?php
    session_start();
    include "../connect.php";
    
    $email = $_SESSION['email'];
    if (!isset($_SESSION['email'])) {
        header("Location: index.php");
        exit();
    }
    $msg = '';

    $select_lecturer = mysqli_query($conn, "SELECT * FROM `lecturers` WHERE `email`='$email'");
    $lecturer = mysqli_fetch_assoc($select_lecturer);

    if (isset($_POST['submit'])) {
        $lecturer_name = $lecturer['lecturer_name'];
        $course_image = $_FILES["course_image"]["name"];
        $tmp_course_image = $_FILES["course_image"]["tmp_name"];
        $course_code = $_POST["course_code"];
        $course_title = $_POST["course_title"];
        $date = $_POST["date"];
        $time = $_POST["time"];

        $insert = mysqli_query($conn, "INSERT INTO `new_course`(`lecturer_name`, `course_image`, `course_code`, `course_title`, `date`, `time`) VALUES ('$lecturer_name', '$course_image', '$course_code', '$course_title', '$date', '$time')");
        if ($insert == true){
            move_uploaded_file($tmp_course_image, '../upload/'.$course_image);
            // header("location: dashboard.php");
            $msg = "<center class='text-[green] font-medium'>Course successfully added.</center>";
        }
        else {
            $msg = "<center class='text-[red] font-medium'>Error adding course.</center>";
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
            include '../bars/lecturer-bars/sidebar.php';
        ?>
            <div class="body bg-[#e4e4e4] shadow-lg h-[100vh]">
                <div class="lg:p-5 md:p-4 p-3 flex flex-col lg:gap-5 md:gap-4 gap-3">
                    <div class="top w-full text-[#000061] flex flex-col justify-center">
                        <h1 class="font-[900] lg:text-[36px] md:text-[30px] text-[24px]">Allocate Courses to Lecturer.</h1>
                        <p class="lg:text-[16px] md:text-[14px] text-[12px]">Lorem ipsum dolor, sit amet pisicing elit. Laudantium perferendis, iste corrupti minima maxime.</p>
                    </div>
                    <div class="relative left mt-[100px]">
                        <img src="../images/image-4.jpg" id="default" width="100%" class="z-[10] bg-[#e4e4e4] absolute top-[0%] left-[50%] translate-x-[-50%] translate-y-[-50%] w-[175px] h-[175px] rounded-full border-2 p-1 border-[#00006130]" alt="">
                        <img id="preview" src="#" alt="Image Preview" style="display: none;" class="z-[10] bg-[#e4e4e4] absolute top-[0%] left-[50%] translate-x-[-50%] translate-y-[-50%] w-[175px] h-[175px] rounded-full border-2 p-1 border-[#00006130]">
                        <form class="lg:w-[450px] md:w-[450px] w-[95%] mx-auto my-5 flex flex-col gap-3 bg-[#0000610c] hover:scale-[102%] transition ease-in-out delay-150 p-[30px] rounded-[15px] border-2 border-[#00006130] pt-[75px]" action="" method="post" enctype="multipart/form-data">
                            <div class="form-control">
                                <label class="font-medium text-[#000061bb]" for="course_image">Course Image:</label>
                                <input class="w-full h-[45px] rounded-[5px] bg-[#0000610c] focus:bg-[#e4e4e4bb] border border-[#00006180] rounded-[5px]" type="file" name="course_image" id="course_image" accept="image/*" required>
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
                            <?php echo $msg;?>
                            <button class="w-full h-[45px] border-0 bg-[#000061] text-[#e4e4e4] rounded-full" type="submit" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
            include '../bars/lecturer-bars/offcanvas.php';
        ?>
    </div>


    <script>
        const currentPageId = "dashboard";
        document.getElementById(currentPageId).classList.add("active");

        const defaultEl = document.getElementById('default');
        document.getElementById('course_image').addEventListener('change', function (event) {
            const file = event.target.files[0]; 
            if (file) {
                const reader = new FileReader(); 
                reader.onload = function (e) {
                const preview = document.getElementById('preview');
                preview.src = e.target.result;
                defaultEl.style.display = 'none';
                preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script src="../script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>
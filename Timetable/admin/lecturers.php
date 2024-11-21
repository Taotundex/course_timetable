<?php
    include "../connect.php";

    $msg = "";
    if(isset($_POST["add_lecturer"])){
        $lecturer_name = $_POST["lecturer_name"];
        $email = $_POST["email"];
        $profile_image = $_FILES["profile_image"]["name"];
        $tmp_profile_image = $_FILES["profile_image"]["tmp_name"];
        $password = $_POST["password"];
        $about = $_POST["about"];
        $datetime = date("jS M, Y - h:i:sa");

        $query = "SELECT * FROM `lecturers` WHERE `email` = '$email'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $msg = "<center class='text-[red] font-medium'>Email already exists. Please input a different email.</center>";
        } 
        else {
            $query_user = "SELECT * FROM `lecturers` WHERE `lecturer_name` = '$lecturer_name'";
            $result_user = $conn->query($query_user);
            if ($result_user->num_rows > 0) {
                $msg = "<center class='text-[red] font-medium'>Name already exists. Please input a different name.</center>";
            } 
            else {
                function isValidEmail($email) {
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        return true;
                    } else {
                        return false;
                    }
                }
                if (isValidEmail($email)) {
                    $insert = mysqli_query($conn, "INSERT INTO `lecturers`(`lecturer_name`, `email`, `profile_image`, `password`, `about`, `datetime`) VALUES ('$lecturer_name', '$email', '$profile_image', '$password', '$about', '$datetime')");
                    if ($insert == true){
                        move_uploaded_file($tmp_profile_image, '../upload/'.$profile_image);
                        // header("location: dashboard.php");
                        $msg = "<center class='text-[green] font-medium'>Lecturer account has been successfully created.</center>";
                    }
                    else {
                        $msg = "<center class='text-[red] font-medium'>Error creating account.</center>";
                    }
                }
                else {
                    $msg = "<center class='text-[red] font-medium'>Invalid email address.</center>";
                }
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
                <div class="lg:p-5 md:p-4 p-3 flex flex-col lg:gap-5 md:gap-4 gap-3">
                    <div class="top w-full text-[#000061] flex flex-col justify-center">
                        <h1 class="font-[900] lg:text-[36px] md:text-[30px] text-[24px]">Add Lecturers.</h1>
                        <p class="lg:text-[16px] md:text-[14px] text-[12px]">Lorem ipsum dolor, sit amet pisicing elit. Laudantium perferendis, iste corrupti minima maxime.</p>
                    </div>
                    <div class="relative left mt-[100px]">
                        <img src="../images/image-4.jpg" id="default" width="100%" class="z-[10] bg-[#e4e4e4] absolute top-[0%] left-[50%] translate-x-[-50%] translate-y-[-50%] w-[175px] h-[175px] rounded-full border-2 p-1 border-[#00006130]" alt="">
                        <img id="preview" src="#" alt="Image Preview" style="display: none;" class="z-[10] bg-[#e4e4e4] absolute top-[0%] left-[50%] translate-x-[-50%] translate-y-[-50%] w-[175px] h-[175px] rounded-full border-2 p-1 border-[#00006130]">
                        <form class="lg:w-[450px] md:w-[450px] w-[95%] mx-auto my-5 flex flex-col gap-3 bg-[#0000610c] hover:scale-[102%] transition ease-in-out delay-150 p-[30px] rounded-[15px] border-2 border-[#00006130] pt-[75px]" action="" method="post" enctype="multipart/form-data">
                            <div class="form-control">
                                <label class="font-medium text-[#000061bb]" for="lecturer_name">Lecturer's Name:</label>
                                <input class="w-full h-[45px] rounded-[5px] bg-[#0000610c] focus:bg-[#e4e4e4bb]" type="text" name="lecturer_name" id="lecturer_name" placeholder="lecturer_name" required>
                            </div>
                            <div class="form-control">
                                <label class="font-medium text-[#000061bb]" for="email">Email Address:</label>
                                <input class="w-full h-[45px] rounded-[5px] bg-[#0000610c] focus:bg-[#e4e4e4bb]" type="email" name="email" id="email" placeholder="lectutreremail@mail.com" required>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div class="form-control">
                                    <label class="font-medium text-[#000061bb]" for="profile_image">Profile Picture:</label>
                                    <input class="w-full h-[45px] rounded-[5px] bg-[#0000610c] focus:bg-[#e4e4e4bb] border border-[#00006180] rounded-[5px]" type="file" name="profile_image" id="profile_image" accept="image/*" required>
                                </div>
                                <div class="form-control">
                                    <label class="font-medium text-[#000061bb]" for="password">Password:</label>
                                    <input class="w-full h-[45px] rounded-[5px] bg-[#0000610c] focus:bg-[#e4e4e4bb] border border-[#00006180] rounded-[5px]" type="password" name="password" id="password" placeholder="* * * * * * * *" required>
                                </div>
                            </div>
                            <div class="form-control">
                                <label class="font-medium text-[#000061bb]" for="about">About Lecturer:</label>
                                <textarea class="px-[10px] w-full h-[100px] rounded-[5px] bg-[#0000610c] focus:bg-[#e4e4e4bb] resize-none" name="about" id="about" placeholder="Lecturer details"></textarea>
                            </div>
                            <?php echo $msg;?>
                            <button class="w-full h-[45px] border-0 bg-[#000061] text-[#e4e4e4] rounded-full" type="submit" name="add_lecturer">Add lecturer</button>
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
        const currentPageId = "lecturers";
        document.getElementById(currentPageId).classList.add("active");
        
        const defaultEl = document.getElementById('default');
        document.getElementById('profile_image').addEventListener('change', function (event) {
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
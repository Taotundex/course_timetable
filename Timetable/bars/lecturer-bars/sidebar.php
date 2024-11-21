<div class="sidebar col-span-1 lg:flex md:flex flex-col hidden justify-between h-[100vh] py-5 px-4">
            <div class="brand-name text-[50px] font-[900] text-[#e4e4e4] bg-[#000061] flex items-center justify-center">
                VHICTOR
            </div>
            <div class="links">
                <ul class="flex flex-col gap-1">
                    <li id="dashboard" class="h-[45px] flex items-center gap-3 rounded-[5px] font-medium px-4 text-[#e4e4e4] bg-[#000061] hover:bg-[#e4e4e4] hover:text-[#000061]">
                        <i class="bi bi-house text-[20px]"></i>
                        <a href="../lecturers/index.php">Dashboard</a>
                    </li>
                    <li id="lecturers" class="h-[45px] flex items-center gap-3 rounded-[5px] font-medium px-4 text-[#e4e4e4] bg-[#000061] hover:bg-[#e4e4e4] hover:text-[#000061]">
                        <i class="bi bi-person-lines-fill text-[20px]"></i>
                        <a href="../lecturers/lecturers.php">Lecturers</a>
                    </li>
                    <li id="students" class="h-[45px] flex items-center gap-3 rounded-[5px] font-medium px-4 text-[#e4e4e4] bg-[#000061] hover:bg-[#e4e4e4] hover:text-[#000061]">
                        <i class="bi bi-book-half text-[20px]"></i>
                        <a href="../lecturers/students.php">Students</a>
                    </li>
                    <li id="settings" class="h-[45px] flex items-center gap-3 rounded-[5px] font-medium px-4 text-[#e4e4e4] bg-[#000061] hover:bg-[#e4e4e4] hover:text-[#000061]">
                        <i class="bi bi-gear text-[20px]"></i>
                        <a href="../lecturers/settings.php">Settings</a>
                    </li>
                </ul>
            </div>
            <div id="logout" class="h-[45px] flex items-center gap-3 rounded-[5px] font-medium px-4 bg-[#e4e4e4] text-[#000061] hover:text-[#e4e4e4] hover:bg-[#000061]">
                <i class="bi bi-box-arrow-left text-[20px]"></i>
                <a href="../logout.php">Logout</a>
            </div>
        </div>
        <div class="main-body h-[97vh] overflow-y-scroll lg:col-span-4 md:col-span-4 col-span-5">
            <div class="sticky z-[100] top-0 head text-[#e4e4e4] bg-[#000061] backdrop-blur-md lg:px-5 md:px-4 px-3 h-[85px] w-full flex items-center justify-between lg:flex-row md:flex-row flex-row-reverse">
                <i class="lg:hidden md:hidden bi bi-list lg:w-[40px] lg:h-[40px] md:w-[35px] md:h-[35px] w-[30px] h-[30px] flex items-center justify-center bg-[#e4e4e4] text-[24px] rounded-[5px] text-[#000061]"  data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" aria-controls="drawer-navigation"></i>
                <h1 class="font-[900] lg:text-[36px] md:text-[30px] text-[16px] uppercase "><?php echo $lecturer['lecturer_name'];?></h1>
                <a href="settings.html" class="profile flex items-center gap-2">
                    <?php
                        if ($lecturer['profile_image'] == ''){
                            echo '<img src="../images/profile-icon.png" class="bg-[#e4e4e4] lg:w-[40px] md:w-[35px] w-[30px] lg:h-[40px] md:h-[35px] h-[30px] rounded-full border border-[#e4e4e4] p-1" width="100%" alt="profile image">';
                        }
                        else {
                        ?>
                            <img src="../upload/<?php echo $lecturer['profile_image']?>" class="bg-[#e4e4e4] lg:w-[40px] md:w-[35px] w-[30px] lg:h-[40px] md:h-[35px] h-[30px] rounded-full border border-[#e4e4e4] p-1" width="100%" alt="profile image">
                        <?php
                        }
                    ?>
                    <div class="name flex flex-col">
                        <h1 class="font-[900] lg:text-[18px] text-[12px]">Hi, <span><?php echo $lecturer['lecturer_name'];?></span></h1>
                        <small class="lg:text-[12px] text-[10px] leading-3">Your profile!</small>
                    </div>
                </a>
            </div>
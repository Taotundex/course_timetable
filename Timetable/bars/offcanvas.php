<div id="drawer-navigation" class="z-[1000] fixed top-0 left-0 w-[300px] h-[100vh] p-4 overflow-y-scroll transition-transform -translate-x-full bg-[#e4e4e4] backdrop-blur-md" tabindex="-1" aria-labelledby="drawer-navigation-label">
            <!-- <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">Menu</h5> -->
            <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div class="sidebar flex flex-col h-[80vh] justify-between py-[25px]">
                <div class="brand-name text-[50px] font-[900] bg-[#e4e4e4] text-[#000061] flex items-center justify-center">
                    VHICTOR
                </div>
                <div class="links">
                    <ul class="flex flex-col gap-1">
                        <li id="dashboard" class="h-[45px] flex items-center gap-3 rounded-[5px] font-medium px-4 bg-[#e4e4e4] text-[#000061] hover:text-[#e4e4e4] hover:bg-[#000061]">
                            <i class="bi bi-house text-[20px]"></i>
                            <a href="../dashboard.php">Dashboard</a>
                        </li>
                        <li id="lecturers" class="h-[45px] flex items-center gap-3 rounded-[5px] font-medium px-4 bg-[#e4e4e4] text-[#000061] hover:text-[#e4e4e4] hover:bg-[#000061]">
                            <i class="bi bi-person-lines-fill text-[20px]"></i>
                            <a href="../lecturers.php">Lecturers</a>
                        </li>
                        <li id="courses" class="h-[45px] flex items-center gap-3 rounded-[5px] font-medium px-4 bg-[#e4e4e4] text-[#000061] hover:text-[#e4e4e4] hover:bg-[#000061]">
                            <i class="bi bi-book-half text-[20px]"></i>
                            <a href="../courses.php">Courses</a>
                        </li>
                        <li id="settings" class="h-[45px] flex items-center gap-3 rounded-[5px] font-medium px-4 bg-[#e4e4e4] text-[#000061] hover:text-[#e4e4e4] hover:bg-[#000061]">
                            <i class="bi bi-gear text-[20px]"></i>
                            <a href="../settings.php">Settings</a>
                        </li>
                    </ul>
                </div>
                <div id="logout" class="h-[45px] flex items-center gap-3 rounded-[5px] font-medium px-4 bg-[#000061] text-[#e4e4e4] hover:bg-[#e4e4e4] hover:text-[#000061]">
                    <i class="bi bi-box-arrow-left text-[20px]"></i>
                    <a href="../logout.php">Logout</a>
                </div>
           </div>
        </div>
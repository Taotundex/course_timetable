document.addEventListener("DOMContentLoaded", () => {
    const calendarDates = document.getElementById("calendar-dates");
    const monthYear = document.getElementById("month-year");
    const prevMonthBtn = document.getElementById("prev-month");
    const nextMonthBtn = document.getElementById("next-month");

    const months = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];

    let currentDate = new Date();

    function renderCalendar() {
        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();
    
        // Set the month and year
        monthYear.textContent = `${months[month]} ${year}`;
    
        // Clear previous dates
        calendarDates.innerHTML = "";
    
        // Get today's date
        const today = new Date();
        const isCurrentMonth = year === today.getFullYear() && month === today.getMonth();
    
        // Get first day and number of days in the current month
        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const daysInPrevMonth = new Date(year, month, 0).getDate();
    
        // Add previous month's dates
        for (let i = firstDay - 1; i >= 0; i--) {
            const date = daysInPrevMonth - i;
            const dayElement = document.createElement("div");
            dayElement.textContent = date;
            dayElement.classList.add("inactive");
            calendarDates.appendChild(dayElement);
        }
    
        // Add current month's dates
        for (let i = 1; i <= daysInMonth; i++) {
            const dayElement = document.createElement("div");
            dayElement.textContent = i;
    
            // Highlight today's date
            if (isCurrentMonth && i === today.getDate()) {
                dayElement.classList.add("today");
            }
    
            calendarDates.appendChild(dayElement);
        }
    
        // Add next month's dates to complete the grid
        const remainingCells = 42 - calendarDates.children.length;
        for (let i = 1; i <= remainingCells; i++) {
            const dayElement = document.createElement("div");
            dayElement.textContent = i;
            dayElement.classList.add("inactive");
            calendarDates.appendChild(dayElement);
        }
    }
    

    // Event listeners for navigation buttons
    prevMonthBtn.addEventListener("click", () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar();
    });

    nextMonthBtn.addEventListener("click", () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar();
    });

    // Initial render
    renderCalendar();
});


function updateClock() {
    const clockElement = document.getElementById("clock");

    const now = new Date();
    const hours = now.getHours().toString().padStart(2, "0");
    const minutes = now.getMinutes().toString().padStart(2, "0");
    const seconds = now.getSeconds().toString().padStart(2, "0");

    clockElement.textContent = `${hours}:${minutes}:${seconds}`;
}

// Update the clock every second
setInterval(updateClock, 1000);

// Initialize the clock immediately
updateClock();

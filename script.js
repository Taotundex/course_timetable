// const lecturersUrl = 'http://localhost/lecturers.php';
// const studentsUrl = 'http://localhost/students.php';
// const coursesUrl = 'http://localhost/courses.php';
// const timetablesUrl = 'http://localhost/timetables.php';

// Get elements
const lecturerForm = document.getElementById('lecturer-form');
const studentForm = document.getElementById('student-form');
const courseForm = document.getElementById('course-form');
const timetableForm = document.getElementById('timetable-form');

// Add event listeners
lecturerForm.addEventListener('submit', addLecturer);
studentForm.addEventListener('submit', addStudent);
courseForm.addEventListener('submit', addCourse);
timetableForm.addEventListener('submit', addTimetable);

// Functions
function addLecturer(e) {
    e.preventDefault();
    const name = document.getElementById('lecturer-name').value;
    const email = document.getElementById('lecturer-email').value;
    const password = document.getElementById('lecturer-password').value;
    
    const formData = new FormData();
    formData.append('name', name);
    formData.append('email', email);
    formData.append('password', password);
    
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'lecturers.php', true);
    xhr.send(formData);
    
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log(xhr.responseText);
        }
    }
}
function addStudent(e) {
    e.preventDefault();
    const name = document.getElementById('student-name').value;
    const email = document.getElementById('student-email').value;
    const password = document.getElementById('student-password').value;
    
    const formData = new FormData();
    formData.append('name', name);
    formData.append('email', email);
    formData.append('password', password);
    
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'students.php', true);
    xhr.send(formData);
    
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log(xhr.responseText);
        }
    }
}
function addCourse(e) {
    e.preventDefault();
    const name = document.getElementById('course-name').value;
    const email = document.getElementById('course-email').value;
    const password = document.getElementById('course-password').value;
    
    const formData = new FormData();
    formData.append('name', name);
    formData.append('email', email);
    formData.append('password', password);
    
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'courses.php', true);
    xhr.send(formData);
    
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log(xhr.responseText);
        }
    }
}
function addTimetable(e) {
    e.preventDefault();
    const name = document.getElementById('timetable-name').value;
    const email = document.getElementById('timetable-email').value;
    const password = document.getElementById('timetable-password').value;
    
    const formData = new FormData();
    formData.append('name', name);
    formData.append('email', email);
    formData.append('password', password);
    
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'timetables.php', true);
    xhr.send(formData);
    
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log(xhr.responseText);
        }
    }
}

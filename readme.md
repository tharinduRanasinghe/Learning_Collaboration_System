# “AUAHA” Online Collaboration Learning System for Grade 6 to Grade 11 Students in Sri Lanka

## Introduction

> From the last decade onwards the traditional learning mechanisms have changed radically. Nowadays being physically present is not the only available option for learning. Especially with the rise of various technologies and due to the current coronavirus pandemic situation, it has accelerated the use of online mechanisms for learning purposes. Due to these factors, we are on a revolution for online education.
In Sri Lanka, due to the lack of proper network coverage, lack of proper equipment to browse the internet and various other reasons, it has a made many difficulties for many students to stay available for the online sessions done by their schools. 
Many people would suggest creating a Learning Management System ( LMS)  to address this issue. However, in an LMS the only action that can be done is that a teacher/ lecturer uploads the course content along with any assignments and the users (students) will go through it, other than that LMS has very low interactivity. To overcome the issues in LMS, the best solution will be to create an Online Collaboration Learning System, where the teachers and students can interact with each other and also the students can interact with other students just like in a physically conducted classroom. The students can ask questions to clarify any issues they have, and either the teacher or the other students help to clarify the issues.

## Developed by
>#### T.V. Ranasinghe    
>#### K.T. Weerathunga       
>#### M.K.P. Perera 
>#### D.N.V.T.W. Opatha  
>#### R. F. F. Zahara          
    


## Code Samples
> 	
~~~~
<i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
</div>
~~~~

## Installation

>- Inorder to use this web application first install xampp on your device.
>- Setup MySQL database with apache server.
>- Then, copy the folder to htdocs file in xampp.
>- Create the database lms.
>- Then import the auaha.sql file using phpmyadmin.
>- After that  the setting up will be completed.
>- Run the index.html file in html_menu folder to access all the content.

## Usage

### Use as a Teacher

>- Inorder to use this  as a teacher, first you must signup as a teacher.
>- To do that use the registration - teacher in index.html page.
>- After registration, you can logged in to your user acccount using the email and password given at the time of registration.
>- The functions of a teacher includes :
>>- Adding courses
>>- Adding lessons in courses
>>- Scheduling examinations
>>- Making criterias for the examinations

### Use as a Student

>- Inorder to logged in as a student, first you must signup as a teacher.
>- To do that use the registration - student in index.html page.
>- After registration, you can logged in to your user acccount using the email and password given at the time of registration.
>- The functions of a student includes :
>>- Adding courses to their profile
>>- Adding lessons tolearn
>>- Participate in examinations

### Using the Forum

>- Any person whether registered or not can view items in forum. 
>- However, inorder to put questions or to post comments they have to logged in to the system.
>- There are threads for each subject that is currently there in the Auaha system.

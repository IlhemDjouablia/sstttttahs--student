<?php 
include('../config/conn.php');
session_start();

if (isset($_SESSION['idst']) && isset($_SESSION['fnamest'])) {
 



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
   <style>


     #internship .containerform{
  
  max-width: 950px;
  width: 900%;
  height: 100%;
  border-radius: 6px;
  padding: 20px;
  margin: 0 15px;
 
  background: #8041f5ab;
  box-shadow:0 0 0.375rem 0.25rem rgba(157, 171, 187, 0.274);
  border: 1px solid rgba(146, 145, 145, 0);
  
}
#internship .containerform header::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: -2px;
  height: 3px;
  width: 27px;
 margin-left: 9.2cm;
  border-radius: 8px;
  background-color: #ffffff;
}
#internship .buttonsform1 button{

width: 30%;
position: relative;
padding: 10px 20px;
border: 0;
font-size: 1.5rem;
font-weight: 500;
background:#8041f5b9;
color: #ffffff;
border: 1px solid #8041f5ab;
text-decoration: none;
transition: background-color 0.3s ease-in-out;
box-shadow: 0 .1rem .2rem #0002;
border-radius: 5px;
cursor: pointer;
margin-left: 3cm;
margin-top: 20px;



}
#internship .buttonsform1 .backBtnform{
    width: 30%;
position: relative;
padding: 10px 110px;
border: 0;
font-size: 1.5rem;
font-weight: 500;
background:#8041f5b9;
color: #ffffff;
border: 1px solid #8041f5ab;
text-decoration: none;
transition: background-color 0.3s ease-in-out;
box-shadow: 0 .1rem .2rem #0002;
border-radius: 5px;
cursor: pointer;
margin-left: 3cm;
margin-top: 20px;


}
  
  .bgt88-link:hover{
    background-color: transparent;
    color: var(--first-color-alt);
  }
  .home__title{
  font-size: 3rem;
  font-weight: 800;
  margin-bottom:1rem;
  color: #5B5757;
}
.DROP-PROFIL {
      position: relative;
    }
    
    .dropdown-menu-pro4 {
      display: none;
      position: absolute;
      top: 100%;
      right: 0;
     
      width: 210px;
      background: #ffffff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
      border-radius: 10px;
      z-index: 1;
      animation: slideDown 0.3s ease-in-out;
      animation-fill-mode: forwards;
      opacity: 0;
      transform: translateY(-10px);
    }
    
    .MY-PROF {
      display: flex;
      align-items: center;
      padding: 20px;
      transition: all 0.2s ease-in-out;
      border-bottom: .1rem solid #aaa7a717;
      cursor:pointer;
      border-radius: 10px;
    }
    
    .MY-PROF:hover {
      background-color:#af9ef875;
      
    }
    
    .MY-PROF i {
      font-size: large;
      color: #8041f5ab;
      border-radius: 50%;
      margin-right: 10px;
    }
    
    .MY-PROF-text {
      flex: 1;
    }
    
    .MY-PROF-text p {
      margin: 0;
      font-size: 14px;
      font-weight: bold;
      color: #000000b6;
    }
    
    .notification-text span {
      font-size: 11px;
      color: #7884f5;
    }
    
    .DROP-PROFIL:hover .dropdown-menu-pro4 {
      display: block;
      opacity: 1;
      transform: translateY(0);
    }
    
    @keyframes slideDown {
      0% {
        opacity: 0;
        transform: translateY(-10px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }
   </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
   
</head>
<body>
   <div class="container" id="top">
    <!--start sidebar///////////////////////////////////////////////-->
    <aside class="sidebar-wrapper">
            <div class="sidebar-header">
                <img src="img/lgogoo2.png" alt="Logo">
                <h4>Staget</h4>
                <div class="close-menu">
                    <i class="fas fa-chevron-left"></i>
                </div>
            </div>
            <nav>
                <ul>
                    <li ><a href="index.php" data-section="home">
                            <i class="fas fa-home"></i>
                            <div class="title">Home  </div>
                           
                        </a></li>


                        <li>
                            <a href="#internship" class="dropdown-toggle">
                            <i class="fa-solid fa-briefcase"></i>
                                <div class="title">internship Request</div>
                                <i class="fas fa-chevron-down dropdown-icon"></i>
                            </a>
                            <ul class="submenu">
                                <li class="active"><a href="request.php"><i class="fa-solid fa-paper-plane" style="font-size: 1.7rem;"></i>Request</a></li>
                                <li><a href="acc.php"><i class='bx bx-check-circle' style="font-size: 2rem;"></i>Accepted</a></li>
                                <li><a href="ref.php"> <i class='bx bx-x-circle' style="font-size: 2rem;"></i>Refused</a></li>
                            </ul>
                        </li>
                   
                    <li><a href="offers.php" data-section="offers">
                        <i class="fa-solid fa-address-card"></i>
                            <div class="title">Offers</div>
                        </a></li>
                        <li><a href="interns.php" data-section="offers">
                        <i class="fa-solid fa-address-card"></i>
                            <div class="title">internships</div>
                        </a></li>

                  
                    <li><a href="recycle.php" class="sidebar-link" data-section="trash">
                        <i class="fa-solid fa-trash-can"></i>
                            <div class="title">Recycle Bin</div>
                        </a></li>
                    <li><a href="contact.php"  data-section="contact">
                        <i class="fa-solid fa-message"></i>
                            <div class="title">Contact</div>
                        </a></li> 

                    
                  
                </ul>
            </nav>
        </aside>
    <!--end sidebar//////////////////////////////////////////////////-->
    <main class="content">
        <!--start header ////////////////////////////////////////////////-->
        <header>
            <div class="header-wrapper">
                <div class="header-left">
                    <div class="toggle-icon">
                        <i class="fas fa-bars"></i>
                    </div>
                    <i class="fa-solid fa-magnifying-glass fa-beat" style="color: #8041f5ab;"></i>
                    <input type="text" placeholder="Search...">
                </div>
                <div class="header-right">

                <div class="dropdown dt">
    <div class="star-container bell">
        <i class='bx bx-bell'></i>
        <span class="count" ></span>
    </div>
    <div class="dropdown-content ">

    </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		function load_unseen_notification(view = '') {
			$.ajax({
				url: "fetch.php",
				method: "POST",
				data: { view: view },
				dataType: "json",
				success: function(data) {
					$('.dropdown-content').html(data.notification);
					if (data.unseen_notification > 0) {
						$('.count').html(data.unseen_notification);
					}
				}
			});
		}

		load_unseen_notification();

		$(document).on('click', '.dt', function() {
			$('.count').html('');
			load_unseen_notification('yes');
		});

		setInterval(function() {
			load_unseen_notification();
		}, 5000);
	});
</script>


<a href="contact.php">
                    <div class="star-container chat">
                    <i class='bx bx-message-detail'></i>
                    </div></a>
                    <div class="DROP-PROFIL">
                   <div class="photp-pro">
                   <img src="img/<?=$_SESSION['pst']?>" alt="avatar" style="height: 45px ;width:45px ;">
                    </div>
                    <div class="dropdown-menu-pro4">
                    
                      <div class="MY-PROF">
                        <a href="profile.php">
                        <i class='bx bx-user-circle'></i>
                        <div class="MY-PROF-text">
                            <p>My Profil</p>
                          </a>
                        </div></div>
                        <div class="MY-PROF">
                          <a href="security.php">
                          <i class='bx bxs-lock-alt'></i>
                          <div class="MY-PROF-text">
                              <p>Security</p>
                            </a>
                          </div></div>
                          <div class="MY-PROF">
                            <a href="../logout.php">
                            <i class='bx bx-log-out-circle'></i>
                            <div class="MY-PROF-text">
                                <p>Log Out</p>
                              </a>
                            </div></div>
                       
                    </div>
                  </div>
                </div>
            </div>
        </header>     
        <section>
        <div class="home__title" style="font-size: 1.6rem;font-weight: 550;
  color: #0e0e0ed0;  margin-top: 0.8cm;  margin-left: 0.5cm;">Dashboard <i class='bx bx-right-arrow-alt bx-tada' style="font-size: 1.8rem;
  color:#0e0e0e8f; "></i><span style=" color: #8041f5ab;"> Internship Request  form</span> </div> <br>


        </section>   
            <section id="internship" class="page-section ">
                
            <div class="row">

  

<div class="containerform">
        <header>Internship Request </header>

        <form action="back/addreqback.php" method="post">
       
            <div class="details ID">
                    <span class="titleform">information relating to the establishment: </span>
                    <div class="input-field" id="selct" style="  margin-left: 8.4cm;">
                    <select name="com" class="" id="company-select"value=<?=null?>>

<option value=<?=null?>>Select Level </option>
<?php 
$sql = "SELECT * FROM company ";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) { ?>
<option value=<?= $row['id_company'];?>><?= $row['name_company']; ?></option>
<?php };?>

</select></div>

                    <div class="fieldsform">
                        
                        <div class="input-field">
                            <label>Name</label>
                            <input type="text" placeholder="Enter  the name  of intution  " required name='name' >
                        </div>

                        <div class="input-field">
                            <label> Address</label>
                            <input type="text" placeholder="Enter establishment Address" required name='address' >
                        </div>

                        <div class="input-field">
                            <label>phone number</label>
                            <input type="text" placeholder="Enter establishment phone " required name='phone'>
                        </div>

                        <div class="input-field">
                            <label>EMAIL</label>
                            <input type="email" placeholder="Enter establishment EMAIL" required name='email'>
                        </div>

                        <div class="input-field">
                            <label>Internship manager</label>
                            <input type="text" placeholder="Enter Internship manager " required name='manager_name'>
                        </div>
                        <div class="input-field">
                            <label> Contact details</label>
                            <input type="email" placeholder="Enter Contact details" required name='contact' >
                        </div>
                        
                    </div>
                    

                </div> 
                <div class="details address">
                    <span class="titleform">Internship information</span>

                    <div class="fieldsform">
                    <div class="input-field">
                            <label>Internship Name</label>
                            <input type="text" placeholder="Enter your district" required name='internshipname' >
                        </div>
                        <div class="input-field">
                            <label>Duration  of the course</label>
                            <input type="number" placeholder="" required name='duration'>
                        </div>

                        <div class="input-field">
                            <label>starting date</label>
                            <input type="date" placeholder="of " required name='startdate'>
                        </div>

                        <div class="input-field">
                            <label>  finishing date </label>
                            <input type="date" placeholder="to" required name='enddate'>
                        </div>

                        <div class="input-field">
                            <label>work plan</label>
                            <input type="text" placeholder="Enter your district" required name='workplan' >
                        </div>

                        
                        <div class="input-field">
                            
                            <input type="hidden"  name='photo'>
                        </div>


                    </div>
                    <br><br>
                    
                    <div class="buttonsform1">
                    
                                          <a href="request.php" class="backBtnform" id="cancelsend">
                                              <i class="uil uil-navigator"></i>
                                              <span class="btnText">Back</span>
                                         </a>
                                          
                                          <button class="sumbitform">
                                              <span class="btnTextform">send</span>
                                              <i class="uil uil-navigator"></i>
                                          </button>
                                      </div>
                </div>
            </div>   
                    
                    </div>
                </div> 
    
        </form>
    </div>

    <script>
    // Listen for changes in the dropdown menu
    document.getElementById('company-select').addEventListener('change', function() {
        var companyId = this.value;  // Get the selected company ID
        var xhr = new XMLHttpRequest();  // Create an AJAX object
        xhr.open('GET', 'add.php?id=' + companyId);  // Prepare the AJAX request
        xhr.onload = function() {
            if (xhr.status === 200) {
                var info = JSON.parse(xhr.responseText);  // Parse the response as JSON
                // Fill in the input fields with the fetched information
                document.querySelector('input[name="name"]').value = info.name_company;
                document.querySelector('input[name="address"]').value = info.location;
                document.querySelector('input[name="phone"]').value = info.phone;
                document.querySelector('input[name="email"]').value = info.email;
                document.querySelector('input[name="photo"]').value = info.image_company;

            } else {
                console.error('Failed to fetch company info');
            }
        };
        xhr.send();  // Send the AJAX request
    });
</script>

</div>

</section>
       
       <br><br>
               <footer>
                   <div class="copyright">
                   Ilhème & Hadjer L3 TI 2023.
                   </div>
               </footer>
       
       
           </main>
          </div>
       
           <div class="switcher-container">
               <div class="switcher-icon">
                   <i class="fas fa-cog"></i>
               </div>
               <div class="switcher-close">
                   <i class="fas fa-times"></i>
               </div>
               <div class="switcher-header">
                   <h3>theme customizer</h3>
                   <h4>theme styles</h4>
               </div>
               <div class="switcher-body">
                   <ul>
                       <li data-color="#f7f7f7" class="active"></li>
                       <li data-color="#212529"></li>
                   </ul>
               </div>
           </div>
           <a href="#top" class="scroll-top">
               <i class="fas fa-arrow-up"></i>
           </a>
           
           
          </div>
       
       
       
           
       
          <script>
    const dropdownToggle = document.querySelector(".dropdown-toggle");
    const activeListItem = document.querySelector(".submenu li.active");

    dropdownToggle.addEventListener("click", function (event) {
        event.preventDefault();
        const parentLi = this.parentElement;
        parentLi.classList.toggle("open");
    });

    // Check if there is an active list item and keep the dropdown open
    if (activeListItem) {
        const parentDropdown = activeListItem.closest(".submenu");
        const parentLi = parentDropdown.parentElement;
        parentLi.classList.add("open");
    }
</script>




    

    
   

<script>


let btnMenu = document.querySelector('.toggle-icon i');
let menu = document.querySelector('.sidebar-wrapper');
let closeBtn = document.querySelector('.close-menu i');
let switcherBtn = document.querySelector('.switcher-icon i');
let switcherContainer = document.querySelector('.switcher-container');
let switcherClose = document.querySelector('.switcher-close i');

//Function add Class
function addClass(button, containerName, className) {
    button.addEventListener('click', () => {
        containerName.classList.add(className);
    });
}

//Function remove Class
function removeClass(button, containerName, className) {
    button.addEventListener('click', () => {
        containerName.classList.remove(className);
    });
}

addClass(btnMenu, menu, 'active');
removeClass(closeBtn, menu, 'active');
addClass(switcherBtn, switcherContainer, 'open');
removeClass(switcherClose, switcherContainer, 'open');

//Change Color
let colorsBtn = document.querySelectorAll('.switcher-body ul li');

colorsBtn.forEach((btn) => {
    btn.addEventListener('click', (e) => {
        colorsBtn.forEach((btn) => {
            btn.classList.remove('active');
        });
        btn.classList.add('active');
        if (e.target.dataset.color === "#212529") {
            document.documentElement.style.setProperty('--lightGray', e.target.dataset.color);
            document.documentElement.style.setProperty('--whiteColor', '#2b3035');
            document.documentElement.style.setProperty('--textColor', '#9ca2a8');
            //Set Colors in local storage
            let colors = [e.target.dataset.color, '#2b3035', '#9ca2a8'];
            localStorage.setItem("colors-options", JSON.stringify(colors));
        } else {
            document.documentElement.style.setProperty('--lightGray', e.target.dataset.color);
            document.documentElement.style.setProperty('--whiteColor', '#ffffff');
            document.documentElement.style.setProperty('--textColor', '#4c5258');
            //Set Colors in local storage
            let colors = [e.target.dataset.color, '#ffffff', '#4c5258'];
            localStorage.setItem("colors-options", JSON.stringify(colors));
        }
    });
});

//Read Colors From LocalStorage
let colorsStorage = JSON.parse(localStorage.getItem('colors-options'));
//Check If Local Storage is not empty
if (colorsStorage !== null) {
    document.documentElement.style.setProperty('--lightGray', colorsStorage[0]);
    document.documentElement.style.setProperty('--whiteColor', colorsStorage[1]);
    document.documentElement.style.setProperty('--textColor', colorsStorage[2]);
}
</script>


          
       
       </body>
       </html>
       
       
        
       <?php 
    
       }else{
            header("Location: ../login.php?flindex");
            exit();
       }
        ?>
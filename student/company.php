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
     .bgt88{
    display: inline-block;
    background-color:  #8B73FF;
    color: #fff;
    padding: 1rem 1.5rem;
    border-radius: .5rem;
    font-weight: 600;
    transition: .3s;
    border: none;
  }
  
  .bgt88:hover{
    background-color: #539bde;
  }
  
  .bgt88-link{
    background: none;
    padding: 0;
    color: #8B73FF;
  }
  
  .bgt88-link:hover{
    background-color: transparent;
    color: var(--first-color-alt);
  }
   </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    

<style>
    .home__title{
  font-size: 3rem;
  font-weight: 800;
  margin-bottom:1rem;
  color: #5B5757;
}
</style>
</head>
<body>
   <div class="container" id="top">
    <!--start sidebar///////////////////////////////////////////////-->
    <aside class="sidebar-wrapper">
            <div class="sidebar-header">
                <img src="send2.png" alt="Logo">
                <h4>Staget</h4>
                <div class="close-menu">
                    <i class="fas fa-chevron-left"></i>
                </div>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php" data-section="home">
                            <i class="fas fa-home"></i>
                            <div class="title">Home  </div>
                           
                        </a></li>


                        <li>
                            <a href="#internship" class="dropdown-toggle">
                                <i class="fa-solid fa-pen-to-square"></i>
                                <div class="title">internship Request</div>
                                <i class="fas fa-chevron-down dropdown-icon"></i>
                            </a>
                            <ul class="submenu">
                                <li><a href="request.php"><i class='bx bx-send' style="font-size: 2rem;"></i>Request</a></li>
                                <li><a href="acc.php"><i class='bx bx-check-circle' style="font-size: 2rem;"></i>Accepted</a></li>
                                <li><a href="ref.php"> <i class='bx bx-x-circle' style="font-size: 2rem;"></i>Refused</a></li>
                            </ul>
                        </li>
                    <li class="active"><a href="company.php" data-section="company">
                        <i class="fa-solid fa-briefcase"></i>
                            <div class="title">Company</div>
                        </a></li>
                    <li><a href="offers.php" data-section="offers">
                        <i class="fa-solid fa-address-card"></i>
                            <div class="title">Offers</div>
                        </a></li>
                  
                    <li ><a href="recycle.php" class="sidebar-link" data-section="trash">
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
                    <i class="fa-solid fa-magnifying-glass fa-beat" style="color: #537bc1;"></i>
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



                    <div class="star-container chat">
                        <i class="fa-regular fa-comment-dots"></i>
                    </div>
                    <img src="img/<?=$_SESSION['pst']?>" alt="avatar" style="height: 45px ;width:45px ;">
                </div>
            </div>
        </header>        
            <section id="home-section" class="page-section ">

              </section>
       
<br><br>
        <footer>
            <div class="copyright">
                copyright &copy; 2023 | Staget made with ❤️ by girls team | all right reserved.
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

dropdownToggle.addEventListener("click", function (event) {
    event.preventDefault();
    const parentLi = this.parentElement;
    parentLi.classList.toggle("open");
});







</script>
   

</body>
</html>


 
<?php 
}else{
     header("Location: ../login.php?flindex");
     exit();
}
 ?>
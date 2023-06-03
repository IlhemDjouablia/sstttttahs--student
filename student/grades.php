<?php 
session_start();
include('../config/conn.php');
if (isset($_SESSION['idst']) && isset($_SESSION['fnamest'])) {
    $idreq=$_GET['id'];

    if (isset($idreq)) {
        $sql2 = "SELECT * FROM grade WHERE id_req='$idreq'";
        $result2 = mysqli_query($conn, $sql2);   
        $row = mysqli_fetch_assoc($result2);

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
  
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <style>


#grade{
    width: 100%;
    height: 700px;
    margin-top: 0.5cm;
}

p{
    text-align: center;
    font-weight: 500;
    color: #000000;
    font-size: 1.5rem;
}


.score-card {
    border: 2px solid #d9dadd70;
    border-radius: 5px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
  }
   
  .table__body2 {
    width: 80%;
    max-height: calc(89% - 1.6rem);
   
   
    margin: .8rem auto;
    border-radius: .6rem;
  
    overflow: auto;
    overflow: overlay;
  }
  
  .table__body2::-webkit-scrollbar{
    width: 0.5rem;
    height: 0.5rem;
  }
  
  .table__body2::-webkit-scrollbar-thumb{
    border-radius: .5rem;
    background-color: #0004;
    visibility: hidden;
  }
  
  .table__body2:hover::-webkit-scrollbar-thumb{ 
    visibility: visible;
  }
  
  table {
    width: 100%;
  }
  
  
  
  table, th, td {
    border-collapse: collapse;
    padding: 1.7rem;
    font-size: 1.4rem;
    font-weight: 800;
    color: #615f5f;
  
  } 
  
  
  thead th {
    position: sticky;
    top: 0;
    left: 0;
  
    cursor: pointer;
    text-transform: capitalize;
   
  }
  .themecar{
    background-color:#8041f5ab;
  }
  
  
  tbody tr:nth-child(even) {
    background-color: rgb(255, 255, 255);
  }
  
  tbody tr {
    --delay: .1s;
    transition: .5s ease-in-out var(--delay), background-color 0s;
    background: rgb(255, 255, 255);
  }
  
  tbody tr.hide {
    opacity: 0;
    transform: translateX(100%);
  }
  
  tbody tr:hover {
    background-color: rgba(199, 188, 245, 0.4) !important;
  }
  
  tbody tr td,
  tbody tr td p,
  tbody tr td img {
    transition: .2s ease-in-out;
  }
  
  tbody tr.hide td,
  tbody tr.hide td p {
    padding: 0;
    font: 0 / 0 sans-serif;
    transition: .2s ease-in-out .5s;
  }
  
  tbody tr.hide td img {
    width: 0;
    height: 0;
    transition: .2s ease-in-out .5s;
  }
  
  
  
  
   td .action{
    display: inline-flex;
    
  }
  .action{
    margin-right: 10px;
  }
  .action i{
    font-size: large;
    font-weight: 200;
   
  }
  .action:hover{
  color: #6c00bd;
  
  
  }
  .action2 button i{
    font-size:larger ;
    margin-right: 0.2cm;
    color: #ffffffc0;
  }
  
  @media screen and (max-width: 990px) {
    .rq-tab {
      width: 95%;
      height: auto;
    }
    .score-card {
      display: block;
      border: none;
      border-bottom: 1px solid #f6f8fc9d;
      margin-bottom: 20px;
    }
    .table__header {
      flex-direction: column;
      align-items: flex-start;
      padding: 10px 20px;
      font-size: 1.2rem;
      height: auto;
    }
    .table__header .input-group {
      width: 35%;
      margin-top: 20px;
      justify-content: center;
      align-items: center;
    }
    .table__header .input-group input {
      width: 70%;
      margin-right: 10px;
    }
    .table__header .input-group i {
      margin-right: 0;
    }
    .table__header .input-group:hover {
      width: 35%;
    }
    .table__body2 {
      overflow-x: scroll;
    }
    .table__body2 table {
      width: 1000px;
    }
    .table__body2 td,
    .table__body2 th {
      white-space: nowrap;
      padding: 10px;
      text-align: left;
    }
  }
  
  @media screen and (max-width: 850px) {
    .rq-tab {
      width: 80%;
      height: auto;
      margin-left: 2cm;
    }
  }
  
  @media screen and (max-width: 650px) {
    .rq-tab {
      width: 70%;
      height: auto;
      margin-left: 3cm;
    }
    .table__header {
      flex-direction: column;
      align-items: flex-start;
      padding: 5px 8px;
      font-size: 0.85rem;
      height: auto;
    }
    .table__body table {
      width: 400px;
    }
    .table__body2 td,
    .table__body2 th {
      white-space: nowrap;
      padding: 2px;
      text-align: left;
    }
    .Consulte {
      padding: 5px 10px;
    }
    .Consulte a {
      font-size: 0.7rem;
    }
  }
  
  @media screen and (max-width: 550px) {
    .rq-tab {
      
      width: 50%;
      height: auto;
      
    }
    .table__header {
      flex-direction: column;
      align-items: flex-start;
      padding: 13px 8px;
      font-size: 1rem;
      height: auto;
    }
    .table__body table {
      width: 400px;
     
    }
    .table__body2 td,
    .table__body2 th {
      font-size: 1rem;
      padding: 4px 5px;
    }
   
  
  @media screen and (max-width: 1000px) {
    td:not(:first-of-type) {
      min-width: 12.1rem;
    }
  }
  
  
  thead th span.icon-arrow {
    display: inline-block;
    width: 1.5rem;
    height: 1.5rem;
    border-radius: 50%;
    border: 1.4px solid transparent;
    
    text-align: center;
    font-size: 1rem;
    
    margin-left: .5rem;
    transition: .2s ease-in-out;
  }
  
  thead th:hover span.icon-arrow{
    border: 1.4px solid #6c00bd;
  }
  
  thead th:hover {
    color: #932de6;
  }
  
  thead th.active span.icon-arrow{
    background-color: #6c00bd;
    color: #fff;
  }
  
  thead th.asc span.icon-arrow{
    transform: rotate(180deg);
  }
  
  thead th.active,tbody td.active {
    color: #6c00bd;
  }
  
   }
  
  
  
  input {
    width: 100%;
   border-radius: 10px;
    border: 1px solid #bdbec252;
   
    padding: 8px;
  }
  input:focus {
    outline: none;
    
  }
  input:hover {
  
  
    border: 1px solid #bdbec252;
   
   
  }
  
 .grade-btn a {
    display: inline;
    align-items: center;
    justify-content: center;
    height: 35px;
  margin: top -20px;cm;
    width: 10%;
    border: none;
    outline: none;
    color: #fff;
   font-size: 15px;
   font-weight: 500;
    border-radius: 15px;
  
    background: #696cff;
    transition: all 0.3s linear;
    cursor: pointer;
    justify-content: space-around;
  }
  .grade-btn{
    margin-left: 8cm;
    
  }
  .btn2{
    margin-left: 1cm;
  }
.bgt88{
    display: inline-block;
    background-color:  #8B73FF;
    color: white;
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
    .home__title{
  font-size: 3rem;
  font-weight: 800;
  margin-bottom:1rem;
  color: #5B5757;
}
.invalid {
    border-color: red;
}

    .home__title{
  font-size: 3rem;
  font-weight: 800;
  margin-bottom:1rem;
  color: #5B5757;
}
.invalid {
    border-color: red;
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
    .create-rq{
      margin-left: 27cm;
    }
    </style>
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
                    <li><a href="company.php" data-section="company">
                        <i class="fa-solid fa-briefcase"></i>
                            <div class="title">Company</div>
                        </a></li>
                    <li><a href="offers.php" data-section="offers">
                        <i class="fa-solid fa-address-card"></i>
                            <div class="title">Offers</div>
                        </a></li>
                        <li class="active"><a href="interns.php" data-section="offers">
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
        <span class="count" style="	position: absolute;
	top: -6px;
	right: -6px;
	width: 20px;
	height: 20px;
	border-radius: 50%;
	border: 2px solid white;
	background: #fe3232d8;
	color: white;
	font-weight: 700;
	font-size: 12px;
	display: none;
	justify-content: center;
	align-items: center;
    display: flex;"></span>
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
						$('.count').css('display', 'flex');
					} else {
						$('.count').html('');
						$('.count').css('display', 'none');
					}
				}
			});
		}

		load_unseen_notification();

		$(document).on('click', '.dt', function() {
			$('.count').html('');
			$('.count').css('display', 'none');
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
      
        <section id="home-section" class="page-section ">
        <div class="home__title" style="font-size: 1.6rem;  font-weight: 550;
  color: #0e0e0ed0;  margin-top: 0.8cm;  margin-left: 0.5cm;">Dashboard <i class='bx bx-right-arrow-alt bx-tada' style="font-size: 1.6rem;
  color:#0e0e0e8f; "></i><span style=" color: #8041f5ab;">Grades </span> </div>
       
       <div class="row"> 
      
                <a href="interns.php" class="create-rq" ><i class="fa-solid fa-arrow-left"></i>&nbsp;back</a>
        <div id="grade">
            <p>Intern 01: <span><?=$row['id_student']?></span></p>
            <input type="hidden" name="idreq" value="<?php echo $idreq; ?>">
            <div class="table__body">
                <table>
                    <thead>
                        <tr class="score-card themecar">
                            <th>Aptitudes</th>
                            <th>Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="score-card">
                            <td>Discipline  générale et relations humaines</td>
                            <td><input type="text" name="discipline" class="discipline" readonly value="<?=$row['grade1']?>" step="0.05"></td>
                        </tr>
                        <tr class="score-card">
                            <td>Aptitudes au travail et a la manipulation</td>
                            <td><input type="number" name="aptitudes" class="aptitudes" readonly value="<?=$row['grade2']?>" step="0.05"></td>
                        </tr>
                        <tr class="score-card">
                            <td>Initiative /entreprenariat</td>
                            <td><input type="number" name="initiative" class="initiative" readonly value="<?=$row['grade3']?>" step="0.05"></td>
                        </tr>
                        <tr class="score-card">
                            <td>Capacités d'imagination et d'innovation </td>
                            <td><input type="number" name="capacites" class="capacites" readonly value="<?=$row['grade4']?>" step="0.05"></td>
                        </tr>
                        <tr class="score-card">
                            <td>Connaissances  acquises sur le terrain de stage</td>
                            <td><input type="number" name="connaissances" class="connaissances" readonly value="<?=$row['grade5']?>" step="0.05"></td>
                        </tr>
                        <tr class="score-card">
                            <td>Note Finale</td>
                            <td><input type="number" name="note_finale" class="note-finale" readonly value="<?=$row['grade_finale']?>" step="0.05"></td>
                        </tr>

                    </tbody>
                </table>
                </div>
                
        </div>

</div>

                  </section> 
<br><br><br>
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


<!-- <script>
    // Sélectionnez les champs d'entrée
    const disciplineInput = document.querySelector('.discipline');
    const aptitudesInput = document.querySelector('.aptitudes');
    const initiativeInput = document.querySelector('.initiative');
    const capacitesInput = document.querySelector('.capacites');
    const connaissancesInput = document.querySelector('.connaissances');
    const noteFinaleInput = document.querySelector('.note-finale');

    // Ajoutez l'événement 'input' à chaque champ d'entrée
    disciplineInput.addEventListener('input', validateInput);
    aptitudesInput.addEventListener('input', validateInput);
    initiativeInput.addEventListener('input', validateInput);
    capacitesInput.addEventListener('input', validateInput);
    connaissancesInput.addEventListener('input', validateInput);

    function validateInput() {
        const inputs = [
            disciplineInput,
            aptitudesInput,
            initiativeInput,
            capacitesInput,
            connaissancesInput
        ];

        inputs.forEach(input => {
            const value = parseFloat(input.value);
            if (isNaN(value) || value < 0 || value > 4) {
                input.classList.add('invalid');
            } else {
                input.classList.remove('invalid');
            }
        });

        calculerNoteFinale();
    }

    function calculerNoteFinale() {
        const discipline = parseFloat(disciplineInput.value) || 0;
        const aptitudes = parseFloat(aptitudesInput.value) || 0;
        const initiative = parseFloat(initiativeInput.value) || 0;
        const capacites = parseFloat(capacitesInput.value) || 0;
        const connaissances = parseFloat(connaissancesInput.value) || 0;

        const noteFinale = discipline + aptitudes + initiative + capacites + connaissances;

        noteFinaleInput.value = noteFinale.toFixed(2);
    }
</script> -->



</body>
</html>
<?php 
                }else{
                     header("Location: ../login.php");
                     exit();
                }}
                 ?>
 
<?php
include "../../config/conn.php";
session_start();

$img_folder = '../img/';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_SESSION['emailst'];
    $department = $_POST['departement'];
    $birthday = $_POST['bd'];
    $speciality = $_POST['speciality'];
    $level = $_POST['level'];
    $duration = $_POST['dur'];
    $acyear = $_POST['year'];

    if (isset($_FILES['pp']['name']) AND !empty($_FILES['pp']['name'])) {
         
        $img_name = $_FILES['pp']['name'];
        $tmp_name = $_FILES['pp']['tmp_name'];
        $error = $_FILES['pp']['error'];
        
        if($error === 0){
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_to_lc = strtolower($img_ex);
    
            $allowed_exs = array('jpg', 'jpeg', 'png');
            if(in_array($img_ex_to_lc, $allowed_exs)){
                $new_img_name = uniqid($uname, true).'.'.$img_ex_to_lc;
                $img_upload_path = '../img/'.$new_img_name;
                
                if (!is_dir('img')) {
                    mkdir('img');
                }
               
                $old_pp = $_SESSION['pst'];
                if (!empty($old_pp)) {
                    $old_pp_des = "../img/$old_pp";
                    if(unlink($old_pp_des)){
                        
                    }else {
                        
                    }
                }
                move_uploaded_file($tmp_name, $img_upload_path);
        
    
             
              $sql = "UPDATE student SET firstname_student='$fname',lastname_student='$lname', birthday_student='$birthday', dep_student='$department', speciality_student='$speciality', level_student='$level', semester_student='$duration', acyear_student='$acyear', profile_student='$new_img_name' WHERE email_student='$email'";
             

              $result = mysqli_query($conn, $sql);

              if ($result) {
                  $sql2 = "SELECT * FROM student WHERE email_student='$email'";
                  $result2 = mysqli_query($conn, $sql2);
          
                  if (mysqli_num_rows($result2) === 1) {
                      $row = mysqli_fetch_assoc($result2);
                      $_SESSION['idst'] = $row['id_student'];
                      $_SESSION['fnamest'] = $row['firstname_student'];
                      $_SESSION['lnamest'] = $row['lastname_student'];
                      $_SESSION['birthdayst'] = $row['birthday_student'];
                      $_SESSION['levelst'] = $row['level_student'];
                      $_SESSION['semesterst'] = $row['semester_student'];
                      $_SESSION['yearst'] = $row['acyear_student'];
                      $_SESSION['pst'] = $row['profile_student'];
                      $_SESSION['emailst'] = $row['email_student'];
                      $_SESSION['sepst'] = $row['speciality_student'];
                      $_SESSION['depst'] = $row['dep_student'];
                      header("Location: ../index.php?flsql2");
                      exit();
                  } else {
                      header("Location: ../index.php?flsql3");
                      exit();
                  }
              } 


             
           }else {
             
              header("Location: ../index.php?error=You can't upload files of this type");
              exit;
           }
        }else {
          
           header("Location: ../index.php?error=unknown error occurred!");
           exit;
        }

       
     }else {
        $sql = "UPDATE student SET firstname_student='$fname',lastname_student='$lname', birthday_student='$birthday', dep_student='$department', speciality_student='$speciality', level_student='$level', semester_student='$duration', acyear_student='$acyear' WHERE email_student='$email'";
     
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $sql2 = "SELECT * FROM student WHERE email_student='$email'";
        $result2 = mysqli_query($conn, $sql2);

        if (mysqli_num_rows($result2) === 1) {
            $row = mysqli_fetch_assoc($result2);
            $_SESSION['idst'] = $row['id_student'];
            $_SESSION['fnamest'] = $row['firstname_student'];
            $_SESSION['lnamest'] = $row['lastname_student'];
            $_SESSION['birthdayst'] = $row['birthday_student'];
            $_SESSION['levelst'] = $row['level_student'];
            $_SESSION['semesterst'] = $row['semester_student'];
            $_SESSION['yearst'] = $row['acyear_student'];
            $_SESSION['pst'] = $row['profile_student'];
            $_SESSION['emailst'] = $row['email_student'];
            $_SESSION['sepst'] = $row['speciality_student'];
            $_SESSION['depst'] = $row['dep_student'];
            header("Location: ../index.php?flsql2");
            exit();
        } else {
            header("Location: ../index.php?flsql3");
            exit();
        }
    } 




     }
   }else {
   header("Location: ../index.php?error=error");
   exit;
}
 ?>

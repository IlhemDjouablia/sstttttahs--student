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
    <link rel="stylesheet" href="css/cards.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    

<style>
  
.a-container a {
  color: #555;
  font-size: 1.2rem;
  text-decoration: none;
  text-transform: uppercase;
}

.a-container h1 {
  text-transform: uppercase;
  margin: 0;
  padding: 0;
  font-size: 2rem;
  text-shadow: 1px 1px 1px rgba(255, 255, 255, 0.8);
  font-weight: 600;
  color: #999;
  margin-bottom: 1cm;
  margin-top: -1cm;
}
#offers{

justify-content: center;
align-items: center;


}

.a-container {
  width: 100%;
  margin: 20px ;
  padding: 20px 0;
  justify-content: center;
}

.o-card_container {
  position: relative;
  z-index: 1;
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  -webkit-flex-flow: row wrap;
  justify-content:space-between;
  width: 110%;
  height: 85%;
}
.o-card_container.isOpen {
  -webkit-filter: blur(5px);
  filter: blur(5px);
}

.o-card {
  width: 100%;
  max-width: 300px;
  min-width: 300px;
  box-shadow: 0 0 0.375rem 0.25rem rgba(157, 171, 187, 0.322);
  background:#ffffff ;
  justify-content: center;
  -webkit-border-radius: 4px;
  align-items: center;
  border-radius: 10px ;
  background-clip: padding-box;
  /* stops bg color from leaking outside the border: */
  overflow: hidden;
  margin: 20px 0;
  transition: all 0.4s;
  vertical-align: middle;
  position: relative;
  z-index: 1;
  padding: 0;
  align-self: center; 
}
.o-card.isOpenIng {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -100%);
  opacity: 0;
  z-index: 100000 !important;
}
.o-card.isOpen {
  transform-origin: center top;
  transform: translate(-50%, -50%);
  box-shadow: 0px 0 40px rgba(0, 0, 0, 0.3) !important;
  opacity: 1;
}
.o-card::before {
  content: "";
  top: 0;
  right: auto;
  bottom: auto;
  left: 50%;
  position: absolute;
  width: 0;
  height: 2px;
  background-color: #2c4de0;
  z-index: 1111;
  transition: all 0.4s;
}
.a-loader {
  position: absolute;
  bottom: 0;
  left: 0;
  z-index: 12000000;
  margin: 0;
  width: 100%;
  height: 6px;
  background-color: #d075ec;
  display: none;
}

.a-loader__bar {
  content: "";
  display: inline;
  position: absolute;
  width: 0;
  height: 100%;
  left: 50%;
  text-align: center;
}

.a-loader__bar:nth-child(1) {
  background-color: #da4733;
  animation: loading 1s linear infinite;
}

.a-loader__bar:nth-child(2) {
  background-color: #3b78e7;
  animation: loading 1s linear 0.3s infinite;
}

.a-loader__bar:nth-child(3) {
  background-color: #fdba2c;
  animation: loading 1s linear 0.6s infinite;
}
@keyframes loading {
  from {
    left: 50%;
    width: 0;
    z-index: 100;
  }
  33.3333% {
    left: 0;
    width: 100%;
    z-index: 10;
  }
  to {
    left: 0;
    width: 100%;
  }
}
.o-modal {
  position: absolute;
  width: 100%;
  height: 1px;
  bottom: 0;
  left: 50%;
  transform: translate(-50%, 70%);
  transition: all 1s;
  z-index: 1111110;
  padding: 15px;
  opacity: 0;
}
.o-modal::after {
  content: "";
  position: absolute;
  top: 50%;
  left: 0;
  width: 10px;
  margin: 0px 0 0 -5px;
  height: 10px;
  transform-origin: center;
  background: rgba(255, 255, 255, 0.97);
  transition: all 1s;
  z-index: 1;
  border-radius: 50%;
}
o-modal.isOpen {
  width: 100%;
  height: 100%;
  opacity: 1;
  left: 0;
  transform: translate(0, 0);
}
.o-modal.isOpen::after {
  width: 1000px;
  height: 1000px;
  left: 50%;
  margin: -500px 0 0 -500px;
}

.o-modal__close {
  position: absolute;
  top: -1500px;
  right: 5px;
  font-size: 2rem;
  color: #555;
  cursor: pointer;
  z-index: 5;
  transition: all 1s;
}

.o-modal.isOpen .o-modal__close {
  top: 5px;
}

.o-modal__title {
  font-size: 1.8rem;
  background: none;
  font-weight: 600;
  display: block;
  line-height: 1;
  margin: -15px -15px 0 -15px;
  padding: 10px 15px;
  border-bottom: 1px solid #ccc;
  position: relative;
  z-index: 4;
}

.o-modal__inner {
  overflow-y: auto;
  height: calc( 100% - 40px );
  opacity: 0;
  padding: 5px;
  transition: all 1.4s;
  position: relative;
  z-index: 4;
}

.o-modal.isOpen .o-modal__inner {
  opacity: 1;
  transition-delay: 1.4s;
}
.o-card_header {
  position: relative;
  width: 100%;
  height: 180px;
  background: rgba(223, 8, 8, 0.5);
  overflow: hidden;
  transition: all 0.7s;
  -webkit-background-clip: padding-box;
  -moz-border-radius: 360px;
}
.o-card_header::after {
  content: "";
  position: absolute;
  bottom: -12px;
  left: -2%;
  width: 104%;
  height: 30px;
  background-color: #8041f5ab;
  z-index: 1220;
  transform: skew(0, -3deg);
  transition: all 0.6s;
}
.o-card_header::before {
  content: "";
  position: absolute;
  bottom: -12px;
  left: -2%;
  width: 104%;
  height: 30px;
  background-color:rgb(255, 255, 255);
  box-shadow: 0 0 2px rgba(0, 0, 0, 0.5);
  z-index: 1221;
  transform: skew(0, 2deg);
  transition: all 0.6s;
}

.o-card_headerHeroImg {

  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  position: absolute;
  transition: 0.4s;
  transform-origin: center center;
  transform: scale(1, 1);
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 0;
  
}
.o-card_headerHeroImg::after {
  content: "";
  position: absolute;
  top: -20%;
  left: -20%;
  width: 140%;
  height: 140%;
 
  transform: skew(0, 2deg);
  transition: 0.4s;
  opacity: 0;
}


.o-card_logo {
  position: absolute;
  z-index: 2;
  width: 80px;
  height: 80px;
  box-shadow: 2px 2px 1px 0 rgba(0, 0, 0, 0.2);
  transition: all 0.5s;
  -webkit-border-radius: 50%;
  border-radius: 50%;
  background-clip: padding-box;
  /* stops bg color from leaking outside the border: */
  top: 10px;
  left: 10px;
  transform-origin: center center;
  transform: translate(0, 0) scale(1, 1);
  overflow: hidden;
  background-size: cover !important;
}
.o-card_logo.isOpen {
  /*box-shadow: 0 0 0 8px rgba(255, 255, 255, 0.5);*/
  box-shadow: 0 0 0 800px rgba(255, 255, 255, 0.6);
  transform: translate(-140%, 0) scale(1, 1);
}

.o-card:hover .o-card_logo {
  transform: translate(0, 0) scale(0.8, 0.8);
}

.o-card:hover .o-card_logo.isOpen {
  transform: translate(-140%, 0) scale(1, 1);
}
.o-card-headerList {
  width: 100%;
  height: auto;
  transition: all 0.4s;
  margin: 0;
  padding: 0;
  position: absolute;
  z-index: 3;
  left: 0;
  top: 0;
  border-spacing: 5px;
  list-style: none;
}

.o-card-headerList--openIcons {
  position: absolute;
  top: 10px;
  right: 10px;
  width: 20px;
  height: 40px;
  -webkit-border-radius: 4px;
  border-radius: 4px;
  background-clip: padding-box;
  /* stops bg color from leaking outside the border: */
  background: rgba(120, 122, 230, 0.3);
  z-index: 6;
  cursor: pointer;
  transition: all 0.4s;
}
.o-card-headerList--openIcons span {
  position: absolute;
  top: 0;
  left: 50%;
  margin: 0 0 0 -3px;
  width: 6px;
  height: 6px;
  background: #fff;
  box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.3);
  transition: all 0.8s;
  transform-origin: center;
  -webkit-border-radius: 50%;
  border-radius: 50%;
  background-clip: padding-box;
  /* stops bg color from leaking outside the border: */
}
.o-card-headerList--openIcons span:nth-child(1) {
  top: 6px;
}
.o-card-headerList--openIcons span:nth-child(2) {
  top: 17px;
}
.o-card-headerList--openIcons span:nth-child(3) {
  top: 28px;
}

.o-card-headerList.isOpen .o-card-headerList--openIcons {
  width: 40px;
  -webkit-border-radius: 50%;
  border-radius: 50%;
  background-clip: padding-box;
  /* stops bg color from leaking outside the border: */
}
.o-card-headerList.isOpen .o-card-headerList--openIcons span {
  -webkit-border-radius: 0;
  border-radius: 0;
  background-clip: padding-box;
  /* stops bg color from leaking outside the border: */
  box-shadow: 1px 1px 1px rgba(0, 0, 0, 0);
  margin: 0 0 0 -13px;
  top: 20px;
}
.o-card-headerList.isOpen .o-card-headerList--openIcons span:nth-child(1) {
  width: 26px;
  height: 2px;
  transform: rotate(45deg);
}
.o-card-headerList.isOpen .o-card-headerList--openIcons span:nth-child(2) {
  opacity: 0;
  left: -250%;
}
.o-card-headerList.isOpen .o-card-headerList--openIcons span:nth-child(3) {
  width: 26px;
  height: 2px;
  transform: rotate(-45deg);
}

.o-card-headerList--item {
  position: absolute;
  top: 10px;
  right: 0;
  width: 40px;
  height: 40px;
  transform: scale(0.15, 0.15);
  line-height: 40px;
  text-align: center;
  font-size: 1.5rem;
  background: rgba(120, 93, 245, 0.8);
  box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
  -webkit-border-radius: 50%;
  border-radius: 50%;
  background-clip: padding-box;
  /* stops bg color from leaking outside the border: */
  transition: all 0.4s;
  opacity: 1;
  margin: 0;
  padding: 0;
  z-index: 5;
}
.o-card-headerList.isOpen .o-card-headerList--item {
  opacity: 1;
  transform: scale(1, 1);
}
.o-card-headerList.isOpen .o-card-headerList--item:nth-child(2) {
  right: 55px;
  transition-delay: 0.1s;
}
.o-card-headerList.isOpen .o-card-headerList--item:nth-child(3) {
  right: 100px;
  transition-delay: 0.15s;
}
.o-card-headerList.isOpen .o-card-headerList--item:nth-child(4) {
  right: 145px;
  transition-delay: 0.2s;
}
.o-card-headerList.isOpen .o-card-headerList--item:nth-child(5) {
  right: 190px;
  transition-delay: 0.25s;
}

.o-card-headerList--item:hover {
  background: #109bce;
  color: white;
}

.o-card-headerList--link {
  color: #555;
  font-size: 1rem;
  transition: all 0.3s;
  display: block;
}
.o-card-headerList--link:hover {
  color: #fff;
  transform: scale(1.2, 1.2);
}
.o-card_body {
  width: 100%;
  height: auto;
  display: block;
  margin: -5px 0 0 0;
  padding: 0 30px 30px 30px;
  position: relative;
  background: #ffffff;
  transition: all 0.3s;
}

.o-card_title, .o-card_subTitle {
  margin: 0;
  padding: 5px 0 5px 5px;
  border-bottom: 1px solid #f1f1f1;
  font-size: 1.4rem;
  font-weight: 400;
}

.o-card_title {
  font-size: 1.8rem;
  background: none;
  font-weight: 600;
  display: block;
}
.o-card_paragraph {
  margin: 0;
  padding: 5px;
  font-size: 1.2rem;
  line-height: 1.3;
  transition: all 0.4s;
  opacity: 1;
  position: relative;
  max-height: 3rem;
  overflow: hidden;
}
.o-card_paragraph::after {
  content: "";
  width: 100%;
  max-height: 200rem;
  position: absolute;
  bottom: 0;
  left: 0;
  height: 3rem;
  background: -webkit-linear-gradient(90deg, #f9f9f9 0, rgba(255, 255, 255, 0) 100%);
  background: linear-gradient(0deg, #f9f9f9 0, rgba(255, 255, 255, 0) 100%);
}
.o-card_paragraph.isToggle {
  max-height: 500px;
}
.o-card_paragraph.isToggle::after {
  background: none;
}

.a-more {
  color: #757275;
  font-weight: 700;
  font-size: 1.8rem;
  position: absolute;
  right: 10px;
  bottom: 25px;
  width: 30px;
  height: 30px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 0 2px rgba(0, 0, 0, 0.1);
  cursor: pointer;
  transition: all 0.5s;
}
.a-more::after {
  content: "➕";
  font-family: entypo;
}
.a-more.isActive::after {
  content: "➖";
}
.a-more:hover {
  transform: scale(1.2, 1.2);
  color: #109bce;
}

.morecontent span {
  display: none;
}

.morelink {
  display: block;
}

.o-card.isOpen .o-card_subTitle, .o-card.isOpen .o-card_paragraph {
  display: block;
}
.o-card:hover {
  box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1), 0 10px 15px rgba(0, 0, 0, 0.1);
}
.o-card:hover .o-card_headerHeroImg {
  transform: scale(1.2) rotate(-2deg);
  opacity: 1;
}
.o-card:hover .o-card_headerHeroImg::after {
  opacity: 0.4;
}
.o-card.isOpen .o-card_header {
  height: 150px;
}
.o-card.isOpen .o-card_headerHeroImg {
  transform: scale(1, 1);
  opacity: 1;
}
.o-card.isOpen .o-card_logo {
  top: 10%;
  transform: translate(0, 0) scale(1, 1);
}
.o-card.isOpen::before {
  width: 100%;
  left: 0;
}
.o-card:hover::before {
  width: 100%;
  left: 0;
}
@media only screen and (min-width: 1200px) {
  h1 {
    font-size: 2.5rem;
  }

  .a-container {
    width: 900px;
    align-items: center;
    justify-content: center;
  }

  .o-card {
    width: 31.333%;
    margin: 20px 1%;
  }
  .row-OFF{


    justify-content: center;
  align-items: center;
  }
  

  .o-card-headerList::before {
    bottom: -15px;
    border-width: 0 0 15px 400px;
  }
}
@media only screen and (min-width: 768px) and (max-width: 1200px) {
  h1 {
    font-size: 2rem;
  }

  .a-container {
    width: 100%;
    align-items: center;
    justify-content: center;
  }
  
  
  .o-card {
    width: 48%;
    margin: 20px 1%;
margin-left: 6cm;
  }
  .row-OFF{


    justify-content: center;
  align-items: center;
  }
  
}


.o-card_footer {
  width: 100%;
  background: #ffffff;
   border: 1px solid #e7e4e4;
  padding: 10px 10px 20px 10px;
  text-align: right;
  position: relative;
  display: inline-block;
  vertical-align: bottom;
}
.o-card_footer::after {
  content: "";
  position: absolute;
  top: -10px;
  left: 0;
  width: 100%;
  height: 20px;
  background-color: #efe5f8;
  z-index: 1;
  transform: skew(0, -2deg);
  transition: all 0.6s;
}

.a-readMore {
  width: 100%;
  height: auto;
  display: inline-block;
 
  font-size: 16px;
  font-weight: bolder;
  color: #fff;
  text-decoration: none;
  text-transform: uppercase;
  text-align: center;
  
  padding: 15px 0;
  margin-left: auto;
  margin-right: auto;
  left: 0;
  position: relative;
  cursor: pointer;
  z-index: 3;
  border: none;
  border-radius: 5px;
  background: #8041f5ab;
  box-shadow: inset 0px 1px 0px #ffffff, 0px 1px 0px 0px #ffffff, 0px 4px 6px rgba(255, 255, 255, 0.2);
  transition: all 0.5s;
}
.a-readMore:hover, .a-readMore:active {
  top: 0;
  box-shadow: inset 0px 1px 0px #7910ce, 0px 2px 0px 0px #995cdf, 0px 4px 1px rgba(236, 194, 248, 0.2);
}

.o-wtfModal {
  position: fixed;
  width: 100%;
  height: 100%;
  left: 0;
  top: -300px;
  opacity: 1;
  background: url(https://s3.eu-west-2.amazonaws.com/pirolab/images/circle.svg) no-repeat;
  background-position: center -10px;
  background-size: 300px 300px;
  opacity: 0.5;
  z-index: 100000;
  transition: all 0.5s;
  display: none;
}
.o-wtfModal.isOpenIng {
  display: block;
}
.o-wtfModal.isOpen {
  position: fixed;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  opacity: 1;
  background-position: center center;
  background-size: 500% 500%;
}

.o-wtfModal_close {
  position: fixed;
  top: 10px;
  right: 10px;
  width: 46px;
  height: 46px;
  text-align: center;
  font-size: 4rem;
  color: #109bce;
  opacity: 0;
  transition: all 1s;
  cursor: pointer;
}
.o-wtfModal_close::before, .o-wtfModal_close::after {
  content: "";
  position: absolute;
  top: 50%;
  left: 0;
  width: 100%;
  height: 2px;
  -webkit-border-radius: 2px;
  border-radius: 2px;
  background-clip: padding-box;
  /* stops bg color from leaking outside the border: */
  text-align: center;
  font-size: 4rem;
  background: #109bce;
  transform: rotate(0) translate(0, -50%);
  transition: all 0.5s;
}

@media screen and (min-width: 768px) {
  .o-wtfModal_close {
    width: 66px;
    height: 66px;
  }
}
.o-wtfModal.isOpen .o-wtfModal_close {
  opacity: 1;
}
.o-wtfModal.isOpen .o-wtfModal_close::after {
  transform: rotate(-45deg);
  width: 100%;
}
.o-wtfModal.isOpen .o-wtfModal_close::before {
  transform: rotate(45deg);
  width: 100%;
}
.o-wtfModal.isOpen .o-wtfModal_close:hover {
  transform: scale(0.8, 0.8);
}

@font-face {
  font-family: "entypo";
  src: url("https://s3.eu-west-2.amazonaws.com/pirolab/icons/entypo.eot");
  src: url("https://s3.eu-west-2.amazonaws.com/pirolab/icons/entypo.eot?#iefix") format("embedded-opentype"), url("https://s3.eu-west-2.amazonaws.com/pirolab/icons/entypo.woff") format("woff"), url("https://s3.eu-west-2.amazonaws.com/pirolab/icons/entypo.ttf") format("truetype"), url("https://s3.eu-west-2.amazonaws.com/pirolab/icons/entypo.svg#entypo") format("svg");
  font-weight: normal;
  font-style: normal;
}
[class^=icon-], [class*=" icon-"] {
  font-family: entypo;
  font-style: normal;
  /* font-size: 14px; */
  display: inline-block;
  width: 1.1em;
  margin-right: 0.1em;
  text-align: center;
}

.the-icons li {
  font-size: 14px;
  line-height: 24px;
  height: 24px;
}

.box-search6{
  max-width: 400px;
  width: 100%;
  margin-bottom: -3cm;
  margin-left: 6.6cm;
}
.box-search6 .search-box6{
  position: relative;
  height: 50px;
  max-width: 50px;
  margin: auto;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.11);
  border-radius: 25px;
  transition: all 0.3s ease;
}
#check:checked ~ .search-box6{
  max-width: 380px;
}
.search-box6 input{
 position: absolute;
 height: 100%;
 width: 100%;
 border-radius: 25px;
 background: #f2ebf5;
 outline: none;
 border: none;
 padding-left: 20px;
 font-size: 15px;
}
.search-box6 .icon{
  position: absolute;
  right: -2px;
  top: 0;
  width: 50px;
  background: #f7eefa;
  height: 100%;
  text-align: center;
  line-height: 50px;
  color: #676aff;
  font-size: 17px;
  border-radius: 25px;
}
#check:checked ~ .search-box6 .icon{
  background: #9584f5;
  color: #FFF;
  width: 60px;
  border-radius: 0 25px 25px 0;
}
#check{
  display: none;
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
                                <li ><a href="request.php"><i class="fa-solid fa-paper-plane" style="font-size: 1.7rem;"></i>Request</a></li>
                                <li><a href="acc.php"><i class='bx bx-check-circle' style="font-size: 2rem;"></i>Accepted</a></li>
                                <li><a href="ref.php"> <i class='bx bx-x-circle' style="font-size: 2rem;"></i>Refused</a></li>
                            </ul>
                        </li>
                   
                    <li class="active"><a href="offers.php" data-section="offers">
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
                    <i class="fa-solid fa-magnifying-glass fa-beat" style="  color: #8041f5ab;"></i>
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
            </div>      </header>        
            <section id="" class="page-section ">
            <div class="home__title" style="font-size: 1.6rem;
  color: #0e0e0ed0;  margin-top: 0.8cm;  margin-left: 0.5cm;">Dashboard <i class='bx bx-right-arrow-alt bx-tada' style="font-size: 1.6rem;
  color:#0e0e0e8f; "></i><span style=" color: #8041f5ab;">Internship offers</span> </div>

<div class="offers2"  style="margin-right: 2cm;">
        <div class="row">
        <div class="a-container">
        <div class="box-search6">
         <input type="checkbox" id="check">
         <div class="search-box6">
           <input type="text" placeholder="search...">
           <label for="check" class="icon">
            <i class="fa-solid fa-magnifying-glass "></i>
           </label>
         </div>
       </div>
       </div>
       </div>
        <div class="row" >
        <div class="a-container">
<div class="o-card_container">
     
   <?php 

        $sql = "SELECT * from offer ";
        $result = mysqli_query($conn, $sql);  
       
        while($row = mysqli_fetch_array($result))  
   {  ?>
           	

<div class="o-card" >
         <div class="o-card_header">
            <div class="o-card_headerHeroImg"  data-image="../head/img/<?=$row['p_comp']?>"></div>
            <ul class="o-card-headerList">
               <li class="o-card-headerList--openIcons ">
                  <span></span>
                  <span></span>
                  <span></span>
               </li>
               <li class="o-card-headerList--item">
                  <a class="o-card-headerList--link" href="" target=_blank><i class="icon-facebook"></i></a>
               </li>
               <li class="o-card-headerList--item">
                  <a class="o-card-headerList--link" href="" target=_blank><i class="icon-linkedin"></i></a>
               </li>
            </ul>
            <div class="o-card_logo" style="background:url(../head/img/<?=$row['p_comp']?>) center no-repeat;"></div>
         </div>
         <div class="o-card_body">
            <h3 class="o-card_title"><?=$row['intern_name']?></h3>
            <h6 class="o-card_subTitle"><?=$row['name_comp']?></h6>
            <h6 class="o-card_subTitle"></h6>

            <p class="o-card_paragraph">Description :
                    Nous recherchons un(e) stagiaire pour rejoindre notre équipe de développement de logiciels. Vous aurez l'opportunité de travailler sur des projets passionnants et d'acquérir une expérience pratique dans un environnement professionnel.
                    
                    Tâches :
                    
                    Participer au développement et à la maintenance de logiciels
                    Travailler en étroite collaboration avec l'équipe de développement pour assurer la qualité et l'efficacité des projets
                    Participer à la résolution de problèmes et à la mise en œuvre de nouvelles fonctionnalités
                    Compétences requises :
                    
                    Connaissance de langages de programmation tels que Java, Python ou C++
                    Compétences en résolution de problèmes et en dépannage
                    Capacité à travailler en équipe et à communiquer efficacement
                    Durée du stage : 3 à 6 mois
                    
                    Si vous êtes intéressé(e) par ce stage, veuillez envoyer votre CV et une lettre de motivation à [adresse email ou lien vers la page de candidature en ligne]
                 </p>
         </div>
         <div class="o-card_footer">
            <a href="back/offerback.php?id=<?=$row['id_offer']?>" class="a-readMore" data-modal="#first">Participate<i class="icon-right"></i></a>
         </div>
         <div class="o-modal">
            <span class="o-modal__close">
            <i class="icon-cancel-circled"></i>
            </span>
            <h2 class="o-modal__title"></h2>
            <div class="o-modal__inner"></div>
         </div>
         <div class="a-loader">
            <div class="a-loader__bar"></div>
            <div class="a-loader__bar"></div>
            <div class="a-loader__bar"></div>
         </div>
      </div>
      <?php
           
          
        } ?>
      
     </div>
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
 $(window).on("load", function() {
  //console.log(view);
  $(".o-card_headerHeroImg").each(function() {
    var bg = $(this).attr("data-image");
    $(this).css({ "background-image": "url(" + bg + ")" });
  });

  $(document).on("click touch", ".o-card-headerList--openIcons", function(e) {
    $(this).parent().toggleClass("isOpen");
    $(this).parent().next().toggleClass("isOpen");
    var btnOffset = $(this).offset(),
    xPos = e.pageX - btnOffset.left,
    yPos = e.pageY - btnOffset.top;
    //console.log(xPos +' / '+ yPos);
    return false;
  });
  
  $(document).on("click touch", ".o-card-headerList li", function(e) {
    e.stopPropagation();
    return false;
  });
  
  $(document).on("click touch", function() {
    $(".o-card-headerList,.o-card_logo").removeClass("isOpen");
  });
  
  $('.o-card_paragraph').each(function(){
    var _this = $(this);
    var pHeight = _this.height();
    console.log(pHeight);
    _this.after('<span class="a-more"></span>')
  });
  
  $(document).on( 'click' , '.a-more' , function(){
    $(this).prev('p').toggleClass('isToggle');
    $(this).toggleClass('isActive');
  });
  
  $('.are').on('click touch', function(event) {
    event.preventDefault();
    $(id_target).find('.o-modal__close').attr('data-close','');
    var this_target = $(this).attr('data-href');
    var _this = $(this);
    var id_target = '#'+this_target.replace(/\./g,'');
    console.log(id_target);
    $(id_target).find('.a-loader').show();
    $(id_target).find('.o-modal__close').attr('data-close',id_target);
    
    $.ajax({
        url: 'https://en.wikipedia.org/w/api.php',
        data: {
            format: 'json',
            action: 'parse',
            page: this_target,
            prop:'text',
            section:0,
        },
        dataType: 'jsonp',
        success: function (data) {
        //console.log(data)
        $(id_target).find('.o-modal__inner').html('');
        $(id_target).find('.o-modal__title').html('').hide();    
        $(id_target).find('.o-modal').addClass('isOpen');
        if(!$(id_target).find('.a-more').hasClass('isActive')){
            $(id_target).find('.a-more').trigger('click');
         }
        var markup = data.parse.text['*'];
        var i = $('<div></div>').html(markup);
        i.find('a').each(function() { $(this).replaceWith($(this).html()); });
        i.find('sup').remove();
        i.find('.mw-ext-cite-error').remove();
         setTimeout(function() {
            $(id_target).find('.o-modal__title').html( data.parse.title).fadeIn(300);
            $(id_target).find('.o-modal__inner').html($(i).find('p'));
            $(id_target).find('.a-loader').hide();
          }, 1000);
        }
    });
  });
  
  $('.o-modal__close').on('click touch', function(){
    var close_target = $(this).attr('data-close');
    $(close_target).find('.o-modal').removeClass('isOpen');
    $(close_target).find('.o-modal__inner').html('');
    $(close_target).find('.o-modal__title').html('').hide();       
    $(close_target).find('.a-more').trigger('click');
  });
  
});

</script>
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
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php
     session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Change Password</title>
        
        <head>
        <meta charset="UTF-8">
        <title>Login Page</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="style.css">
    </head>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body , input{
            font-family:Arial, Helvetica, sans-serif;
        }
        
        body{
            
            background:url(./images.png)no-repeat;
            background-position: center;
            background-size: cover;
        }

        .container{
            position: relative;
            width: 100%;
            min-height: 100vh;
            background-color: #fff;
            overflow: hidden;
        }

        .container:before{
            content: '';
            position: absolute;
            width: 2000px;
            height: 2000px;
            border-radius: 50%;
            background: linear-gradient(-45deg,#056df5,#0aa9ff);
            top: -10%;
            right: 48%;
            transform: translateY(-50%);
            z-index: 6;
        }

        .forms-container{
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }

        .login{
            
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 50%;
            display: grid;
            grid-template-columns: 1fr;
            z-index: 5;
        }


        form{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 5rem;
            overflow: hidden;
            grid-column: 1 / 2;
            grid-row: 1 / 2;;
        }

        form.Login-form{
            z-index: 2;
        }

        .title{
            font-size: 2.2rem;
            color: #444;
            margin-bottom: 10px;
        }

        .input-field{
             text-align: center;
            max-width: 380px;
            width: 100%;
            height: 55px;
            background-color: #f0f0f0;
            margin: 10px 0;
            border-radius: 55px;
            display: grid;
            grid-template-columns: 15% 85%;
            padding: 0 .4rem;
        }

        .input-field i{
            text-align: center;
            line-height: 55px;
            color: #acacac;
            font-size: 1.1rem;
        }

        .input-field input{
             
            background: none;
            outline: none;
            border: none;
            line-height: 1;
            font-weight: 600;
            font-size: 1.1rem;
            color: #333;
        }  

        .input-field input::placeholder{
            color: #aaa;
            font-weight: 500;
        }

        .btn{
            width: 200px;
            height: 49px;
            border: none;
            outline: none;
            border-radius: 49px;
            cursor: pointer;
            background-color: #5995fd;
            color: #fff;
            text-transform: uppercase;
            font-weight: 600;
            margin: 10px 0;
            transition: .5s;
        }

        .btn:hover{
            background-color: #4d84e2;
        }
        .forgot-btn{
            text-align: right;
        }
        .forgot-btn button{
            text-align: right;
            border: none;
            background-color: transparent;
            outline: none;
            font-weight: 450;
            cursor: pointer;
        }


        .panels-container{
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: #fff;
            display: grid;
            grid-template-columns: repeat(2,1fr);
        }

        .panel{
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            justify-content: space-around;
            text-align: center;
            z-index: 7;
        }

        .panel .content{
            color: #fff;
        }

        .panel h3{
            font-weight: 600;
            line-height: 1;
            font-size: 1.5rem;
        }

        .left-panel{
            pointer-events: all;
            padding: 3rem 17% 2rem 12%;
        }
        
    </style>
   
    <body>
         <div class="forms-container">
                <div class="login">

                    <form action="" class="Login-form">
                        <h2 class="title">Change Password</h2>
                       
                        <div class="input-field">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" name="txtcurrent  " placeholder="Enter Current Password" required>
                        </div>
                        <div class="input-field">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" name="txtnew" placeholder="Enter New Password" required>
                        </div>
                        <div class="input-field">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" name="txtconfirm" placeholder="Enter Confirm Password" required>
                        </div>
                       
                       
                       
                         <input type="submit" name="btnchnage" value="Change Password" class="btn solid">
                        
                      

                       
                    </form>
                    
                </div>
            </div>
        <?php
         
        // put your code here
        ?>
    </body>
</html>

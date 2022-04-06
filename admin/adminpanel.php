<!DOCTYPE html>
<html>
    <head>
        <title>Admin Panel</title>
    </head>
    <body>
<?php
    include_once 'adminheader.php'
?>
    <section class="container">
        <div class ="side-bar" id="sidebar">
            <div class="dash-title">
                Admin Panel
            </div>
            <div class="list">
                <div class ="icon-divider">
                    <div class="icons"><p>Dashboard(WIP)</p></div>
                </div>
                <div class ="icon-divider">
                    <div class="icons" onclick="location.href='adminbook.php';"><p>Books</p></div>
                </div>
                <div class ="icon-divider">
                    <div class="icons" ><p>Journals(WIP)</p></div>
                </div>
                <div class ="icon-divider">
                    <div class="icons"><p>Discs(WIP)</p></div>
                </div>
                <div class ="icon-divider">
                    <div class="icons"><p>Electronics(WIP)</p></div>
                </div>
                <div class ="icon-divider">
                    <div class="icons" onclick="location.href='adminuser.php';"><p>Users</p></div>
                </div>
                <div class ="icon-divider">
                    <div class="icons"><p>Loans(WIP)</p></div>
                </div>
                <div class ="icon-divider">
                    <div class="icons" onclick="location.href='adminrequests.php';"><p>Requests</p></div>
                </div>
                <div class ="icon-divider">
                    <div class="icons" onclick="location.href='restore.php';"><p>Restore Items</p></div>
                </div>
            </div>
            <div class="list-bottom">
                Currently logged in as: 
            </div>
        </div>
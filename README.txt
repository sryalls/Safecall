Contents 

1. Overview
2. Code
3. Documentation


1.Overview

This repository is for a mothballed web application intended for a proto-charity called Safe Call.

The intended purpose of the charity was to administer a network of volunteers to provide check-in phone calls to people who requested them. The purpose of the intended application was to facilitate this administration. The project went through an analysis and requirements gathering phase and an early prototyping phase before the establishment of the charity was put on indefinite hiatus. 



2.Code

The system is written in php, javascript and mysql. 

index.php is not the start point of the code. It was intended to become thus but work started creating a branch (the admin_page section) initially to quickly prototype the interface of a main chunk of the functionality. At this point "admin_page/admin_page.php" should be considered the starting point. 

The system as is displays volunteers and calls which exist in the database and allows the editing of volunteer details. At this point admin_page.php needs to be refreshed to show changes in the main display table. Clicking on an entry in the main display table. will brinng up the more detailed editing form for the volunteer. 



3.Documentation

In the documentation folder are the results of the analysis and requirements gathering. This process took place with the cooperation of prospective trustees of the proto-charity.

The user journeys PDF contains workflows for the key functionality.
The site map draft 1 is a proposed layouut draft of the application.
The process workflow contains process workflows of the key functionality
The DB Schema is a proposed database structure. 
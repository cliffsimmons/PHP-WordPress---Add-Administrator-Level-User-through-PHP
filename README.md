<h1>Add Administrator-Level User through PHP</h1>
By Cliff Simmons, http://cliffsimmons.com<br/>
<br/>
This PHP script allows one to create an administrator-level WordPress user through code and an FTP connection. This script is especially useful if you have been locked out of a WordPress account and you do not have access to the associated database.<br/>
<br/>
<br/>
<br/>
<br/>
<h2>Installation and Use Instructions</h2>
  
1. Add the file add-user.php file to the same directory that your WordPress installation's wp-load.php file exists in.

2. Open the add-user.php file, go to line 5 and set the $desired_username value to a username that you can remember and that isn't already in use by another user.

3. Go to line 7 and set the $desired_email value to an email address that you can remember, that you have access to and that isn't already in use by another user.

4. Go to line 9 and set the $desired_password value to a password that you can remember.

5. Update/save the changes that you've made to the add-user.php file on the server.

6. Once the add-user.php file has been updated on the server, open a web browser and visit the URL to your WordPress followed by /add-user.php. Example: http://domainofyourwordpresssite.com/add-user.php or http://domainofyoursite.com/your-wordpress-directory/add-user.php)
 
7. From here, the page will let you know whether or not the new user creation was successful or now.

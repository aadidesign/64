<!-- ---------------------- XAMPP PHP MySQL --------------- -->

**Steps to Install and configure XAMPP server**  
• download xampp  
• cd Downloads  
• sudo chmod +x xampp-linux-x64-8.2.0-0-installer.run  
• sudo ./xampp-linux-x64-8.2.0-0-installer.run  
• click on manage server  
• Start Apache server  
if not starting then check Apache service using following command :  
    sudo service apache2 status  
    sudo service apache2 stop  
    start apache  
    if problem occurs for Apache2 then configure and change port number to 81  
7) if not starting then check mysql service using following command :  
    if problem occurs for mysql then click configure and change port number to 3307  
    start mysql  

**Steps to copy paste .php and .html files in htdocs folder**  
• To change the privilege of htdocs file do the following: Open new terminal  
• sudo su  
• enter password  
• chmod -R 777 /opt/lampp/htdocs  
• After this copy and paste the .php file and .html file in htdocs  
• Go into the browser  
• localhost:81/phpmyadmin  
• localhost:81/contact.html







<!-- ---------------------- Ruby Reverse --------------- -->

Steps:
To connect your Ruby code with HTML, you'll typically use a web framework like Ruby on Rails,
Sinatra,
sudo apt update
sudo apt install ruby-full
sudo su
gem install Sinatra

OR

sudo apt-get install ruby-full
sudo apt-get update -y
sudo apt-get install -y ruby-sinatra

1) Create a file called app.rb for your Sinatra application.

When the form is submitted, it sends a POST request to /reverse, where the names are reversed
using the reverse_name method, and then renders the reverse.erb template to display the reversed
name.

2) create two .erb files in the same directory: index.erb and reverse.erb

3) run your Sinatra application by executing
create views folder in same directory and keep both erb files in it

4) On terminal : ruby app.rb

5) Visit http://localhost:4567 in your browser, fill out the form, submit it

Note: index.erb is responsible for rendering the form for user input, while reverse.erb is responsible
for rendering the result of processing that input. app.rb for sinatra framework


<!-- ---------------------- Ruby Mail --------------- -->

Steps for   sending email to specific user
1.Just click  on user email id
2.go to manage your Google account
3.just click on security   set 2 step verification
4.after that search for app password in search bar.
5.for creating app password
  1.Just click on select app
  2.Select use other location
   From drop down box     
  3.give the name as per ur
      Requirement.
  4 .generate password
  5.copy the generated   
      Password.
6.open the text editor and paste the code  and  paste the app password  as we copied earlier also give sender  and receiver email id as ur wish
7.after all of these steps just go to replit online editor
  1.first we need to login into   
      Editor.
  2 .go to create replit and   
       Select ruby and give title
       Name as ur wish and
       Click on  create replit.
3.paste the  code  in replit
4.just install the PKG like gem install mail.
5.run the program through command like ruby main.rb



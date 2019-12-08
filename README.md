# Sodra alpha

Backend for Sodra to track businesses, unfinished...(due to the shortage of time)

load_table.php downloads a .csv file from http://atvira.sodra.lt/imones/rinkiniai/index.html and uploads it to the database.
search_by_code.php and search_by_name.php is pretty self-explanatory, gets businesses by their name or code.

load_table.php should be set up with cron to run on server every month, because Sodra uploads new records monthly.

Future plans: 
When you press on the blue link it should show details about the month, from other files in http://atvira.sodra.lt/imones/rinkiniai/index.html
also there should be an ability to export it to .csv file.


#instructions how to start it 
 
 1. You will need xampp to start it
 2. Create a folder in your htdocs folder called ba4 (There can be some problems with paths)
 3. Place all files to it.
 4. Create a database called Sodra.
 5. Create a table called Imones from databaseT.sql
 6. download front end from https://github.com/vaboliss/SodraFrontEnd
 7. npm start frontend

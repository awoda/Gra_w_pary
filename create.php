<?php
 
include 'config.php';
 
db_connect();
 
if(mysql_query("CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(40) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_regdate` int(10) unsigned NOT NULL,
  `user_from` varchar(255) NOT NULL,
  `user_website` varchar(255) NOT NULL,
  `user_score_low` int(10) unsigned NOT NULL,
  `user_score_med` int(10) unsigned NOT NULL,
  `user_score_high` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;")){
    echo "Baza zainicjowana prawidłowo!";
}
else{
    echo "Baza nie została prawidłowo utworzona";
}



db_close();
 
?>
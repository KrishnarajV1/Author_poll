CREATE TABLE IF NOT EXISTS `author_poll` (
  `qst_id` int(6) NOT NULL AUTO_INCREMENT,
  `status` varchar(6) NOT NULL DEFAULT '',
  `qst` varchar(250) NOT NULL DEFAULT '',
  `opt1` varchar(250) NOT NULL DEFAULT '',
  `opt2` varchar(250) NOT NULL DEFAULT '',
  `opt3` varchar(250) NOT NULL DEFAULT '',
  `opt4` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`qst_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


INSERT INTO `author_poll` (`qst_id`, `status`, `qst`, `opt1`, `opt2`, `opt3`, `opt4`) VALUES
(1, 'active', ' Who is your favorite author?', 'Miguel de Cervantes', ' Charles Dickens', 'J.R.R. Tolkien', 'Antoine de Saint-Exuper');


CREATE TABLE IF NOT EXISTS `author_poll_ans` (
  `ans_id` int(5) NOT NULL AUTO_INCREMENT,
  `s_id` varchar(50) NOT NULL DEFAULT '',
  `qst_id` int(3) NOT NULL DEFAULT '0',
  `opt` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`ans_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;
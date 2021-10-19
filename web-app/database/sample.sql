

CREATE TABLE `tbl_bd_agents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bd_name` varchar(100) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO tbl_bd_agents VALUES("2","Anbu","3","abu@gmail.com","8299502081","2021-02-23");
INSERT INTO tbl_bd_agents VALUES("3","Maheshwari","2","maheshwari@gmail.com","8299502081","2021-02-23");
INSERT INTO tbl_bd_agents VALUES("4","Mohit","6","mohit@way2mint.com","8299502081","2021-02-23");
INSERT INTO tbl_bd_agents VALUES("5","Komal","2","komal@way2mint.com","8299502081","2021-02-23");
INSERT INTO tbl_bd_agents VALUES("6","preeti","4","preeti@way2mint.com","8299502081","2021-02-23");
INSERT INTO tbl_bd_agents VALUES("7","vivek","6","vivek@way2mint.com","8299502081","2021-02-23");
INSERT INTO tbl_bd_agents VALUES("8","awnish","4","awnish@way2mint.com","8299502081","2021-02-23");



CREATE TABLE `tbl_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='All Contacts Table ';

INSERT INTO tbl_contacts VALUES("35","47","Awnish Kumar","awnish@gmail.com","","2021-05-23","21:20:22");
INSERT INTO tbl_contacts VALUES("36","41","Anuj Kumar","anuj@gmail.com","9876543210","2021-05-28","11:18:54");
INSERT INTO tbl_contacts VALUES("37","46","Swapnil Garg","swapnil.garg@healthify.co","7729952444","2021-05-28","15:50:12");
INSERT INTO tbl_contacts VALUES("38","48","Mohit","mohit@mjlifespaces.com","","2021-06-05","20:08:20");
INSERT INTO tbl_contacts VALUES("39","44","System Admin","System@way2mint.com","","2021-07-21","15:29:21");
INSERT INTO tbl_contacts VALUES("40","49","Jinet Dsouza","admissions@sophiahighschool.com","9964252744","2021-08-11","12:53:41");
INSERT INTO tbl_contacts VALUES("41","50","Subeesh Parathanam","secretary@kga.in","9873218363","2021-08-12","13:54:19");



CREATE TABLE `tbl_dept` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

INSERT INTO tbl_dept VALUES("1","Sales and Marketing");
INSERT INTO tbl_dept VALUES("2","Accounts");
INSERT INTO tbl_dept VALUES("3","Support");
INSERT INTO tbl_dept VALUES("4","Technical ");
INSERT INTO tbl_dept VALUES("5","Others");
INSERT INTO tbl_dept VALUES("6","Management");
INSERT INTO tbl_dept VALUES("22","consultancy");
INSERT INTO tbl_dept VALUES("23","Demo");



CREATE TABLE `tbl_login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `auth_id` varchar(255) NOT NULL,
  `auth_pass` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` enum('active','disable','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

INSERT INTO tbl_login VALUES("55","admin@zwavefoundation.tech","dbb6638bde150e9371f1e0d30e71aae7","1","44","active");



CREATE TABLE `tbl_menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_label` varchar(255) NOT NULL,
  `menu_title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO tbl_menus VALUES("1","menu_dashboard","Dashboard");
INSERT INTO tbl_menus VALUES("2","menu_notification","Notification");
INSERT INTO tbl_menus VALUES("3","menu_campaigns","Campaigns");
INSERT INTO tbl_menus VALUES("4","menu_phone_book","Phone Book");
INSERT INTO tbl_menus VALUES("5","menu_user_account","User Accounts");
INSERT INTO tbl_menus VALUES("6","menu_other","Others");
INSERT INTO tbl_menus VALUES("7","menu_support_tools","Support Tools");
INSERT INTO tbl_menus VALUES("8","menu_settings","Settings");



CREATE TABLE `tbl_permission` (
  `menu_phone_book` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) NOT NULL,
  `menu_dashboard` int(11) NOT NULL DEFAULT '1',
  `menu_notification` int(11) DEFAULT '0',
  `menu_campaigns` int(11) NOT NULL DEFAULT '0',
  `menu_support_tools` int(11) NOT NULL DEFAULT '0',
  `menu_user_account` int(11) NOT NULL DEFAULT '0',
  `menu_other` int(11) NOT NULL DEFAULT '0',
  `menu_settings` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

INSERT INTO tbl_permission VALUES("1","7","34","1","1","1","0","0","0","0");
INSERT INTO tbl_permission VALUES("1","8","35","1","1","1","1","0","0","0");
INSERT INTO tbl_permission VALUES("1","9","36","1","1","1","1","0","0","0");
INSERT INTO tbl_permission VALUES("1","10","37","1","1","1","1","0","0","0");
INSERT INTO tbl_permission VALUES("1","11","38","1","1","1","1","0","0","0");
INSERT INTO tbl_permission VALUES("1","12","39","1","1","1","1","0","0","0");
INSERT INTO tbl_permission VALUES("1","13","40","1","1","1","1","0","0","0");
INSERT INTO tbl_permission VALUES("1","14","41","1","1","1","1","0","0","0");
INSERT INTO tbl_permission VALUES("1","15","42","1","1","1","1","0","0","0");
INSERT INTO tbl_permission VALUES("1","16","43","1","1","1","1","0","0","0");
INSERT INTO tbl_permission VALUES("1","17","44","1","1","1","1","0","0","0");
INSERT INTO tbl_permission VALUES("0","18","45","1","0","0","0","0","0","0");
INSERT INTO tbl_permission VALUES("0","19","46","1","0","1","0","0","0","0");
INSERT INTO tbl_permission VALUES("0","20","47","1","0","0","1","0","0","0");
INSERT INTO tbl_permission VALUES("0","21","48","1","0","0","1","0","0","0");
INSERT INTO tbl_permission VALUES("1","22","49","1","1","1","1","0","0","0");
INSERT INTO tbl_permission VALUES("1","23","50","1","1","1","1","0","0","0");
INSERT INTO tbl_permission VALUES("1","24","51","1","1","1","1","0","1","0");
INSERT INTO tbl_permission VALUES("1","25","52","1","1","1","1","0","0","0");
INSERT INTO tbl_permission VALUES("1","26","53","1","1","1","1","0","0","0");
INSERT INTO tbl_permission VALUES("1","27","54","1","1","1","1","1","1","0");
INSERT INTO tbl_permission VALUES("1","28","55","1","1","1","1","1","1","1");
INSERT INTO tbl_permission VALUES("0","29","56","1","0","0","1","0","0","0");
INSERT INTO tbl_permission VALUES("1","30","57","1","1","1","1","0","0","0");



CREATE TABLE `tbl_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tbl_role VALUES("1","admin");
INSERT INTO tbl_role VALUES("2","user");



CREATE TABLE `tbl_role_permission` (
  `menu_support_tools` int(11) NOT NULL,
  `menu_dashboard` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_notification` int(11) NOT NULL DEFAULT '1',
  `menu_campaigns` int(11) NOT NULL DEFAULT '1',
  `menu_phone_book` int(11) NOT NULL DEFAULT '1',
  `menu_user_account` int(11) NOT NULL DEFAULT '1',
  `menu_other` int(11) NOT NULL DEFAULT '1',
  `menu_settings` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tbl_role_permission VALUES("1","1","1","1","1","1","1","1","1","1");
INSERT INTO tbl_role_permission VALUES("1","1","2","2","1","1","1","0","0","0");



CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `email` varchar(2555) NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `landline` bigint(20) NOT NULL,
  `company_description` text NOT NULL,
  `bd_id` int(11) NOT NULL,
  `status` enum('enable','disable','deleted') NOT NULL DEFAULT 'enable',
  `assigned_no_count` bigint(20) DEFAULT NULL,
  `max_no_count` bigint(20) NOT NULL DEFAULT '5',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

INSERT INTO tbl_user VALUES("44","System Admin","Zwave Administrator","admin@zwavefoundation.tech","8299502081","0","Zwave Foundation is a Open Source PHP Framework","10","enable","5","5");


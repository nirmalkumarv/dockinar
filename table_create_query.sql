create table do_users(
id	INT NOT NULL AUTO_INCREMENT,
do_username	VARCHAR(100) NOT NULL,
do_password	VARCHAR(50) NOT NULL,
do_email_id	VARCHAR(100) NOT NULL,
mobile_no	VARCHAR(50),
firstname	VARCHAR(50) NOT NULL,
lastname	VARCHAR(50) NOT NULL,
is_speaker	bool,
is_developer	bool,
is_organizer	bool,
created_date	datetime,
modified_date	datetime,
rec_status	tinyint,
is_sms_subscribed	bool,
PRIMARY KEY(id)
);

create table do_organizers(
id	INT NOT NULL AUTO_INCREMENT,
name	VARCHAR(200) NOT NULL,
description	TEXT,
logo_name	VARCHAR(100) NOT NULL,
website_url	VARCHAR(200),
owner_user_id	INT,
webinar_series_url	VARCHAR(200),
default_category_id	INT,
created_date	DATETIME,
modified_date	DATETIME,
rec_status	tinyint,
PRIMARY KEY (id)
);


create table do_webinars(
id	INT NOT NULL AUTO_INCREMENT,
title	VARCHAR(200) NOT NULL,
description	text,
webinar_date	DATE,
webinar_time	TIME,
webinar_datetime	DATETIME,
speaker_name	VARCHAR(100) NOT NULL,
speaker_user_id	INT NOT NULL,
speaker_desc	VARCHAR(500),
webinar_timezone	VARCHAR(10),
org_id	INT NOT NULL,
webinar_url	TEXT,
webinar_reg_url	TEXT,
webinar_source	VARCHAR(100),
created_date	DATETIME,
modified_date	DATETIME,
rec_status	tinyint,
PRIMARY KEY (id),
index speaker_index (speaker_user_id),
FOREIGN KEY(speaker_user_id) REFERENCES do_users(id)
);

CREATE TABLE do_category(
id	INT NOT NULL AUTO_INCREMENT,
name	VARCHAR(100),
description	VARCHAR(100),
created_date	DATETIME,
modified_date	DATETIME,
rec_status	tinyint,
PRIMARY KEY (id)
);


CREATE TABLE do_webinar_category(	
id	INT NOT NULL AUTO_INCREMENT,	
webinar_id	INT not null,
category_id	INT not null,
PRIMARY KEY (id),
FOREIGN KEY (webinar_id) REFERENCES do_webinars(id),
FOREIGN KEY (category_id) REFERENCES do_category(id)
);

CREATE TABLE do_user_activity(
id	INT NOT NULL AUTO_INCREMENT,	
act_dt DATETIME,
act_type VARCHAR(100),
user_id INT not null,
reference_id VARCHAR(100),
PRIMARY KEY (id),
FOREIGN KEY (user_id) REFERENCES do_users(id)
);


create table do_docklet	(
id	INT NOT NULL AUTO_INCREMENT,
user_id	INT not null,
webinar_id	INT not null,
sms_notified	TINYINT,
sms_subscribed	TINYINT,
created_date	DATETIME,
modified_date	DATETIME,
rec_status	tinyint,
PRIMARY KEY (id),
FOREIGN KEY (user_id) REFERENCES do_users(id),
FOREIGN KEY (webinar_id) REFERENCES do_webinars(id)
);


CREATE TABLE do_developer_keys	(
id	INT NOT NULL AUTO_INCREMENT,
dev_user_id	int not null,
api_key	VARHCAR(100),
created_date	DATETIME,
modified_date	DATETIME,
rec_status	tinyint,
PRIMARY KEY (id),
FOREIGN KEY (dev_user_id) REFERENCES do_users(id)
);

create table do_twilio_sms_logs	(
id	INT NOT NULL AUTO_INCREMENT,
user_id	int not null,
status	TINYINT,
webinar_id	int not null,
created_date	DATETIME,
modified_date	DATETIME,
rec_status	tinyint,
PRIMARY KEY (id),
FOREIGN KEY (user_id) REFERENCES do_users(id),
FOREIGN KEY (webinar_id) REFERENCES do_webinars(id)
);
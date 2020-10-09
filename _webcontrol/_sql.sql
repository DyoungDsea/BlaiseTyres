

ALTER TABLE `products` ADD `sub_detail` VARCHAR(100) NOT NULL AFTER `per_month`; 


CREATE TABLE `blevim`.`ddepositor` ( `id` INT NOT NULL AUTO_INCREMENT , `userid` VARCHAR(20) NOT NULL , `pro_id` VARCHAR(20) NOT NULL , `dname` VARCHAR(200) NOT NULL , `damount` VARCHAR(100) NOT NULL , `dimg` VARCHAR(40) NOT NULL , `ddate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB; 

ALTER TABLE `ddepositor` ADD `dstatus` VARCHAR(20) NOT NULL DEFAULT 'pending' AFTER `dimg`; 
ALTER TABLE `ddepositor` ADD `depositor_id` VARCHAR(20) NOT NULL AFTER `id`; 
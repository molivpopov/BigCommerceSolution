CREATE TABLE users(
	id INT(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100)
) ENGINE = InnoDB DEFAULT CHAR SET = utf8;

DROP TABLE IF EXISTS users;

INSERT INTO users(name) VALUE
('mitak');


# original
CREATE TABLE `scan_shipped_orders` (
   `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
   `created_at` timestamp NULL DEFAULT NULL,
   `updated_at` timestamp NULL DEFAULT NULL,
   `tracking_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
   `user_id` int(10) unsigned DEFAULT NULL,
   PRIMARY KEY (`id`),
   KEY `scan_shipped_orders_user_id_foreign` (`user_id`),
   CONSTRAINT `scan_shipped_orders_user_id_foreign` FOREIGN KEY
(`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8
COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS scan_shipped_orders;

delimiter //

CREATE PROCEDURE fill(start_count INT)
BEGIN
    WHILE (start_count > 0) DO
		SET start_count := start_count - 1;
        INSERT INTO scan_shipped_orders(tracking_number, user_id) VALUE
        (left(concat(start_count, '1Z32629V0395461168'), 18), 1);
    END WHILE;
END;//

delimiter ;

DROP PROCEDURE IF EXISTS fill;
CALL fill(176728);

SELECT * FROM kukuriak_timetrack_dp.scan_shipped_orders ORDER BY id DESC LIMIT 50;

explain select * from scan_shipped_orders where tracking_number =
'1579741Z32629V0395';

select * from scan_shipped_orders where tracking_number =
'1579741Z32629V0395';

ALTER TABLE scan_shipped_orders
ADD INDEX test (tracking_number);

ALTER TABLE scan_shipped_orders
DROP INDEX test;

SELECT * FROM scan_shipped_orders WHERE tracking_number = '01Z32629V039546116';

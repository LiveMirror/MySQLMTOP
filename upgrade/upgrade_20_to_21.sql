
ALTER TABLE `mysql_replication_history`
MODIFY COLUMN `YmdHi`  bigint(18) NOT NULL DEFAULT 0 AFTER `create_time`;

ALTER TABLE `mysql_replication_history`
ADD INDEX `idx_union_1` (`server_id`,`YmdHi`) USING BTREE ;

ALTER TABLE `mysql_replication_history`
ADD INDEX `idx_ymdhi` (`YmdHi`) USING BTREE ;

ALTER TABLE `mysql_replication_history`
ADD INDEX `idx_create_time` (`create_time`) USING BTREE ;

ALTER TABLE `mysql_replication_history`
MODIFY COLUMN `server_id`  smallint(4) NOT NULL AFTER `id`,
DROP PRIMARY KEY,
ADD PRIMARY KEY (`id`, `server_id`);

ALTER TABLE `mysql_replication_history`
PARTITION BY RANGE COLUMNS(server_id) (
    PARTITION server_1 VALUES LESS THAN (2),
    PARTITION server_2 VALUES LESS THAN (3),
    PARTITION server_3 VALUES LESS THAN (4),
    PARTITION server_4 VALUES LESS THAN (5),
    PARTITION server_5 VALUES LESS THAN (6),
    PARTITION server_6 VALUES LESS THAN (7),
    PARTITION server_7 VALUES LESS THAN (8),
    PARTITION server_8 VALUES LESS THAN (9),
    PARTITION server_9 VALUES LESS THAN (10),
    PARTITION server_10 VALUES LESS THAN (11),
    PARTITION server_11 VALUES LESS THAN (12),
    PARTITION server_12 VALUES LESS THAN (13),
    PARTITION server_13 VALUES LESS THAN (14),
    PARTITION server_14 VALUES LESS THAN (15),
    PARTITION server_15 VALUES LESS THAN (16),
    PARTITION server_16 VALUES LESS THAN (17),
    PARTITION server_17 VALUES LESS THAN (18),
    PARTITION server_18 VALUES LESS THAN (19),
    PARTITION server_19 VALUES LESS THAN (20),
    PARTITION server_20 VALUES LESS THAN (21),
    PARTITION server_other VALUES LESS THAN MAXVALUE
);





ALTER TABLE `mysql_status_history`
MODIFY COLUMN `YmdHi`  bigint(18) NOT NULL DEFAULT 0 AFTER `create_time`;

ALTER TABLE `mysql_status_history`
DROP INDEX `idx_union_1` ,
ADD INDEX `idx_union_1` (`server_id`, `YmdHi`) USING BTREE ;

ALTER TABLE `mysql_status_history`
ADD INDEX `idx_create_time` (`create_time`) USING BTREE ;

ALTER TABLE `mysql_status_history`
MODIFY COLUMN `server_id`  smallint(4) NOT NULL AFTER `id`,
DROP PRIMARY KEY,
ADD PRIMARY KEY (`id`, `server_id`);

ALTER TABLE `mysql_status_history`
PARTITION BY RANGE COLUMNS(server_id) (
    PARTITION server_1 VALUES LESS THAN (2),
    PARTITION server_2 VALUES LESS THAN (3),
    PARTITION server_3 VALUES LESS THAN (4),
    PARTITION server_4 VALUES LESS THAN (5),
    PARTITION server_5 VALUES LESS THAN (6),
    PARTITION server_6 VALUES LESS THAN (7),
    PARTITION server_7 VALUES LESS THAN (8),
    PARTITION server_8 VALUES LESS THAN (9),
    PARTITION server_9 VALUES LESS THAN (10),
    PARTITION server_10 VALUES LESS THAN (11),
    PARTITION server_11 VALUES LESS THAN (12),
    PARTITION server_12 VALUES LESS THAN (13),
    PARTITION server_13 VALUES LESS THAN (14),
    PARTITION server_14 VALUES LESS THAN (15),
    PARTITION server_15 VALUES LESS THAN (16),
    PARTITION server_16 VALUES LESS THAN (17),
    PARTITION server_17 VALUES LESS THAN (18),
    PARTITION server_18 VALUES LESS THAN (19),
    PARTITION server_19 VALUES LESS THAN (20),
    PARTITION server_20 VALUES LESS THAN (21),
    PARTITION server_other VALUES LESS THAN MAXVALUE
);





ALTER TABLE `mysql_status_ext_history`
MODIFY COLUMN `YmdHi`  bigint(18) NOT NULL DEFAULT 0 AFTER `create_time`;

ALTER TABLE `mysql_status_ext_history`
DROP INDEX `idx_server_id` ,
ADD INDEX `idx_union_1` (`server_id`, `YmdHi`) USING BTREE ;


ALTER TABLE `mysql_status_ext_history`
MODIFY COLUMN `server_id`  smallint(4) NOT NULL AFTER `id`,
DROP PRIMARY KEY,
ADD PRIMARY KEY (`id`, `server_id`);

ALTER TABLE `mysql_status_ext_history`
PARTITION BY RANGE COLUMNS(server_id) (
    PARTITION server_1 VALUES LESS THAN (2),
    PARTITION server_2 VALUES LESS THAN (3),
    PARTITION server_3 VALUES LESS THAN (4),
    PARTITION server_4 VALUES LESS THAN (5),
    PARTITION server_5 VALUES LESS THAN (6),
    PARTITION server_6 VALUES LESS THAN (7),
    PARTITION server_7 VALUES LESS THAN (8),
    PARTITION server_8 VALUES LESS THAN (9),
    PARTITION server_9 VALUES LESS THAN (10),
    PARTITION server_10 VALUES LESS THAN (11),
    PARTITION server_11 VALUES LESS THAN (12),
    PARTITION server_12 VALUES LESS THAN (13),
    PARTITION server_13 VALUES LESS THAN (14),
    PARTITION server_14 VALUES LESS THAN (15),
    PARTITION server_15 VALUES LESS THAN (16),
    PARTITION server_16 VALUES LESS THAN (17),
    PARTITION server_17 VALUES LESS THAN (18),
    PARTITION server_18 VALUES LESS THAN (19),
    PARTITION server_19 VALUES LESS THAN (20),
    PARTITION server_20 VALUES LESS THAN (21),
    PARTITION server_other VALUES LESS THAN MAXVALUE
);


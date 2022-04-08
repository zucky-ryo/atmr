CREATE TABLE IF NOT EXISTS `items` (
  `id`       bigint UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `type`     int             NOT NULL DEFAULT '0'    COMMENT 'タイプ(1:家具 2:衣類 ...)',
  `sub_type` int             NOT NULL DEFAULT '0'    COMMENT 'タイプ毎の細かい振り分け',
  `name`     varchar(256)             DEFAULT ''     COMMENT '名前',
  `img`      text                                    COMMENT '画像パス',
  `color`    text                                    COMMENT '色',
  UNIQUE KEY `item_id`  (`id`),
  INDEX      `item_idx` (`type`,`sub_type`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='アイテムテーブル';

CREATE TABLE IF NOT EXISTS `users` (
  `id`        bigint UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name`      varchar(256)             DEFAULT ''     COMMENT '名前',
  `pass`      varchar(256)             DEFAULT ''     COMMENT 'パスワード',
  `update_at` datetime        NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新日',
  UNIQUE KEY `item_id`  (`id`),
  INDEX      `item_idx` (`name`,`pass`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='ユーザーテーブル';

CREATE TABLE IF NOT EXISTS `user_item_relations` (
  `user_id`       bigint UNSIGNED NOT NULL COMMENT 'ユーザーID',
  `item_id`       bigint UNSIGNED NOT NULL COMMENT 'アイテムID',
  UNIQUE KEY  `user_item_unique`  (`user_id`,`item_id`),
  FOREIGN KEY `user_relation` (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  FOREIGN KEY `item_relation` (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='アイテムユーザーリレーションテーブル';
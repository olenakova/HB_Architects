<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'hb_architect' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'admin1' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'admin1' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '~o7KbX9i{@J~|6,WeBekn;oeG#gl:5BwKvqFt8LxKx@pUA;$VRwT?->ecS<M&|[7' );
define( 'SECURE_AUTH_KEY',  'XO1VDO0 ^0:+O#OXVt(,V7ur;.3-j;d_XP<uIcNv,^REWMvWADq3:7Oo?av;95?b' );
define( 'LOGGED_IN_KEY',    '-X7%D[#n>+G{VlZ3fE[r{XKCP=TY9t8iTI>oXAC)JjZY?axZa%b$UNu-U>ZOlBcE' );
define( 'NONCE_KEY',        '>3;H*+9PSFpl]]n]G/Y^!W2Y|y9AUbM4?*B+Vd)iNSojBPz%zG`fBFxUj4<=*4(.' );
define( 'AUTH_SALT',        ']V9T;RgLPw??UoJCY;;MmwcO @V@iS3i!8}@K1qs`2!k 0J^C+/+nyZv2WCPi1J.' );
define( 'SECURE_AUTH_SALT', 'T%S)[Z!bD,/]cwR}=Ig@*]-hLX;}3{PE`JD4ZEN%{&C+l(DUVMuS.H5O6dm5K0x(' );
define( 'LOGGED_IN_SALT',   'Fin3rT&5n:9_mn>LC}&rr86Snqtv+T{YVU0o&#x zDjTC3=2DB{z8A[Eqt7m^>>}' );
define( 'NONCE_SALT',       'rt;([x.{2lcF.CZbBGR/Y=&g_{n7f_#tL(G=2;m vIs3>96]*ic9_&[3/8<Db1XU' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';

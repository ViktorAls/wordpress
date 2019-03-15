<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wp' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '0SKp;Of{G]]R6vOx+eANm@hGfPIa #`g$&}bKL^TR -WW^w{4Uu#?7NS$:[p Ivz' );
define( 'SECURE_AUTH_KEY',  '*,^O[{;9m~xQ6JId{2@Pr,pODUMoCs,|to[_k:DP:x$ 0.IpE*g@rKyVm$J*qK.0' );
define( 'LOGGED_IN_KEY',    '(ZE,b3f7DO1Nzde8{bnu|q-CQf]}js#DBixUSc$uQA:GqpS74TKq%Lx*gIcL<83@' );
define( 'NONCE_KEY',        'Xc8u(E7QaV<8(4CiTa6U[B<fp-sT^V4j#Oefa6yJe,(LOLZas]Hki9=<gJn]loRq' );
define( 'AUTH_SALT',        '[8vy-#h:#fLy46uv|+R.X<31zZ~9gKV~2<]s& j`4O!(Xup+:u8vgT__gU1t8]*>' );
define( 'SECURE_AUTH_SALT', 'ZSfG4*<~sfhFw|?`_[GMZ^SN>e]U,z {II.&^OP!$_Zi1J4StJ(:Sj^l79Y!fW<A' );
define( 'LOGGED_IN_SALT',   '={1H,Ds;3lR+XL6MC#=E/55B77hDwK/:5Nc@pl j0>wV}/?2W_Tb1Oy%d<uK{W$Y' );
define( 'NONCE_SALT',       'IP^)}!}t:-TXjNrR8pFO& #Lb|hre[AgCeQ(:Sq%@bdVbx`kYQHd2?Cp:B(amY)|' );

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
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );

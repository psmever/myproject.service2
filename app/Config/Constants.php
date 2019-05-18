<?php

//--------------------------------------------------------------------
// App Namespace
//--------------------------------------------------------------------
// This defines the default Namespace that is used throughout
// CodeIgniter to refer to the Application directory. Change
// this constant to change the namespace that all application
// classes should use.
//
// NOTE: changing this will require manually modifying the
// existing namespaces of App\* namespaced-classes.
//
define('APP_NAMESPACE', 'App');

/*
|--------------------------------------------------------------------------
| Composer Path
|--------------------------------------------------------------------------
|
| The path that Composer's autoload file is expected to live. By default,
| the vendor folder is in the Root directory, but you can customize that here.
*/
define('COMPOSER_PATH', ROOTPATH . 'vendor/autoload.php');

/*
|--------------------------------------------------------------------------
| Timing Constants
|--------------------------------------------------------------------------
|
| Provide simple ways to work with the myriad of PHP functions that
| require information to be in seconds.
*/
defined('SECOND') || define('SECOND', 1);
defined('MINUTE') || define('MINUTE', 60);
defined('HOUR')   || define('HOUR', 3600);
defined('DAY')    || define('DAY', 86400);
defined('WEEK')   || define('WEEK', 604800);
defined('MONTH')  || define('MONTH', 2592000);
defined('YEAR')   || define('YEAR', 31536000);
defined('DECADE') || define('DECADE', 315360000);

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        || define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          || define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         || define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   || define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  || define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') || define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     || define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       || define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      || define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      || define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code




/*
|--------------------------------------------------------------------------
| SITE Directory URL Define
|--------------------------------------------------------------------------
*/

defined('SITE_RESOURCE_URL')							            || define('SITE_RESOURCE_URL', APP_BASE_URL.'/resource');

defined('SITE_UPLOAD_DIR')							                || define('SITE_UPLOAD_DIR', APP_DOCUMENT_ROOT.'/upload');
defined('SITE_UPLOAD_URL')							                || define('SITE_UPLOAD_URL', APP_BASE_URL.'/upload');

defined('SITE_IMAGE_DIR')							                || define('SITE_IMAGE_DIR', APP_DOCUMENT_ROOT.'/image');
defined('SITE_IMAGE_URL')							                || define('SITE_IMAGE_URL', APP_BASE_URL.'/image');

defined('SITE_PROFILE_IMAGE_DIR')							        || define('SITE_PROFILE_IMAGE_DIR', SITE_IMAGE_DIR.'/profile');
defined('SITE_PROFILE_IMAGE_URL')							        || define('SITE_PROFILE_IMAGE_URL', SITE_IMAGE_URL.'/profile');

defined('SITE_POST_IMAGE_DIR')							            || define('SITE_POST_IMAGE_DIR', SITE_IMAGE_DIR.'/post');
defined('SITE_POST_IMAGE_URL')							            || define('SITE_POST_IMAGE_URL', SITE_IMAGE_URL.'/post');

defined('SITE_DEFAULT_PROFILE_IMAGE_URL')                           || define('SITE_DEFAULT_PROFILE_IMAGE_URL', SITE_RESOURCE_URL.'/img/default_profile.png');
/*
|--------------------------------------------------------------------------
| SITE Define
|--------------------------------------------------------------------------
*/

// 싸이트 명
defined('SITE_NAME')							                    || define('SITE_NAME', 'myproject');

defined('SITE_PASSWORD_DEFAULT')							        || define('SITE_PASSWORD_DEFAULT', 'myproject_'); // password_hash KEY
defined('SITE_TOKEN_KEY')      								        || define('SITE_TOKEN_KEY', 'vyqJuA/qNwkttc5dW1u1mWaV7vAiHuqTp9kVzgLT'); // JWT Key
defined('SITE_TOKEN_KEY_IV')      								    || define('SITE_TOKEN_KEY_IV', 'V3rBjIvf/3CjgV+CCyMeP7NHHU9Sr5j0Rd48Jw1Slc5BOAn6wsFJZvMvmSACrF+dP4g='); // JWT Key
defined('SITE_TOKEN_ALGORITHM')      						        || define('SITE_TOKEN_ALGORITHM', 'HS256'); // JWT encode decode Algorithm
defined('SITE_TOKEN_EXPIRE_STRTOTIME') 						        || define('SITE_TOKEN_EXPIRE_STRTOTIME', '+1 minutes');

defined('SITE_USER_TOKEN_EXPIRE_STRTOTIME') 						|| define('SITE_USER_TOKEN_EXPIRE_STRTOTIME', '+10 day'); // 사용자 토큰 만료 시간
defined('SITE_AACCESS_TOKEN_EXPIRE_STRTOTIME') 						|| define('SITE_AACCESS_TOKEN_EXPIRE_STRTOTIME', '+5 day'); // 엑세스 토큰 만료 시간

defined('SITE_RAND_CODE_LENGTH')      						        || define('SITE_RAND_CODE_LENGTH', '50'); // 랜덤 코드 길이

defined('USER_WEB_TYPE_CODE')      						            || define('USER_WEB_TYPE_CODE', 'U01010'); // 웹 가입 회원 타입 코드
defined('USER_IOS_TYPE_CODE')      						            || define('USER_IOS_TYPE_CODE', 'U01020'); // 웹 가입 회원 타입 코드
defined('USER_ANDROID_TYPE_CODE')      						        || define('USER_ANDROID_TYPE_CODE', 'U01030'); // 웹 가입 회원 타입 코드

defined('CLIENT_WEB_TYPE_CODE')      						        || define('CLIENT_WEB_TYPE_CODE', 'C01010'); // 웹 가입 회원 타입 코드
defined('CLIENT_IOS_TYPE_CODE')      						        || define('CLIENT_IOS_TYPE_CODE', 'C01020'); // 사용자 기본 가입 레벨 코드
defined('CLIENT_ANDROID_TYPE_CODE')      						    || define('CLIENT_ANDROID_TYPE_CODE', 'C01030'); // 사용자 기본 가입 레벨 코드

defined('USER_DEFAULT_LEVEL_CODE')      						    || define('USER_DEFAULT_LEVEL_CODE', 'U02001'); // 사용자 기본 가입 레벨 코드
defined('USER_DEFAULT_AUTH_LEVEL_CODE')      						|| define('USER_DEFAULT_AUTH_LEVEL_CODE', 'U02010'); // 사용자 기본 가입 레벨 코드

defined('SITE_SMTP_EMAIL_ADDRESS')      						    || define('SITE_SMTP_EMAIL_ADDRESS', 'psmever@gmail.com'); // 싸이트 SMTP 이메일 주소
defined('SITE_SMTP_EMAIL_PASSWORD')      						    || define('SITE_SMTP_EMAIL_PASSWORD', '!Mingun2018'); // 싸이트 SMTP 이메일 패스워드


defined('DEFAULT_PROFILE_IMAGE_URL')      						    || define('DEFAULT_PROFILE_IMAGE_URL', '/resource/img/default_profile.png'); // 싸이트 SMTP 이메일 패스워드
defined('DEFAULT_TODAY_PRIVATE_TYPE')      						    || define('DEFAULT_TODAY_PRIVATE_TYPE', 'C02010'); // 투데이 기본 공개 코드값

defined('PROFILE_IMAGE_UPLOAD_CODE')      						    || define('PROFILE_IMAGE_UPLOAD_CODE', 'S02010'); // 프로필 이미지 코드
defined('TODAY_IMAGE_UPLOAD_CODE')      						    || define('TODAY_IMAGE_UPLOAD_CODE', 'S02020');// 프로필 TODAY 이미지 코드

defined('SITE_UPLOAD_IMAGE_SIZE_LIMIT')      						|| define('SITE_UPLOAD_IMAGE_SIZE_LIMIT', 10000000000);// 프로필 TODAY 이미지 코드

defined('SITE_TIMELINE_UPLOAD_IMAGE_CODE')      					|| define('SITE_TIMELINE_UPLOAD_IMAGE_CODE', 'S03010');// 기본 파일 구분 timeline 이미지 코드

defined('SITE_TIMELINE_CONTENTS_TYPE_BASIC')      					|| define('SITE_TIMELINE_CONTENTS_TYPE_BASIC', 'C03010');// 포스트글 타입 기본(이미지 없이)
defined('SITE_TIMELINE_CONTENTS_TYPE_PHOTO')      					|| define('SITE_TIMELINE_CONTENTS_TYPE_PHOTO', 'C03020');// 포스트글 타입 사진글

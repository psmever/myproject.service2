<?php

if ( ! function_exists('getRandomUserUid'))
{
	//랜덤한 사용자 아이디 생성
	function getRandomUserUid()
	{
		return bin2hex(random_bytes(10));
	}
}


if ( ! function_exists('getPasswordHash'))
{
	// 패스워드 해시
	function getPasswordHash($plaintext = '')
	{
		return password_hash(SITE_PASSWORD_DEFAULT . $plaintext, PASSWORD_DEFAULT);
	}
}


if ( ! function_exists('getPasswordVerify'))
{
	// 해스워드 해시 체크
	function getPasswordVerify($password = '', $hash_text = '')
	{
		return password_verify(SITE_PASSWORD_DEFAULT . $password, $hash_text);
	}
}


if ( ! function_exists('getRandCode'))
{
	// 특수 기호 포함 랜덤한 문자열 반환
	function getRandCode($length = SITE_RAND_CODE_LENGTH)
	{
		return base64_encode(openssl_random_pseudo_bytes($length));
	}
}


if ( ! function_exists('getRandString'))
{
	// 특수 기호 포함 랜덤한 문자열 반환
	function getRandString()
	{
		return hash('sha256', mt_rand());
	}
}




if ( ! function_exists('getRandomString'))
{
	// permitted_chars 이용 랜덤한 문자열 반환
	function getRandomString($strength = 16)
	{
		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		
		$input_length = strlen($permitted_chars);
		$random_string = '';
		for($i = 0; $i < $strength; $i++) {
			$random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
			$random_string .= $random_character;
		}
		
		return $random_string;
		
	}
}


if ( ! function_exists('userEmailValidCheck'))
{
	// 이메일 형식 체크
	function userEmailValidCheck ($email_string = '')
	{
		if ( !preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email_string) ) {
			return FALSE;
		} else {
			return TRUE;
		}
	}
}

if ( ! function_exists('userNameFirstWordCheck'))
{
	// 사용자 이름 첫번째 단어 체크
	function userNameFirstWordCheck ($user_name_string = '')
	{
		if ( !preg_match("/^[a-z]/i", $user_name_string) ) {
			return FALSE;
		} else {
			return TRUE;
		}
	}
}


if ( ! function_exists('userNameValidCheck'))
{
	// 사용자 이름 형식 체크
	function userNameValidCheck ($user_name_string = '')
	{
		if ( !preg_match("/^[a-z0-9_-]{3,16}$/", $user_name_string) ) {
			
			return FALSE;
		} else {
			return TRUE;
		}
	}
}


if ( ! function_exists('userPasswordValidCheck'))
{
	// 패스워드 체크
	function userPasswordValidCheck ($password_string = '')
	{
		if ( !preg_match('/^.*(?=^.{8,15}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/', $password_string) ) {
			return FALSE;
		} else {
			return TRUE;
		}
	}
}


if ( ! function_exists('convertArrayToObject'))
{
	// 배열을 object 타입으로
	function convertArrayToObject ($defs)
	{
		$innerfunc = function ($a) use (&$innerfunc) {
			return (is_array($a)) ? (object)array_map($innerfunc, $a) : $a;
		};
		
		return (object)array_map($innerfunc, $defs);
	}
}


if ( ! function_exists('convertBirthNumberToBirthDayType1'))
{
	// 생년월일 표시 1
	function convertBirthNumberToBirthDayType1 ($birthNumber = NULL)
	{
		return substr($birthNumber, 0, 4) . '. ' . substr($birthNumber, 4, 2) . '. ' . substr($birthNumber, 6, 2);
	}
}


if ( ! function_exists('convertBirthNumberToBirthDay'))
{
	// 생년월일 분리 배열 반환
	function convertBirthNumberToBirthDay ($birthNumber = NULL)
	{
		return [
			'y' => substr($birthNumber, 0, 4),
			'm' => substr($birthNumber, 4, 2),
			'd' => substr($birthNumber, 6, 2)
		];
	}
}


if ( ! function_exists('convertMysqlDateTimeType1'))
{
	// mysql datetime convert
	function convertMysqlDateTimeType1 ($mysqlDateTime = NULL)
	{
		return strtotime($mysqlDateTime);
	}
}


if ( ! function_exists('convertMysqlDateTimeType2'))
{
	// mysql datetime convert
	function convertMysqlDateTimeType2 ($mysqlDateTime = NULL)
	{
		return date('Y. m. d', strtotime($mysqlDateTime));
	}
}

if ( ! function_exists('convertTimeToString'))
{
	// timestamp 를 문자열 시간형식으로 반환
	function convertTimeToString ($timestamp = NULL)
	{
		if ( !ctype_digit($timestamp) ) {
			$timestamp = strtotime($timestamp);
		}
		
		$diff = time() - $timestamp;
		if ( $diff == 0 ) {
			return 'now';
		} else if ( $diff > 0 ) {
			$day_diff = floor($diff / 86400);
			if ( $day_diff == 0 ) {
				if ( $diff < 60 ) return 'just now';
				if ( $diff < 120 ) return '1 minute ago';
				if ( $diff < 3600 ) return floor($diff / 60) . ' minutes ago';
				if ( $diff < 7200 ) return '1 hour ago';
				if ( $diff < 86400 ) return floor($diff / 3600) . ' hours ago';
			}
			if ( $day_diff == 1 ) {
				return 'Yesterday';
			}
			if ( $day_diff < 7 ) {
				return $day_diff . ' days ago';
			}
			if ( $day_diff < 31 ) {
				return ceil($day_diff / 7) . ' weeks ago';
			}
			if ( $day_diff < 60 ) {
				return 'last month';
			}
			
			return date('F Y', $timestamp);
		} else {
			$diff = abs($diff);
			$day_diff = floor($diff / 86400);
			if ( $day_diff == 0 ) {
				if ( $diff < 120 ) {
					return 'in a minute';
				}
				if ( $diff < 3600 ) {
					return 'in ' . floor($diff / 60) . ' minutes';
				}
				if ( $diff < 7200 ) {
					return 'in an hour';
				}
				if ( $diff < 86400 ) {
					return 'in ' . floor($diff / 3600) . ' hours';
				}
			}
			if ( $day_diff == 1 ) {
				return 'Tomorrow';
			}
			if ( $day_diff < 4 ) {
				return date('l', $timestamp);
			}
			if ( $day_diff < 7 + (7 - date('w')) ) {
				return 'next week';
			}
			if ( ceil($day_diff / 7) < 4 ) {
				return 'in ' . ceil($day_diff / 7) . ' weeks';
			}
			if ( date('n', $timestamp) == date('n') + 1 ) {
				return 'next month';
			}
			
			return date('F Y', $timestamp);
		}
	}
}



if ( ! function_exists('telNumberAddHyphen'))
{
	// 전화번호에 하이픈 추가
	function telNumberAddHyphen ($telnumber = NULL)
	{
		if ( $telnumber == FALSE ) return FALSE;
		
		$tel = preg_replace("/[^0-9]/", "", $telnumber);    // 숫자 이외 제거
		if ( substr($tel, 0, 2) == '02' ) {
			return preg_replace("/([0-9]{2})([0-9]{3,4})([0-9]{4})$/", "\\1 - \\2 - \\3", $tel);
		} else if ( strlen($tel) == '8' && (substr($tel, 0, 2) == '15' || substr($tel, 0, 2) == '16' || substr($tel, 0, 2) == '18') ) {
			// 지능망 번호이면
			return preg_replace("/([0-9]{4})([0-9]{4})$/", "\\1 - \\2", $tel);
		} else {
			return preg_replace("/([0-9]{3})([0-9]{3,4})([0-9]{4})$/", "\\1 - \\2 - \\3", $tel);
		}
	}
}




if ( ! function_exists('textLineAddPtag'))
{
	// br, 엔터에 p 테그 추가
	function textLineAddPtag ($plain_text)
	{
		if ( empty($plain_text) ) return FALSE;
		
		$tmp_plain_text = trim($plain_text);
		
		$tmp_plain_text = nl2br($tmp_plain_text);
		$tmp_plain_text = explode("<br />", $tmp_plain_text);
		
		$tmp_out_put_text = "";
		
		foreach ( $tmp_plain_text as $arrayValue ) {
			$lineText = trim($arrayValue);
			$lineText = preg_replace('/[\x00-\x1F\x7F]/', '', $lineText);
			if ( !empty($lineText) ) {
				$tmp_out_put_text .= '<p>' . $lineText . '</p>' . PHP_EOL;
				
			} else {
				$tmp_out_put_text .= PHP_EOL;
				
			}
		}
		
		$returnText = trim($tmp_out_put_text);
		
		return $returnText;
	}
}


if ( ! function_exists('getUserProfileWebSiteItem'))
{
	// http https 삭제
	function getUserProfileWebSiteItem ($urlString = NULL)
	{
		if ( $urlString == NULL ) return FALSE;
		
		try {
			//code...
			preg_match("/(http|https):\/\/(.*?)$/i", $urlString, $match);
			if ( isset($match[2]) && $match[2] ) {
				$match[2];
			} else {
				return $urlString;
			}
		} catch ( \Throwable $th ) {
			return FALSE;
		}
	}
}


if ( ! function_exists('strip_tags_content'))
{
	// tag all delete
	function strip_tags_content ($text)
	{
		return strip_tags($text);
	}
}


if ( ! function_exists('getProfilePhoneNumber'))
{
	// user profile only number
	function getProfilePhoneNumber ($phoneString = NULL)
	{
		try {
			//code...
			return preg_replace("/[^0-9]/", "", $phoneString);
		} catch ( \Throwable $th ) {
			//throw $th;
			return FALSE;
		}
	}
}


if ( ! function_exists('makeDirectory'))
{
	// 디렉토리 없으면 생성
	function makeDirectory ($targetDirectory = NULL)
	{
		if ( empty($targetDirectory) ) return FALSE;
		
		
		if ( !is_dir($targetDirectory) ) mkdir($targetDirectory, 0777, TRUE);
		
		return TRUE;
		
	}
}

if ( ! function_exists('uniqidReal'))
{
	// return example
	// string(13) "126371711d9a5"
	function uniqidReal ($lenght = 13)
	{
		// uniqid gives 13 chars, but you could adjust it to your needs.
		if ( function_exists("random_bytes") ) {
			$bytes = random_bytes(ceil($lenght / 2));
		} else if ( function_exists("openssl_random_pseudo_bytes") ) {
			$bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
		} else {
			throw new Exception("no cryptographically secure random function available");
		}
		return substr(bin2hex($bytes), 0, $lenght);
	}
}

if ( ! function_exists('encrypt_decrypt'))
{
	/*
	 * 간단한 암호화
	 *
	 *
	 * $message    = "This text is secret";
	 * $ciphertext =  encrypt_decrypt('encrypt', $fline text);
	 * $plaintext  =  encrypt_decrypt('decrypt', $enc text);
	 *
	 * */
	function encrypt_decrypt ($action, $string)
	{
		$secret_key = SITE_TOKEN_KEY;
		$secret_iv = SITE_TOKEN_KEY_IV;
		
		$output = FALSE;
		$encrypt_method = "AES-256-CBC";
		
		$key = hash('sha256', $secret_key);
		$iv = substr(hash('sha256', $secret_iv), 0, 16);
		if ( $action == 'encrypt' ) {
			$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
			$output = base64_encode($output);
		} else if ( $action == 'decrypt' ) {
			$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		}
		return $output;
	}
}
<?php

class Request {
	/**
	 * get vars from user request
	 *
	 * @static
	 * @param $varName
	 * @param string $type
	 * @return null
	 */
    public static function getVar($varName, $type = 'default') {
		$type	= strtoupper( $type );

		// Get the input hash
		switch ($type)
		{
			case 'GET' :
				$input = &$_GET;
				break;
			case 'POST' :
				$input = &$_POST;
				break;
			case 'FILES' :
				$input = &$_FILES;
				break;
			case 'COOKIE' :
				$input = &$_COOKIE;
				break;
			case 'SERVER'    :
				$input = &$_SERVER;
				break;
			default:
				$input = &$_REQUEST;
				break;
		}

        if(isset($input[$varName])  && $input[$varName] !== null) {
            $var = $input[$varName];
        }
        else {
            $var = null;
        }
        return $var;
    }
}
<?php
// https://github.com/pedroborges/laravel-date/blob/master/libraries/date.php
class Date {

	/**
	 * Time periods.
	 *
	 * @var array
	 */
	private static $periods = array('second', 'minute', 'hour', 'day', 'week', 'month', 'year', 'decade');

	/**
	 * Time lengths.
	 *
	 * @var array
	 */
	private static $lengths = array(60, 60, 24, 7, 4.35, 12, 10);

	/**
	 * Convert UNIX timestamp to relative time.
	 *
	 * @author Chris Coyier <http://css-tricks.com>
	 * @param  int  $time
	 * @return string
	 */
	public static function time_ago($time)
	{
		$periods = array('second', 'minute', 'hour', 'day', 'week', 'month', 'year', 'decade');
		$lengths = static::$lengths;

		$now = time();

		$difference = $now - $time;

		for ($i = 0; $difference >= $lengths[$i] and $i < count($lengths) - 1; $i++)
		{
			$difference /= $lengths[$i];
		}

		$difference = round($difference);

		if ($difference != 1) $periods[$i] .= "s";

		$period = Lang::line('date.' . $periods[$i] );
		
		return Lang::line( 'date.time_ago', array( 'time' => $difference, 'period' => $period ) );
	}
	// http://guru-forum.net/showthread.php?t=7
	public static function mysqlToUnix ($datetime) {
	    if ($datetime) $parts = explode(' ', $datetime);
	    $datebits = explode('-', $parts[0]);
	    if (3 != count($datebits)) return -1;
	    if (isset($parts[1])) {
	        $timebits = explode(':', $parts[1]);
	        if (3 != count($timebits)) return -1;
	        return mktime($timebits[0], $timebits[1], $timebits[2], $datebits[1], $datebits[2], $datebits[0]);
	    }
	    return mktime (0, 0, 0, $datebits[1], $datebits[2], $datebits[0]);
	}
	public static function unixToHTML( $date ){
		return date( 'Y-m-d', $date );
	}

}
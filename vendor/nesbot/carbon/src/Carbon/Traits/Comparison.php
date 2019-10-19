<?php

/**
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Carbon\Traits;

use BadMethodCallException;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use DateTimeInterface;
use InvalidArgumentException;

/**
 * Trait Comparison.
 *
 * Comparison utils and testers. All the following methods return booleans.
 * nowWithSameTz
 *
 * Depends on the following methods:
 *
 * @method CarbonInterface        resolveCarbon($date)
 * @method CarbonInterface        copy()
 * @method CarbonInterface        nowWithSameTz()
 * @method static CarbonInterface yesterday($timezone = null)
 * @method static CarbonInterface tomorrow($timezone = null)
 */
trait Comparison
{
    /**
     * Checks if the (date)time string is in a given format.
     *
     * @param string $date
     * @param string $format
     *
     * @return bool
     * @example
     * ```
     * Carbon::hasFormat('11:12:45', 'h:i:s'); // true
     * Carbon::hasFormat('13:12:45', 'h:i:s'); // false
     * ```
     *
     * @SuppressWarnings(PHPMD.EmptyCatchBlock)
     *
     */
    public static function hasFormat($date, $format)
    {
        try {
            // Try to create a DateTime object. Throws an InvalidArgumentException if the provided time string
            // doesn't match the format in any way.
            static::rawCreateFromFormat($format, $date);

            // createFromFormat() is known to handle edge cases silently.
            // E.g. "1975-5-1" (Y-n-j) will still be parsed correctly when "Y-m-d" is supplied as the format.
            // To ensure we're really testing against our desired format, perform an additional regex validation.

            // Preg quote, but remove escaped backslashes since we'll deal with escaped characters in the format string.
            $quotedFormat = str_replace('\\\\', '\\', preg_quote($format, '/'));

            // Build the regex string
            $regex = '';

            for ($i = 0; $i < strlen($quotedFormat); ++$i) {
                // Backslash – the next character does not represent a date token so add it on as-is and continue.
                // We're doing an extra ++$i here to increment the loop by 2.
                if ($quotedFormat[$i] === '\\') {
                    $char = $quotedFormat[++$i];
                    $regex .= $char === '\\' ? '\\\\' : $char;

                    continue;
                }

                $regex .= strtr($quotedFormat[$i], static::$regexFormats);
            }

            return (bool)preg_match('/^' . $regex . '$/', $date);
        } catch (InvalidArgumentException $e) {
        }

        return false;
    }

    /**
     * Determines if the instance is equal to another
     *
     * @param Carbon|DateTimeInterface|mixed $date
     *
     * @return bool
     * @see equalTo()
     *
     * @example
     * ```
     * Carbon::parse('2018-07-25 12:45:16')->eq('2018-07-25 12:45:16'); // true
     * Carbon::parse('2018-07-25 12:45:16')->eq(Carbon::parse('2018-07-25 12:45:16')); // true
     * Carbon::parse('2018-07-25 12:45:16')->eq('2018-07-25 12:45:17'); // false
     * ```
     *
     */
    public function eq($date): bool
    {
        return $this->equalTo($date);
    }

    /**
     * Determines if the instance is equal to another
     *
     * @param Carbon|DateTimeInterface|mixed $date
     *
     * @return bool
     * @example
     * ```
     * Carbon::parse('2018-07-25 12:45:16')->equalTo('2018-07-25 12:45:16'); // true
     * Carbon::parse('2018-07-25 12:45:16')->equalTo(Carbon::parse('2018-07-25 12:45:16')); // true
     * Carbon::parse('2018-07-25 12:45:16')->equalTo('2018-07-25 12:45:17'); // false
     * ```
     *
     */
    public function equalTo($date): bool
    {
        return $this == $date;
    }

    /**
     * Determines if the instance is not equal to another
     *
     * @param Carbon|DateTimeInterface|mixed $date
     *
     * @return bool
     * @see notEqualTo()
     *
     * @example
     * ```
     * Carbon::parse('2018-07-25 12:45:16')->ne('2018-07-25 12:45:16'); // false
     * Carbon::parse('2018-07-25 12:45:16')->ne(Carbon::parse('2018-07-25 12:45:16')); // false
     * Carbon::parse('2018-07-25 12:45:16')->ne('2018-07-25 12:45:17'); // true
     * ```
     *
     */
    public function ne($date): bool
    {
        return $this->notEqualTo($date);
    }

    /**
     * Determines if the instance is not equal to another
     *
     * @param Carbon|DateTimeInterface|mixed $date
     *
     * @return bool
     * @example
     * ```
     * Carbon::parse('2018-07-25 12:45:16')->notEqualTo('2018-07-25 12:45:16'); // false
     * Carbon::parse('2018-07-25 12:45:16')->notEqualTo(Carbon::parse('2018-07-25 12:45:16')); // false
     * Carbon::parse('2018-07-25 12:45:16')->notEqualTo('2018-07-25 12:45:17'); // true
     * ```
     *
     */
    public function notEqualTo($date): bool
    {
        return !$this->equalTo($date);
    }

    /**
     * Determines if the instance is greater (after) than another
     *
     * @param Carbon|DateTimeInterface|mixed $date
     *
     * @return bool
     * @see greaterThan()
     *
     * @example
     * ```
     * Carbon::parse('2018-07-25 12:45:16')->gt('2018-07-25 12:45:16'); // false
     * Carbon::parse('2018-07-25 12:45:16')->gt('2018-07-25 12:45:18'); // true
     * Carbon::parse('2018-07-25 12:45:16')->gt('2018-07-25 12:45:17'); // false
     * ```
     *
     */
    public function gt($date): bool
    {
        return $this->greaterThan($date);
    }

    /**
     * Determines if the instance is greater (after) than another
     *
     * @param Carbon|DateTimeInterface|mixed $date
     *
     * @return bool
     * @example
     * ```
     * Carbon::parse('2018-07-25 12:45:16')->greaterThan('2018-07-25 12:45:16'); // false
     * Carbon::parse('2018-07-25 12:45:16')->greaterThan('2018-07-25 12:45:18'); // true
     * Carbon::parse('2018-07-25 12:45:16')->greaterThan('2018-07-25 12:45:17'); // false
     * ```
     *
     */
    public function greaterThan($date): bool
    {
        return $this > $date;
    }

    /**
     * Determines if the instance is greater (after) than another
     *
     * @param Carbon|DateTimeInterface|mixed $date
     *
     * @return bool
     * @see greaterThan()
     *
     * @example
     * ```
     * Carbon::parse('2018-07-25 12:45:16')->isAfter('2018-07-25 12:45:16'); // false
     * Carbon::parse('2018-07-25 12:45:16')->isAfter('2018-07-25 12:45:18'); // true
     * Carbon::parse('2018-07-25 12:45:16')->isAfter('2018-07-25 12:45:17'); // false
     * ```
     *
     */
    public function isAfter($date): bool
    {
        return $this->greaterThan($date);
    }

    /**
     * Determines if the instance is greater (after) than or equal to another
     *
     * @param Carbon|DateTimeInterface|mixed $date
     *
     * @return bool
     * @see greaterThanOrEqualTo()
     *
     * @example
     * ```
     * Carbon::parse('2018-07-25 12:45:16')->gte('2018-07-25 12:45:16'); // true
     * Carbon::parse('2018-07-25 12:45:16')->gte('2018-07-25 12:45:18'); // true
     * Carbon::parse('2018-07-25 12:45:16')->gte('2018-07-25 12:45:17'); // false
     * ```
     *
     */
    public function gte($date): bool
    {
        return $this->greaterThanOrEqualTo($date);
    }

    /**
     * Determines if the instance is greater (after) than or equal to another
     *
     * @param Carbon|DateTimeInterface|mixed $date
     *
     * @return bool
     * @example
     * ```
     * Carbon::parse('2018-07-25 12:45:16')->greaterThanOrEqualTo('2018-07-25 12:45:16'); // true
     * Carbon::parse('2018-07-25 12:45:16')->greaterThanOrEqualTo('2018-07-25 12:45:18'); // true
     * Carbon::parse('2018-07-25 12:45:16')->greaterThanOrEqualTo('2018-07-25 12:45:17'); // false
     * ```
     *
     */
    public function greaterThanOrEqualTo($date): bool
    {
        return $this >= $date;
    }

    /**
     * Determines if the instance is less (before) than another
     *
     * @param Carbon|DateTimeInterface|mixed $date
     *
     * @return bool
     * @see lessThan()
     *
     * @example
     * ```
     * Carbon::parse('2018-07-25 12:45:16')->lt('2018-07-25 12:45:16'); // false
     * Carbon::parse('2018-07-25 12:45:16')->lt('2018-07-25 12:45:18'); // false
     * Carbon::parse('2018-07-25 12:45:16')->lt('2018-07-25 12:45:17'); // true
     * ```
     *
     */
    public function lt($date): bool
    {
        return $this->lessThan($date);
    }

    /**
     * Determines if the instance is less (before) than another
     *
     * @param Carbon|DateTimeInterface|mixed $date
     *
     * @return bool
     * @example
     * ```
     * Carbon::parse('2018-07-25 12:45:16')->lessThan('2018-07-25 12:45:16'); // false
     * Carbon::parse('2018-07-25 12:45:16')->lessThan('2018-07-25 12:45:18'); // false
     * Carbon::parse('2018-07-25 12:45:16')->lessThan('2018-07-25 12:45:17'); // true
     * ```
     *
     */
    public function lessThan($date): bool
    {
        return $this < $date;
    }

    /**
     * Determines if the instance is less (before) than another
     *
     * @param Carbon|DateTimeInterface|mixed $date
     *
     * @return bool
     * @see lessThan()
     *
     * @example
     * ```
     * Carbon::parse('2018-07-25 12:45:16')->isBefore('2018-07-25 12:45:16'); // false
     * Carbon::parse('2018-07-25 12:45:16')->isBefore('2018-07-25 12:45:18'); // false
     * Carbon::parse('2018-07-25 12:45:16')->isBefore('2018-07-25 12:45:17'); // true
     * ```
     *
     */
    public function isBefore($date): bool
    {
        return $this->lessThan($date);
    }

    /**
     * Determines if the instance is less (before) or equal to another
     *
     * @param Carbon|DateTimeInterface|mixed $date
     *
     * @return bool
     * @see lessThanOrEqualTo()
     *
     * @example
     * ```
     * Carbon::parse('2018-07-25 12:45:16')->lte('2018-07-25 12:45:16'); // true
     * Carbon::parse('2018-07-25 12:45:16')->lte('2018-07-25 12:45:18'); // false
     * Carbon::parse('2018-07-25 12:45:16')->lte('2018-07-25 12:45:17'); // true
     * ```
     *
     */
    public function lte($date): bool
    {
        return $this->lessThanOrEqualTo($date);
    }

    /**
     * Determines if the instance is less (before) or equal to another
     *
     * @param Carbon|DateTimeInterface|mixed $date
     *
     * @return bool
     * @example
     * ```
     * Carbon::parse('2018-07-25 12:45:16')->lessThanOrEqualTo('2018-07-25 12:45:16'); // true
     * Carbon::parse('2018-07-25 12:45:16')->lessThanOrEqualTo('2018-07-25 12:45:18'); // false
     * Carbon::parse('2018-07-25 12:45:16')->lessThanOrEqualTo('2018-07-25 12:45:17'); // true
     * ```
     *
     */
    public function lessThanOrEqualTo($date): bool
    {
        return $this <= $date;
    }

    /**
     * Determines if the instance is between two others, bounds excluded.
     *
     * @param Carbon|DateTimeInterface|mixed $date1
     * @param Carbon|DateTimeInterface|mixed $date2
     *
     * @return bool
     * @example
     * ```
     * Carbon::parse('2018-07-25')->betweenExcluded('2018-07-14', '2018-08-01'); // true
     * Carbon::parse('2018-07-25')->betweenExcluded('2018-08-01', '2018-08-20'); // false
     * Carbon::parse('2018-07-25')->betweenExcluded('2018-07-25', '2018-08-01'); // false
     * ```
     *
     */
    public function betweenExcluded($date1, $date2): bool
    {
        return $this->between($date1, $date2, false);
    }

    /**
     * Determines if the instance is between two others.
     *
     * @param Carbon|DateTimeInterface|mixed $date1
     * @param Carbon|DateTimeInterface|mixed $date2
     * @param bool $equal Indicates if an equal to comparison should be done
     *
     * @return bool
     * @example
     * ```
     * Carbon::parse('2018-07-25')->between('2018-07-14', '2018-08-01'); // true
     * Carbon::parse('2018-07-25')->between('2018-08-01', '2018-08-20'); // false
     * Carbon::parse('2018-07-25')->between('2018-07-25', '2018-08-01'); // false
     * Carbon::parse('2018-07-25')->between('2018-07-25', '2018-08-01', true); // true
     * ```
     *
     */
    public function between($date1, $date2, $equal = true): bool
    {
        $date1 = $this->resolveCarbon($date1);
        $date2 = $this->resolveCarbon($date2);

        if ($date1->greaterThan($date2)) {
            $temp = $date1;
            $date1 = $date2;
            $date2 = $temp;
        }

        if ($equal) {
            return $this->greaterThanOrEqualTo($date1) && $this->lessThanOrEqualTo($date2);
        }

        return $this->greaterThan($date1) && $this->lessThan($date2);
    }

    /**
     * Determines if the instance is between two others
     *
     * @param Carbon|DateTimeInterface|mixed $date1
     * @param Carbon|DateTimeInterface|mixed $date2
     * @param bool $equal Indicates if an equal to comparison should be done
     *
     * @return bool
     * @example
     * ```
     * Carbon::parse('2018-07-25')->isBetween('2018-07-14', '2018-08-01'); // true
     * Carbon::parse('2018-07-25')->isBetween('2018-08-01', '2018-08-20'); // false
     * Carbon::parse('2018-07-25')->isBetween('2018-07-25', '2018-08-01'); // false
     * Carbon::parse('2018-07-25')->isBetween('2018-07-25', '2018-08-01', true); // true
     * ```
     *
     */
    public function isBetween($date1, $date2, $equal = true): bool
    {
        return $this->between($date1, $date2, $equal);
    }

    /**
     * Determines if the instance is a weekday.
     *
     * @return bool
     * @example
     * ```
     * Carbon::parse('2019-07-14')->isWeekday(); // false
     * Carbon::parse('2019-07-15')->isWeekday(); // true
     * ```
     *
     */
    public function isWeekday()
    {
        return !$this->isWeekend();
    }

    /**
     * Determines if the instance is a weekend day.
     *
     * @return bool
     * @example
     * ```
     * Carbon::parse('2019-07-14')->isWeekend(); // true
     * Carbon::parse('2019-07-15')->isWeekend(); // false
     * ```
     *
     */
    public function isWeekend()
    {
        return in_array($this->dayOfWeek, static::$weekendDays);
    }

    /**
     * Determines if the instance is yesterday.
     *
     * @return bool
     * @example
     * ```
     * Carbon::yesterday()->isYesterday(); // true
     * Carbon::tomorrow()->isYesterday(); // false
     * ```
     *
     */
    public function isYesterday()
    {
        return $this->toDateString() === static::yesterday($this->getTimezone())->toDateString();
    }

    /**
     * Determines if the instance is today.
     *
     * @return bool
     * @example
     * ```
     * Carbon::today()->isToday(); // true
     * Carbon::tomorrow()->isToday(); // false
     * ```
     *
     */
    public function isToday()
    {
        return $this->toDateString() === $this->nowWithSameTz()->toDateString();
    }

    /**
     * Determines if the instance is tomorrow.
     *
     * @return bool
     * @example
     * ```
     * Carbon::tomorrow()->isTomorrow(); // true
     * Carbon::yesterday()->isTomorrow(); // false
     * ```
     *
     */
    public function isTomorrow()
    {
        return $this->toDateString() === static::tomorrow($this->getTimezone())->toDateString();
    }

    /**
     * Determines if the instance is in the future, ie. greater (after) than now.
     *
     * @return bool
     * @example
     * ```
     * Carbon::now()->addHours(5)->isFuture(); // true
     * Carbon::now()->subHours(5)->isFuture(); // false
     * ```
     *
     */
    public function isFuture()
    {
        return $this->greaterThan($this->nowWithSameTz());
    }

    /**
     * Determines if the instance is in the past, ie. less (before) than now.
     *
     * @return bool
     * @example
     * ```
     * Carbon::now()->subHours(5)->isPast(); // true
     * Carbon::now()->addHours(5)->isPast(); // false
     * ```
     *
     */
    public function isPast()
    {
        return $this->lessThan($this->nowWithSameTz());
    }

    /**
     * Determines if the instance is a leap year.
     *
     * @return bool
     * @example
     * ```
     * Carbon::parse('2020-01-01')->isLeapYear(); // true
     * Carbon::parse('2019-01-01')->isLeapYear(); // false
     * ```
     *
     */
    public function isLeapYear()
    {
        return $this->rawFormat('L') === '1';
    }

    /**
     * Determines if the instance is a long year
     *
     * @return bool
     * @see https://en.wikipedia.org/wiki/ISO_8601#Week_dates
     *
     * @example
     * ```
     * Carbon::parse('2015-01-01')->isLongYear(); // true
     * Carbon::parse('2016-01-01')->isLongYear(); // false
     * ```
     *
     */
    public function isLongYear()
    {
        return static::create($this->year, 12, 28, 0, 0, 0, $this->tz)->weekOfYear === 53;
    }

    /**
     * Determines if the instance is in the current unit given.
     *
     * @param string $unit singular unit string
     * @param Carbon|DateTimeInterface|null $date instance to compare with or null to use current day.
     *
     * @return bool
     * @throws InvalidArgumentException
     *
     * @example
     * ```
     * Carbon::parse('2019-01-13')->isSameUnit('year', Carbon::parse('2019-12-25')); // true
     * Carbon::parse('2018-12-13')->isSameUnit('year', Carbon::parse('2019-12-25')); // false
     * ```
     *
     */
    public function isSameUnit($unit, $date = null)
    {
        $units = [
            // @call isSameUnit
            'year' => 'Y',
            // @call isSameUnit
            'week' => 'o-W',
            // @call isSameUnit
            'day' => 'Y-m-d',
            // @call isSameUnit
            'hour' => 'Y-m-d H',
            // @call isSameUnit
            'minute' => 'Y-m-d H:i',
            // @call isSameUnit
            'second' => 'Y-m-d H:i:s',
            // @call isSameUnit
            'micro' => 'Y-m-d H:i:s.u',
            // @call isSameUnit
            'microsecond' => 'Y-m-d H:i:s.u',
        ];

        if (!isset($units[$unit])) {
            if (isset($this->$unit)) {
                $date = $date ? static::instance($date) : static::now($this->tz);

                static::expectDateTime($date);

                return $this->$unit === $date->$unit;
            }

            if ($this->localStrictModeEnabled ?? static::isStrictModeEnabled()) {
                throw new InvalidArgumentException("Bad comparison unit: '$unit'");
            }

            return false;
        }

        return $this->isSameAs($units[$unit], $date);
    }

    /**
     * Compares the formatted values of the two dates.
     *
     * @param string $format date formats to compare.
     * @param Carbon|DateTimeInterface|null $date instance to compare with or null to use current day.
     *
     * @return bool
     * @throws InvalidArgumentException
     *
     * @example
     * ```
     * Carbon::parse('2019-06-13')->isSameAs('Y-d', Carbon::parse('2019-12-13')); // true
     * Carbon::parse('2019-06-13')->isSameAs('Y-d', Carbon::parse('2019-06-14')); // false
     * ```
     *
     */
    public function isSameAs($format, $date = null)
    {
        /** @var DateTimeInterface $date */
        $date = $date ?: static::now($this->tz);

        static::expectDateTime($date, 'null');

        /* @var CarbonInterface $this */
        return $this->rawFormat($format) === ($date instanceof self ? $date->rawFormat($format) : $date->format($format));
    }

    /**
     * Determines if the instance is in the current unit given.
     *
     * @param string $unit The unit to test.
     *
     * @return bool
     * @throws BadMethodCallException
     *
     * @example
     * ```
     * Carbon::now()->isCurrentUnit('hour'); // true
     * Carbon::now()->subHours(2)->isCurrentUnit('hour'); // false
     * ```
     *
     */
    public function isCurrentUnit($unit)
    {
        return $this->{'isSame' . ucfirst($unit)}();
    }

    /**
     * Checks if the passed in date is in the same quarter as the instance quarter (and year if needed).
     *
     * @param Carbon|DateTimeInterface|null $date The instance to compare with or null to use current day.
     * @param bool $ofSameYear Check if it is the same month in the same year.
     *
     * @return bool
     * @example
     * ```
     * Carbon::parse('2019-01-12')->isSameQuarter(Carbon::parse('2019-03-01')); // true
     * Carbon::parse('2019-01-12')->isSameQuarter(Carbon::parse('2019-04-01')); // false
     * Carbon::parse('2019-01-12')->isSameQuarter(Carbon::parse('2018-03-01')); // false
     * Carbon::parse('2019-01-12')->isSameQuarter(Carbon::parse('2018-03-01'), false); // true
     * ```
     *
     */
    public function isSameQuarter($date = null, $ofSameYear = true)
    {
        $date = $date ? static::instance($date) : static::now($this->tz);

        static::expectDateTime($date, 'null');

        return $this->quarter === $date->quarter && (!$ofSameYear || $this->isSameYear($date));
    }

    /**
     * Checks if this day is a specific day of the week.
     *
     * @param int $dayOfWeek
     *
     * @return bool
     * @example
     * ```
     * Carbon::parse('2019-07-17')->isDayOfWeek(Carbon::WEDNESDAY); // true
     * Carbon::parse('2019-07-17')->isDayOfWeek(Carbon::FRIDAY); // false
     * Carbon::parse('2019-07-17')->isDayOfWeek('Wednesday'); // true
     * Carbon::parse('2019-07-17')->isDayOfWeek('Friday'); // false
     * ```
     *
     */
    public function isDayOfWeek($dayOfWeek)
    {
        if (is_string($dayOfWeek) && defined($constant = static::class . '::' . strtoupper($dayOfWeek))) {
            $dayOfWeek = constant($constant);
        }

        return $this->dayOfWeek === $dayOfWeek;
    }

    /**
     * Check if its the birthday. Compares the date/month values of the two dates.
     *
     * @param Carbon|DateTimeInterface|null $date The instance to compare with or null to use current day.
     *
     * @return bool
     * @example
     * ```
     * Carbon::now()->subYears(5)->isBirthday(); // true
     * Carbon::now()->subYears(5)->subDay()->isBirthday(); // false
     * Carbon::parse('2019-06-05')->isBirthday(Carbon::parse('2001-06-05')); // true
     * Carbon::parse('2019-06-05')->isBirthday(Carbon::parse('2001-06-06')); // false
     * ```
     *
     */
    public function isBirthday($date = null)
    {
        return $this->isSameAs('md', $date);
    }

    /**
     * Check if today is the last day of the Month
     *
     * @return bool
     * @example
     * ```
     * Carbon::parse('2019-02-28')->isLastOfMonth(); // true
     * Carbon::parse('2019-03-28')->isLastOfMonth(); // false
     * Carbon::parse('2019-03-30')->isLastOfMonth(); // false
     * Carbon::parse('2019-03-31')->isLastOfMonth(); // true
     * Carbon::parse('2019-04-30')->isLastOfMonth(); // true
     * ```
     *
     */
    public function isLastOfMonth()
    {
        return $this->day === $this->daysInMonth;
    }

    /**
     * Check if the instance is end of day.
     *
     * @param bool $checkMicroseconds check time at microseconds precision
     *
     * @return bool
     * @example
     * ```
     * Carbon::parse('2019-02-28 23:59:59.999999')->isEndOfDay(); // true
     * Carbon::parse('2019-02-28 23:59:59.123456')->isEndOfDay(); // true
     * Carbon::parse('2019-02-28 23:59:59')->isEndOfDay(); // true
     * Carbon::parse('2019-02-28 23:59:58.999999')->isEndOfDay(); // false
     * Carbon::parse('2019-02-28 23:59:59.999999')->isEndOfDay(true); // true
     * Carbon::parse('2019-02-28 23:59:59.123456')->isEndOfDay(true); // false
     * Carbon::parse('2019-02-28 23:59:59')->isEndOfDay(true); // false
     * ```
     *
     */
    public function isEndOfDay($checkMicroseconds = false)
    {
        /* @var CarbonInterface $this */
        return $checkMicroseconds
            ? $this->rawFormat('H:i:s.u') === '23:59:59.999999'
            : $this->rawFormat('H:i:s') === '23:59:59';
    }

    /**
     * Check if the instance is start of day / midnight.
     *
     * @return bool
     * @example
     * ```
     * Carbon::parse('2019-02-28 00:00:00')->isMidnight(); // true
     * Carbon::parse('2019-02-28 00:00:00.999999')->isMidnight(); // true
     * Carbon::parse('2019-02-28 00:00:01')->isMidnight(); // false
     * ```
     *
     */
    public function isMidnight()
    {
        return $this->isStartOfDay();
    }

    /**
     * Check if the instance is start of day / midnight.
     *
     * @param bool $checkMicroseconds check time at microseconds precision
     *
     * @return bool
     * @example
     * ```
     * Carbon::parse('2019-02-28 00:00:00')->isStartOfDay(); // true
     * Carbon::parse('2019-02-28 00:00:00.999999')->isStartOfDay(); // true
     * Carbon::parse('2019-02-28 00:00:01')->isStartOfDay(); // false
     * Carbon::parse('2019-02-28 00:00:00.000000')->isStartOfDay(true); // true
     * Carbon::parse('2019-02-28 00:00:00.000012')->isStartOfDay(true); // false
     * ```
     *
     */
    public function isStartOfDay($checkMicroseconds = false)
    {
        /* @var CarbonInterface $this */
        return $checkMicroseconds
            ? $this->rawFormat('H:i:s.u') === '00:00:00.000000'
            : $this->rawFormat('H:i:s') === '00:00:00';
    }

    /**
     * Check if the instance is midday.
     *
     * @return bool
     * @example
     * ```
     * Carbon::parse('2019-02-28 11:59:59.999999')->isMidday(); // false
     * Carbon::parse('2019-02-28 12:00:00')->isMidday(); // true
     * Carbon::parse('2019-02-28 12:00:00.999999')->isMidday(); // true
     * Carbon::parse('2019-02-28 12:00:01')->isMidday(); // false
     * ```
     *
     */
    public function isMidday()
    {
        /* @var CarbonInterface $this */
        return $this->rawFormat('G:i:s') === static::$midDayAt . ':00:00';
    }

    /**
     * Returns true if the current date matches the given string.
     *
     * @param string $tester day name, month name, hour, date, etc. as string
     *
     * @return bool
     * @example
     * ```
     * var_dump(Carbon::parse('2019-06-02 12:23:45')->is('2019')); // true
     * var_dump(Carbon::parse('2019-06-02 12:23:45')->is('2018')); // false
     * var_dump(Carbon::parse('2019-06-02 12:23:45')->is('2019-06')); // true
     * var_dump(Carbon::parse('2019-06-02 12:23:45')->is('06-02')); // true
     * var_dump(Carbon::parse('2019-06-02 12:23:45')->is('2019-06-02')); // true
     * var_dump(Carbon::parse('2019-06-02 12:23:45')->is('Sunday')); // true
     * var_dump(Carbon::parse('2019-06-02 12:23:45')->is('June')); // true
     * var_dump(Carbon::parse('2019-06-02 12:23:45')->is('12:23')); // true
     * var_dump(Carbon::parse('2019-06-02 12:23:45')->is('12:23:45')); // true
     * var_dump(Carbon::parse('2019-06-02 12:23:45')->is('12:23:00')); // false
     * var_dump(Carbon::parse('2019-06-02 12:23:45')->is('12h')); // true
     * var_dump(Carbon::parse('2019-06-02 15:23:45')->is('3pm')); // true
     * var_dump(Carbon::parse('2019-06-02 15:23:45')->is('3am')); // false
     * ```
     *
     */
    public function is(string $tester)
    {
        $tester = trim($tester);

        if (preg_match('/^\d+$/', $tester)) {
            return $this->year === intval($tester);
        }

        if (preg_match('/^\d{3,}-\d{1,2}$/', $tester)) {
            return $this->isSameMonth(static::parse($tester));
        }

        if (preg_match('/^\d{1,2}-\d{1,2}$/', $tester)) {
            return $this->isSameDay(static::parse($this->year . '-' . $tester));
        }

        $modifier = preg_replace('/(\d)h$/i', '$1:00', $tester);

        /* @var CarbonInterface $max */
        $median = static::parse('5555-06-15 12:30:30.555555')->modify($modifier);
        $current = $this->copy();
        /* @var CarbonInterface $other */
        $other = $this->copy()->modify($modifier);

        if ($current->eq($other)) {
            return true;
        }

        if (preg_match('/\d:\d{1,2}:\d{1,2}$/', $tester)) {
            return $current->startOfSecond()->eq($other);
        }

        if (preg_match('/\d:\d{1,2}$/', $tester)) {
            return $current->startOfMinute()->eq($other);
        }

        if (preg_match('/\d(h|am|pm)$/', $tester)) {
            return $current->startOfHour()->eq($other);
        }

        if (preg_match(
            '/^(january|february|march|april|may|june|july|august|september|october|november|december)\s+\d+$/i',
            $tester
        )) {
            return $current->startOfMonth()->eq($other->startOfMonth());
        }

        $units = [
            'month' => [1, 'year'],
            'day' => [1, 'month'],
            'hour' => [0, 'day'],
            'minute' => [0, 'hour'],
            'second' => [0, 'minute'],
            'microsecond' => [0, 'second'],
        ];

        foreach ($units as $unit => [$minimum, $startUnit]) {
            if ($median->$unit === $minimum) {
                $current = $current->startOf($startUnit);

                break;
            }
        }

        return $current->eq($other);
    }

    /**
     * Checks if the passed in date is in the same month as the instance´s month.
     *
     * @param Carbon|DateTimeInterface|null $date The instance to compare with or null to use the current date.
     * @param bool $ofSameYear Check if it is the same month in the same year.
     *
     * @return bool
     * @example
     * ```
     * Carbon::parse('2019-01-12')->isSameMonth(Carbon::parse('2019-01-01')); // true
     * Carbon::parse('2019-01-12')->isSameMonth(Carbon::parse('2019-02-01')); // false
     * Carbon::parse('2019-01-12')->isSameMonth(Carbon::parse('2018-01-01')); // false
     * Carbon::parse('2019-01-12')->isSameMonth(Carbon::parse('2018-01-01'), false); // true
     * ```
     *
     */
    public function isSameMonth($date = null, $ofSameYear = true)
    {
        return $this->isSameAs($ofSameYear ? 'Y-m' : 'm', $date);
    }
}

<?php

/*
PHP - DateTime Object
*/

// Current date and time
$now = new DateTime();
print_r($now);
/*
DateTime Object
(
    [date] => 2025-02-06 15:21:49.326390 //for example datetime for current time
    [timezone_type] => 3
    [timezone] => UTC
)
*/

// Specific date and time
$date = new DateTime("2023-10-25 14:30:00");
print_r($date);
/*
DateTime Object
(
    [date] => 2023-10-25 14:30:00.000000
    [timezone_type] => 3
    [timezone] => UTC
)
 */

// With a specific time zone
/*
Working with Time Zones
You can set or change the time zone of a DateTime object using the setTimezone() method.
*/
$timezone = new DateTimeZone("America/New_York");
$dateWithTimezone = new DateTime("2023-10-25 14:30:00", $timezone);
print_r($dateWithTimezone);
/*
DateTime Object
(
    [date] => 2023-10-25 14:30:00.000000
    [timezone_type] => 3
    [timezone] => America/New_York
)
*/
$date = new DateTime("2023-10-25 14:30:00", new DateTimeZone("America/New_York"));
echo $date->format("Y-m-d H:i:s"); // Output: 2023-10-25 14:30:00

$date->setTimezone(new DateTimeZone("Europe/London"));
echo $date->format("Y-m-d H:i:s"); // Output: 2023-10-25 19:30:00
/*
 Formatting Dates
You can format a DateTime object into a string using the format() method. 
The method accepts a format string with placeholders (e.g., Y for year, m for month, d for day).

Common Format Characters:
Y: 4-digit year (e.g., 2023)
m: 2-digit month (e.g., 01 for January)
d: 2-digit day (e.g., 25)
H: 24-hour format hour (e.g., 14)
i: Minutes (e.g., 30)
s: Seconds (e.g., 00)
D: Day of the week (e.g., Mon)
M: Month name (e.g., Jan)
*/
 
echo $date->format("Y-m-d H:i:s"); // Output: 2023-10-25 14:30:00
echo $date->format("D, M j, Y");   // Output: Wed, Oct 25, 2023

/*
Modifying Dates
You can modify a DateTime object using the modify() method. 
It accepts a relative date/time string (e.g., +1 day, -2 weeks).
*/ 
$date->modify("+1 week");
echo $date->format("Y-m-d"); // Output: 2023-11-01

/*
Adding or Subtracting Intervals
You can use the DateInterval class to add or subtract a specific interval (e.g., days, months, years) from a DateTime object.
*/

$date = new DateTime("2023-10-25");
$interval = new DateInterval("P2D"); // 2 days
print_r($interval);
/*
DateInterval Object      
(
    [y] => 0
    [m] => 0
    [d] => 2
    [h] => 0
    [i] => 0
    [s] => 0
    [f] => 0
    [invert] => 0
    [days] =>
    [from_string] =>
)
    */
$date->add($interval);
echo $date->format("Y-m-d"); // Output: 2023-10-27

$date->sub(new DateInterval("P1M")); // Subtract 1 month
echo $date->format("Y-m-d"); // Output: 2023-09-27

/*
Comparing Dates
You can compare two DateTime objects using comparison operators (<, >, ==, etc.) 
or the diff() method, which returns a DateInterval object.
*/
$date1 = new DateTime("2023-10-25");
$date2 = new DateTime("2023-11-01");

if ($date1 < $date2) {
    echo "Date1 is earlier than Date2.";
}

$interval = $date1->diff($date2);
echo $interval->format("%R%a days"); // Output: +7 days

$birthday = new DateTime("2002-02-19");
$today = new DateTime("now");
$interval = $birthday->diff($today);

echo "You are " . $interval->y . " years, " . $interval->m . " months, and " . $interval->d . " days old.";

/*
Creating from a Format
If you have a date string in a non-standard format, you can use the DateTime::createFromFormat() method to create a DateTime object.
*/
$date = DateTime::createFromFormat("d/m/Y", "25/10/2023");
echo $date->format("Y-m-d"); // Output: 2023-10-25

/*
Getting Timestamps
You can get the Unix timestamp (seconds since January 1, 1970) from a DateTime object using the getTimestamp() method.
*/ 
echo $date->getTimestamp(); // Output: 1698244200

/*
Immutable DateTime
PHP also provides an immutable version of DateTime called DateTimeImmutable. 
Unlike DateTime, modifications to DateTimeImmutable return a new object instead of modifying the original.
*/
$date = new DateTimeImmutable("2023-10-25");
$newDate = $date->modify("+1 week");
echo $date->format("Y-m-d");    // Output: 2023-10-25
echo $newDate->format("Y-m-d"); // Output: 2023-11-01
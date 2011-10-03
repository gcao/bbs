<?php
/**
* Compares all running instances to all reserved instances and reports
* utilization. Useful for making sure you're not wasting money. :P
*
* Requires EC2_CERT and EC2_PRIVATE_KEY environment variables to be set.
*
* @author Dave
* @date 2010-10-05
*/

echo "Comparing reserved instances to running instances... ";

$result = array();
$output = array();

// Get all reserved instance details.
exec("ec2-describe-reserved-instances | awk '{ print $3, $4, $9 }'", $output);
foreach ($output as $line) {
   list($zone, $type, $quantity) = explode(" ", $line);
   $result[$type][$zone]['reserved'] += $quantity;
   $reserved += $quantity;
}

$output = array();

// Get all running instance details.
exec("ec2-describe-instances | grep INSTANCE | grep running | awk '{ print $9, $11 }'", $output);
foreach ($output as $line) {
   list($type, $zone) = explode(" ", $line);
   $result[$type][$zone]['used']++;
   $running++;
}

echo "\n\n";

// Output the details.
foreach ($result as $type => $zones) {
   echo "{$type}:\n";
   foreach ($zones as $zone => $details) {
      echo " {$zone} " . ($details['used'] ? 1 : 0) . "/" . ($details['reserved'] ? 1 : 0) . "\n";
   }
   echo "\n";
}

echo "--\n";

// Summarize.
$unused = max($reserved - $running, 0);
$unreserved = max($running - $reserved, 0);
echo "{$unused} unused reserved (" . ($unused ? "bad" : "good") . ")\n";
echo "{$unreserved} unreserved running (" . ($unreserved ? "bad" : "good") .")\n";
echo "\n";

?>

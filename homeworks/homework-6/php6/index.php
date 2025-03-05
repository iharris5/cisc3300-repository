<?php

$animalSounds = [
	'monkey' => 'ook',
	'dog' => 'bark',
	'pig' => 'oink',
];

foreach ($animalSounds as $key => $value) {
	echo "$key: $value";
	echo '<br>';
}

function describeSound(string $key, string $value = "um, I'm not sure"): string {
	return "The $key goes: $value.";
}

echo describeSound("bird", "chirp"). "<br>";
echo describeSound("koala"). "<br>";
?>

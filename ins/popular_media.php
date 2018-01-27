<?php

require 'instagram.class.php';

// Initialize class for public requests
$instagram = new Instagram('4b8f0b0fd97b4c77b55b93ed03825c47');

// Get popular media
//$popular = $instagram->getMedia(3047388)
$popular = $instagram->getPopularMedia();

// Display results
foreach ($popular->data as $data) {
  echo "<img src=\"{$data->images->thumbnail->url}\">";
}

?>
<?php
// Get the search query from the URL parameter
$query = $_GET['q'];

// Construct the Google search URL
$googleUrl = "https://www.google.com/search?q=" . urlencode($query);

// Make the request to Google and retrieve the response
$response = file_get_contents($googleUrl);

// Parse the HTML response to find the first search result
$doc = new DOMDocument();
$doc->loadHTML($response);
$result = $doc->getElementById('search')->getElementsByTagName('a')[0];

// Output the first search result as HTML
echo '<a href="' . $result->getAttribute('href') . '">' . $result->textContent . '</a>';
?>
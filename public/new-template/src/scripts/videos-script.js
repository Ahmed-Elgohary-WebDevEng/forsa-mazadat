function getYouTubeVideoId(url) {
  // Regular expression to match YouTube video ID in various URL formats
  const regExp =
    /^(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;

  // Use the regular expression to extract the video ID
  const match = url.match(regExp);

  // If there is a match, return the video ID, otherwise return null
  return match ? match[1] : null;
}

// Example usage:
const youtubeUrl = "https://www.youtube.com/watch?v=SgmNxE9lWcY&t=1018s";
const videoId = getYouTubeVideoId(youtubeUrl);

if (videoId) {
  console.log("YouTube Video ID:", videoId);
} else {
  console.log("Invalid YouTube URL");
}


/*
<?php

function getYouTubeVideoID($url) {
  // Extract the video ID from the YouTube URL
  $parsed_url = parse_url($url);

  if (isset($parsed_url['query'])) {
    parse_str($parsed_url['query'], $query_params);

    if (isset($query_params['v'])) {
      return $query_params['v'];
    }
  }

  // If the above method fails, attempt to extract the video ID using a regular expression
  $pattern = '/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
  preg_match($pattern, $url, $matches);

  // If a match is found, return the video ID
  if (!empty($matches[1])) {
    return $matches[1];
  }

  // If no match is found, return false
  return false;
}

// Example usage:
$youtube_url = 'https://www.youtube.com/watch?v=ABCDEFGHIJK';
$video_id = getYouTubeVideoID($youtube_url);

if ($video_id) {
  echo "YouTube Video ID: $video_id";
} else {
  echo "Invalid YouTube URL";
}
    ?>
*/

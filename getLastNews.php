<?php

$url = "https://habr.com/ru/rss/best/daily/";
$rss = simplexml_load_file($url);
if ($rss)
{
  $items = $rss->channel->item;
  $item_count = 0;
  foreach($items as $item)
  {
    $title = $item->title;
    $link = $item->link;
    $ts = strtotime($item->pubDate);
    $published_on = date("Y-m-d", $ts);
    $description = $item->description;
    echo '<h3><a href="' . $link . '">' . $title . '</a></h3>';
    echo '<p>' . $description . '</p>';
    if(++$item_count >= 5)
      break;
  }
}

?>
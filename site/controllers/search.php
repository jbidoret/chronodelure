<?php

return function ($site) {

  
  $tag = param("tag");
  if($tag){
    $query = null;
    $ispeople = null;
    $tag = urldecode($tag);
    $results = $site->index()->listed()->filterBy('lecturers',  $tag, ',');
  } else {
    $tag = null;
    $query = get('q');
    $results = $site->search($query, 'title|text|lecturers|readmores')->template('session')->sortBy('year');
    $lecturers = $site->find("personnalites")->children()->listed();
    $ispeople = $lecturers->search($query, 'title');
  }

  

  return [
    'query'   => $query,
    'tag'   => $tag,
    'results' => $results,
    'ispeople' => $ispeople
  ];

};
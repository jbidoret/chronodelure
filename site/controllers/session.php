<?php
return function($site, $pages, $page) {

  $sessions = $site->index()->template('session')->listed()->sortBy("year", "asc");
  return compact('sessions');

};

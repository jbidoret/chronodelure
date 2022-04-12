<?php
class SessionPage extends Page {
    public static function hookPageCreate($page){
        // get value of add field remoteUrl
        $year = $page->year()->value();
        // set slug according to add field title
        $page->changeSlug(Str::slug($year . '-' . $page->title()->value()));
    }

}
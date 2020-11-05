<?php

use App\Models\Service;

function getLogo()
{
    $data = \App\Models\Logo::first();
    if ($data != null) {
        return $data->logo_image;
    }
}

function setActiveHome($segment)
{
    if (Request::segment(1) == '') {
        return 'active';
    }
}

function setActive($segment)
{
    if($segment == Request::segment(1)) {
        return 'active';
    }
}

function getThemeName()
{
    $theme = \App\Models\Theme::where('status', 1)->first();
    return $theme->en_title;
}

function getServices()
{
    $subServices = Service::where('parent_id', '!=', null)->get();
    $parentServices = Service::where('parent_id', null)->get();
    $subCategory = [];
    foreach ($parentServices as $parent) {
        foreach ($subServices as $index => $sub) {
            if ($parent->id == $sub->parent_id) {
                array_push($subCategory, [
                    $parent->id   => $sub->en_title . '-' .$sub->id
                ]);
            }
        }
    }
    return $subCategory;
}

function getYoutubeId($url)
{
    parse_str(parse_url($url, PHP_URL_QUERY), $result);
    if (isset($result['v'])) {
        return $result['v'];
    }
    $request = parse_url($url);
    return $request['path'];
}

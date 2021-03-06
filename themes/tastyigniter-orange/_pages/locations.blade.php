---
title: main::lang.locations.title
layout: default
permalink: /locations

'[localSearch]':

'[localList]':
---
<div class="container">
    <div class="row py-4">
        <div class="locations-filter col-sm-3">
            @partial('localList::filter')
        </div>
        <div class="location-list col-sm-9">
            @partial('localList::search')

            @partial('localList::sorting')

            @component('localList')
        </div>
    </div>
</div>

function Podcast(node, src, options){
    this.options = $.extend({}, Podcast.DEFAULTS, options || {});
}

$.extend(Podcast, {
    DEFAULTS:{}
});

Podcast.prototype = {
}



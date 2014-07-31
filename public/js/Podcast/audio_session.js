function AudioSession(node, options) {
    this.options = $.extend({}, AudioSession.DEFAULTS, options || {});
    this.node = node;

    if (this.options.load_session) {
        this._loadSession();
    }
    this._setListeners();
}

$.extend(AudioSession, {
    DEFAULTS:{
        checks_exist    : false,
        get_session_url : null,
        load_session    : true, // Whether or not to load the current time
        ping_time       :  5, // The number of seconds to update a user session
        set_session_url : null
    }
});

AudioSession.prototype = {
    _loadSession: function () {
        var self = this;
        $.get(this.options.get_session_url, function(response) {
            if (response.seconds_in) {
                self._setTime(response.seconds_in);
            }
        })
    },

    _setListeners: function() {
        var last_ping_time = -1;
        var self = this;
        self.node.on('timeupdate', function(secs) {
            var current_time = Math.round(self.node.prop('currentTime'));
            if (current_time % self.options.ping_time == 0) {
                if(last_ping_time != current_time) {
                    self._updateSession(current_time);
                }
                last_ping_time = current_time;
            }
        });
    },

    _setTime: function(time) {
        var self = this;
        self.node.on('loadedmetadata', function(){
            self.node.prop('currentTime', time);
        });
    },

    ff: function(secs) {
        var current_time = this.node.prop('currentTime');
        this.node.prop('currentTime', current_time + secs);
    },

    pause: function() {
        this.node.pause();
    },

    play: function() {
        this.node.play();
    },

    rewind: function(secs) {
        var current_time = this.node.prop('currentTime');
        this.node.prop('currentTime', current_time - secs);
    },

    _updateSession: function(time) {
        if(! time) {
            console.warn('Time not set!');
            return false;
        }

        if(! this.options.set_session_url) {
            console.warn('Option session_url is empty');
            return false;
        }

        var data = {
            episode_id   : this.options.episode_id,
            current_time : time
        };

        $.post(this.options.set_session_url, data, function(response) {
            console.log(response);
        });
    }
}
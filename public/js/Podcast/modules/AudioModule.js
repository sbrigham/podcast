angular.module('sbAudioDirective', [])
    .directive('sbAudio', ['AudioSession', function() {
      return {
        restrict : 'E',
        scope: {
          src: '='
        },
        templateUrl: 'partials/directives/sb-audio.html'
      }
    }])
    .controller('AudioSessionController', function($scope, $element, User, AudioSession) {
        var audio_session = new AudioSession($($element).find('audio').get(0), $scope.$parent.$parent.episode_id);

        if (User.loggedIn()) {
            audio_session.remember();
        }

        $scope.rw = function (time) {
            audio_session.rw(time);
        }

        $scope.ff = function (time) {
            audio_session.ff(time);
        }
    })
    .factory('AudioSession', ['$http', function($http) {
        return function(audio_node, episode_id) {
            function initRemember() {
                $http.get('/api/episode/'+episode_id+'/session').success(function(response) {
                    setListeners();
                    setTime(response.seconds_in);
                });
            }

            function setListeners() {
                var last_ping_time = -1;
                var self = this;
                $(audio_node).on('timeupdate', function(secs) {
                    var current_time = Math.round(audio_node.currentTime);

                    if (current_time % 5 == 0 && current_time > 0) {
                        if(last_ping_time != current_time) {
                            updateSession(current_time);
                        }
                        last_ping_time = current_time;
                    }
                });
            }

            function setTime(time) {
                $(audio_node).on('loadedmetadata', function() {
                    audio_node.currentTime = time;
                });
            }

            function updateSession(time) {
                var data = {
                    episode_id   : episode_id,
                    current_time : time
                };

                $http.post('/api/episode/'+episode_id+'/session', data, function(response) {
                    console.log(response);
                });
            }

            return {
                /**
                 * Responsible for remembering the user's last listened location
                 *
                 * Needs to throw an exception if the user is not logged in...
                 *
                 * @param episode_id
                 */
                remember: function() {
                    initRemember();
                },
                ff: function (time) {
                    audio_node.currentTime = audio_node.currentTime + time;
                },
                rw: function(time) {
                    audio_node.currentTime = audio_node.currentTime - time;
                }
            }
        }
    }]);
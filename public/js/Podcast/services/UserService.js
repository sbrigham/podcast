/**
 * Note this is only to be used where access security is not a necessary
 */
angular.module('UserService', [])
    .factory('User', function() {
        var user = null;
        return {
            getId: function() {
                return user.id;
            },
            loggedIn: function() {
                return user != null;
            },
            setUser: function(u) {
                user = u[0];
            },
            whatever: function() {
                return user;
            }
        }

    });
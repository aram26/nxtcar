'use strict';

define([],function(){
    return angular.module("Ride",[
        'Geolocation',
        'Facebook',
        'ngResource',
        'Interpolation',
        'mgcrea.ngStrap.popover',
        'ngAnimate'])
    .service("RideManager",function($resource){
        return $resource('/api/rides/:where/:what',{},{
            search: {method: 'POST',isArray: false,params: {where: 'finds'}},
            checkUser: {method: 'GET',isArray:false,params: {where: 'is',what: 'login'}}
        });
    })
    .directive('cloak',function($timeout){
        return {
            restrict: 'C',
            compile: function(el){
                $timeout(function(){
                    el.removeClass('cloak');
                },1);
            }
        }
    })
    .directive('dbSlider',function(){
        return {
            restrict: 'EA',
            scope: {
                callback: '&'
            },
            compile: function(){
                return function(scope,el){
                    el.jRange({
                        from: 0,
                        to: 23,
                        step: 1,
                        scale: [0,5,10,15,20,23],
                        format: '%s',
                        width: 200,
                        showLabels: true,
                        isRange : true,
                        onstatechange: scope.callback
                    })
                }
            }
        }
    })
    .directive("currency",function(){
        return {
            restrict: 'A',
            scope: {
                currency: '='
            },
            compile: function(){
                return function(scope,el){
                    scope.$watch('currency',function(d){
                        if(angular.isUndefined(d)){
                            return;
                        }
                        el.html(d);
                    },true)
                }
            }
        }
    })
    .directive("datepicker",function(){
        return {
            restrict: "A",
            scope: {
                ngModel: '=',
                minDate: '=',
                maxDate: '='
            },
            compile: function compileFn(){
                return function linkFn(scope,el){
                    var minDate = scope.minDate ? scope.minDate: new Date();
                    el.datepicker({
                        dateFormat: 'yy-mm-dd',
                        minDate: minDate,
                        onSelect: function(date){
                            scope.ngModel = date;
                            scope.$apply();
                        }
                    });

                    scope.$watch('minDate',function(d){
                        if(angular.isUndefined(d)){
                            return;
                        }
                        el.datepicker("option", "minDate", scope.minDate);
                    },false);

                    scope.$watch('maxDate',function(d){
                        if(angular.isUndefined(d)){
                            return;
                        }
                        el.datepicker("option", "maxDate", scope.maxDate);
                    },false);
                }
            }
        }
    })
    .directive('altDatepicker',function(){
        return {
            restrict: "A",
            scope: {
                ngModel: '=',
                outWeek: "=",
                returnWeek: "=",
                tripWeek: "=",
                minDate: '=',
                maxDate: '='
            },
            compile: function compileFn(){
                return function linkFn(scope,el,attrs){
                    var minDate = scope.minDate ? scope.minDate: new Date();
                    el.datepicker({
                        minDate: minDate,
                        dateFormat: 'yy-mm-dd',
                        onSelect: function(date){
                            if(angular.isDefined(attrs.ngModel)){
                                scope.ngModel = date;
                                scope.$apply();
                            }
                        }
                    });

                    scope.$watch('[outWeek,returnWeek,tripWeek]',function(d){
                        if(angular.isUndefined(d[0]) && angular.isUndefined(d[1]) && angular.isUndefined(d[2])){
                            return;
                        }
                        el.datepicker("option","beforeShowDay",function(date){
                            var className = '';
                            if(angular.isDefined(d[2]) && d[2][date.getDay()]){
                                className = 'green-day';
                                return [true,className,null];
                            }
                            if(angular.isDefined(d[0]) && d[0][date.getDay()]){
                                className = 'blue-day';
                            }
                            if(angular.isDefined(d[1]) && d[1][date.getDay()]){
                                className = 'green-day';
                            }
                            if(angular.isDefined(d[0]) && d[0][date.getDay()]
                                && angular.isDefined(d[1]) && d[1][date.getDay()]){
                                className = 'blue-green-day';
                            }
                            return [true,className,null];
                        });
                        el.datepicker('refresh');
                    },true);

                    scope.$watch('minDate',function(d){
                        if(angular.isUndefined(d)){
                            return;
                        }

                        el.datepicker("option", "minDate", scope.minDate);
                    },false);

                    scope.$watch('maxDate',function(d){
                        if(angular.isUndefined(d)){
                            return;
                        }
                        el.datepicker("option", "maxDate", scope.maxDate);
                    },false);
                }
            }
        }
    });
})
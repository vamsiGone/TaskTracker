var app = {
    main   : function () {
        "use strict";
        app.execute();
    },
    execute: function () {
        var _container = jQuery("#graph-1-container");
        if (_container.length > 0) {
            function drawLineGraph(graph, points, container, id) {
                var graph = Snap(graph);
                /*END DRAW GRID*/

                /* PARSE POINTS */
                var myPoints = [];
                var shadowPoints = [];

                function parseData(points) {
                    for (i = 0; i < points.length; i++) {
                        var p = new point();
                        var pv = points[ i ] / 100 * 40;
                        p.x = 83.7 / points.length * i + 1;
                        p.y = 40 - pv;
                        if (p.x > 78) {
                            p.x = 78;
                        }
                        myPoints.push(p);
                    }
                }

                var segments = [];

                function createSegments(p_array) {
                    for (i = 0; i < p_array.length; i++) {
                        var seg = "L" + p_array[ i ].x + "," + p_array[ i ].y;
                        if (i === 0) {
                            seg = "M" + p_array[ i ].x + "," + p_array[ i ].y;
                        }
                        segments.push(seg);
                    }
                }

                function joinLine(segments_array, id) {
                    var line = segments_array.join(" ");
                    var line = graph.path(line);
                    line.attr('id', 'graph-' + id);
                    var lineLength = line.getTotalLength();

                    line.attr({
                        'stroke-dasharray' : lineLength,
                        'stroke-dashoffset': lineLength
                    });
                }

                function calculatePercentage(points, graph) {
                    var initValue = points[ 0 ];
                    var endValue = points[ points.length - 1 ];
                    var sum = endValue - initValue;
                    var prefix;
                    var percentageGain;
                    var stepCount = 1300 / sum;

                    function findPrefix() {
                        if (sum > 0) {
                            prefix = "+";
                        } else {
                            prefix = "";
                        }
                    }

                    var percentagePrefix = "";

                    function percentageChange() {
                        percentageGain = initValue / endValue * 100;

                        if (percentageGain > 100) {
                            percentageGain = Math.round(percentageGain * 100 * 10) / 100;
                        } else if (percentageGain < 100) {
                            percentageGain = Math.round(percentageGain * 10) / 10;
                        }
                        if (initValue > endValue) {

                            percentageGain = endValue / initValue * 100 - 100;
                            percentageGain = percentageGain.toFixed(2);

                            percentagePrefix = "";
                            $(graph).find('.percentage-value').addClass('negative');
                        } else {
                            percentagePrefix = "+";
                        }
                        if (endValue > initValue) {
                            percentageGain = endValue / initValue * 100;
                            percentageGain = Math.round(percentageGain);
                        }
                    };
                    percentageChange();
                    findPrefix();

                    var percentage = $(graph).find('.percentage-value');
                    var totalGain = $(graph).find('.total-gain');
                    var hVal = $(graph).find('.h-value');

                    function count(graph, sum) {
                        var totalGain = $(graph).find('.total-gain');
                        var i = 0;
                        var time = 1300;
                        var intervalTime = Math.abs(time / sum);
                        var timerID = 0;
                        if (sum > 0) {
                            var timerID = setInterval(function () {
                                i++;
                                totalGain.text(percentagePrefix + i);
                                if (i === sum) clearInterval(timerID);
                            }, intervalTime);
                        } else if (sum < 0) {
                            var timerID = setInterval(function () {
                                i--;
                                totalGain.text(percentagePrefix + i);
                                if (i === sum) clearInterval(timerID);
                            }, intervalTime);
                        }
                    }

                    count(graph, sum);

                    percentage.text(percentagePrefix + percentageGain + "%");
                    totalGain.text("0%");
                    setTimeout(function () {
                        percentage.addClass('visible');
                        hVal.addClass('visible');
                    }, 1300);

                }


                function showValues() {
                    var val1 = $(graph).find('.h-value');
                    var val2 = $(graph).find('.percentage-value');
                    val1.addClass('visible');
                    val2.addClass('visible');
                }

                function drawPolygon(segments, id) {
                    var lastel = segments[ segments.length - 1 ];
                    var polySeg = segments.slice();
                    polySeg.push([ 78, 38.4 ], [ 1, 38.4 ]);
                    var polyLine = polySeg.join(' ').toString();
                    var replacedString = polyLine.replace(/L/g, '').replace(/M/g, "");

                    var poly = graph.polygon(replacedString);
                    var clip = graph.rect(-80, 0, 80, 40);
                    poly.attr({
                        'id'      : 'poly-' + id,
                        /*'clipPath':'url(#clip)'*/
                        'clipPath': clip
                    });
                    clip.animate({
                        transform: 't80,0'
                    }, 1300, mina.linear);
                }

                parseData(points);

                createSegments(myPoints);
                calculatePercentage(points, container);
                joinLine(segments, id);

                drawPolygon(segments, id);


                /*$('#poly-'+id).attr('class','show');*/

                /* function drawPolygon(segments,id){
                  var polySeg = segments;
                  polySeg.push([80,40],[0,40]);
                  var polyLine = segments.join(' ').toString();
                  var replacedString = polyLine.replace(/L/g,'').replace(/M/g,"");
                  var poly = graph.polygon(replacedString);
                  poly.attr('id','poly-'+id)
                }
                drawPolygon(segments,id);*/
            }

            var chart_1_y = [
                15, 25, 40, 30, 45, 40, 35, 55, 37, 50, 60, 45, 70, 78
            ];
            var chart_2_y = [
                80, 65, 65, 40, 55, 34, 54, 50, 60, 64, 55, 27, 24, 30
            ];

            function point(x, y) {
                x: 0;
                y: 0;
            }

            drawLineGraph('#chart-1', chart_1_y, '#graph-1-container', 1);
            drawLineGraph('#chart-2', chart_2_y, '#graph-2-container', 2);
        }


        var date = new Date();
        var currentYear = date.getFullYear();
        var currentMonth = date.getMonth() + 1;
        currentMonth = (currentMonth < 10) ? '0' + currentMonth : currentMonth;
        $('#calendar').fullCalendar({
            header      : {
                left  : 'month,agendaWeek,agendaDay',
                center: 'title',
                right : 'prev,today,next '
            },
            droppable   : true, // this allows things to be dropped onto the calendar
            drop        : function () {
                //$(this).remove();
            },
            selectable  : true,
            selectHelper: true,
            select      : function (t, e) {
                var a, r = swal({
                    title           : "Title for " + moment(t._d).format('DD-MM-YYYY'),
                    text            : "Write something interesting...",
                    type            : "input",
                    showCancelButton: true,
                    closeOnConfirm  : false,
                    inputPlaceholder: "Write something..."
                }, function (inputValue) {
                    if (inputValue === false) return false;
                    if (inputValue === "") {
                        swal.showInputError("You need to write something!");
                        return false
                    }
                    (a = {
                        title: inputValue,
                        start: t,
                        end  : e,
                        color: "#9368E9"
                    });
                    swal("Nice!", "You wrote: " + inputValue, "success");
                    $("#calendar").fullCalendar("renderEvent", a, 1);
                    $("#calendar").fullCalendar("unselect");
                });
            },
            editable    : true,
            eventLimit  : true, // allow "more" link when too many events
            events      : [ {
                title: "3894",
                start: currentYear + "-" + currentMonth + "-01",
                color: "#797979"
            }, {
                title: "3896",
                start: currentYear + "-" + currentMonth + "-07",
                end  : currentYear + "-" + currentMonth + "-07",
                color: "#447DF7"
            }, {
                id   : 999,
                title: "3897",
                start: currentYear + "-" + currentMonth + "-04",
                color: "#23CCEF"
            }, {
                id   : 999,
                title: "3898",
                start: currentYear + "-" + currentMonth + "-05",
                color: "#87CB16"
            }, {
                title: "3899",
                start: currentYear + "-" + currentMonth + "-6",
                end  : currentYear + "-" + currentMonth + "-7",
                color: "#9368E9"
            }, {
                title: "3900",
                start: currentYear + "-" + currentMonth + "-08",
                color: "#FFA534"
            }, {
                title: "3901",
                start: currentYear + "-" + currentMonth + "-09",
                color: "#FF5221"
            }, {
                title: "3902",
                start: currentYear + "-" + currentMonth + "-10",
                color: "#23CCEF"
            }, {
                title: "3903",
                start: currentYear + "-" + currentMonth + "-14",
                color: "#9368E9"
            }, {
                title: "3904",
                start: currentYear + "-" + currentMonth + "-20",
                color: "#FF5221"
            }, {
                title: "3905",
                start: currentYear + "-" + currentMonth + "-17",
                color: "#9368E9"
            }, {
                title: "3906",
                url  : "http://google.com/",
                start: currentYear + "-" + currentMonth + "-28",
                color: "#FF5221"
            } ]
        });

        var _container = jQuery("#dynamic_chart");
        if (_container.length > 0) {
            var barChartData = {
                labels  : [ "January", "February", "March", "April" ],
                datasets: [ {
                    type                : 'line',
                    label               : "",
                    data                : [ 2, 1, 5, 6 ],
                    fill                : false,
                    backgroundColor     : '#4076e0',
                    borderColor         : '#4076e0',
                    borderWidth         : 3,
                    pointRadius         : 0,
                    hoverBackgroundColor: '#4076e0',
                    hoverBorderColor    : '#4076e0',
                    yAxisID             : 'y-axis-1',
                    animateScale        : true,
                    easing              : "none",
                    duration            : 0,
                } ]
            };
            var length = barChartData.datasets[ 0 ].data.length;
            var ctx = document.getElementById("dynamic_chart").getContext("2d");
            myBar = new Chart(ctx, {
                animation: {
                    animateScale: true,
                    easing      : "none",
                    duration    : 0,
                },
                type     : 'bar',
                data     : barChartData,
                options  : {
                    responsive: true,
                    tooltips  : {
                        mode: 'label'
                    },
                    legend    : {
                        display: false,
                        labels : {
                            fontColor: 'rgb(255, 99, 132)'
                        }
                    },
                    elements  : {
                        line: {
                            fill: true
                        }
                    },
                    scales    : {
                        xAxes: [ {
                            display  : false,
                            gridLines: {
                                display: false
                            },
                            labels   : {
                                show: true,
                            }
                        } ],
                        yAxes: [ {
                            type     : "linear",
                            display  : false,
                            position : "left",
                            id       : "y-axis-1",
                            gridLines: {
                                display: false
                            },
                            labels   : {
                                show: false,

                            }
                        } ]
                    }
                }
            });
            var lcount = 0;
            setInterval(function () {
                var count = 10;
                lcount++;
                var data = myBar.data.datasets[ 0 ].data;
                var labels = myBar.data.labels;
                data.push(Math.floor(Math.random() * 10));
                count++;
                labels.push(count.toString());
                if (lcount == 25) {
                    if (myBar.data.datasets[ 0 ].data.length > 25) myBar.data.datasets[ 0 ].data.splice(0, 25);
                    if (myBar.data.labels.length > 25) myBar.data.labels.splice(0, 25);
                    lcount = 0;
                }
                myBar.update();
            }, 570);
        }

        $(".upcoming_event_carasol").owlCarousel({
            items             : 5,
            autoplay          : true,
            loop              : true,
            margin            : 30,
            autoplayTimeout   : 5000,
            autoplayHoverPause: true,
            lazyLoad          : true,
            center            : true,
            nav               : true,
            navText           : [ '<i class="material-icons badge badge-success f-s-18">arrow_back</i> ', ' &nbsp;<i class="material-icons badge badge-success f-s-18">arrow_forward</i>' ],
            navClass          : [ 'owl-prev', 'owl-next' ],
            responsive        : {
                0   : {items: 1},
                600 : {items: 1},
                1100: {items: 1},
                1200: {items: 1}
            }
        });

        var select_mobile = [{"text":"86xxxxxx67","id":"867"},{"text":"70xxxxxx66","id":"706"},{"text":"81xxxxxx00","id":"810"},{"text":"96xxxxxx30","id":"960"},{"text":"98xxxxxx86","id":"986"},{"text":"95xxxxxx87","id":"957"},{"text":"99xxxxxx57","id":"997"},{"text":"94xxxxxx00","id":"940"},{"text":"99xxxxxx19","id":"999"},{"text":"99xxxxxx05","id":"995"},{"text":"99xxxxxx14","id":"994"},{"text":"77xxxxxx42","id":"772"},{"text":"82xxxxxx67","id":"827"},{"text":"97xxxxxx75","id":"975"},{"text":"93xxxxxx17","id":"937"},{"text":"96xxxxxx85","id":"965"},{"text":"96xxxxxx56","id":"966"},{"text":"95xxxxxx17","id":"957"},{"text":"97xxxxxx31","id":"971"},{"text":"93xxxxxx08","id":"938"},{"text":"98xxxxxx11","id":"981"},{"text":"99xxxxxx55","id":"995"},{"text":"77xxxxxx47","id":"777"},{"text":"82xxxxxx69","id":"829"},{"text":"84xxxxxx87","id":"847"},{"text":"80xxxxxx33","id":"803"},{"text":"84xxxxxx37","id":"847"},{"text":"77xxxxxx99","id":"779"},{"text":"95xxxxxx75","id":"955"},{"text":"99xxxxxx77","id":"997"},{"text":"80xxxxxx02","id":"802"},{"text":"97xxxxxx91","id":"971"},{"text":"75xxxxxx30","id":"750"},{"text":"81xxxxxx62","id":"812"},{"text":"90xxxxxx04","id":"904"},{"text":"73xxxxxx03","id":"733"},{"text":"95xxxxxx46","id":"956"},{"text":"97xxxxxx98","id":"978"},{"text":"95xxxxxx75","id":"955"},{"text":"80xxxxxx29","id":"809"},{"text":"94xxxxxx12","id":"942"},{"text":"90xxxxxx64","id":"904"},{"text":"78xxxxxx03","id":"783"},{"text":"95xxxxxx80","id":"950"}];
        $(".select_mobile").select2({
            data: select_mobile
        });

        if ($("#pvrLineChart_1").length) {
            var pvrLineChart = $("#pvrLineChart_1");
            var pvrLineGradient = pvrLineChart[ 0 ].getContext('2d').createLinearGradient(0, 0, 0, 200);
            pvrLineGradient.addColorStop(0, 'rgba(147,104,233,0.48)');
            pvrLineGradient.addColorStop(1, 'rgba(148, 59, 234, 0.7)');
            var liteLineData = {
                labels  : [ "January 1", "January 5", "January 10", "January 15", "January 20", "January 25" ],
                datasets: [ {
                    label                    : "Sold",
                    fill                     : true,
                    lineTension              : 0.4,
                    backgroundColor          : pvrLineGradient,
                    borderColor              : "#8f1cad",
                    borderCapStyle           : 'butt',
                    borderDash               : [],
                    borderDashOffset         : 0.0,
                    borderJoinStyle          : 'miter',
                    pointBorderColor         : "#fff",
                    pointBackgroundColor     : "#2a2f37",
                    pointBorderWidth         : 2,
                    pointHoverRadius         : 6,
                    pointHoverBackgroundColor: "#943BEA",
                    pointHoverBorderColor    : "#fff",
                    pointHoverBorderWidth    : 2,
                    pointRadius              : 4,
                    pointHitRadius           : 5,
                    data                     : [ 13, 28, 19, 24, 43, 49 ],
                    spanGaps                 : false
                } ]
            };
            var mypvrLineChart = new Chart(pvrLineChart, {
                type   : 'line',
                data   : liteLineData,
                options: {
                    tooltips: {enabled: false},
                    legend  : {display: false},
                    scales  : {
                        xAxes     : [ {
                            display  : false,
                            ticks    : {fontSize: '11', fontColor: '#969da5'},
                            gridLines: {color: 'rgba(0,0,0,0.0)', zeroLineColor: 'rgba(0,0,0,0.0)'}
                        } ], yAxes: [ {display: false, ticks: {beginAtZero: true, max: 55}} ]
                    }
                }
            });
        }

        if ($("#pvrLineChart_2").length) {
            var pvrLineChart = $("#pvrLineChart_2");
            var pvrLineGradient = pvrLineChart[ 0 ].getContext('2d').createLinearGradient(0, 0, 0, 200);
            pvrLineGradient.addColorStop(0, 'rgba(255, 165, 52,0.48)');
            pvrLineGradient.addColorStop(1, 'rgba(255, 82, 33, 0.7)');
            var liteLineData = {
                labels  : [ "January 1", "January 5", "January 10", "January 15", "January 20", "January 25" ],
                datasets: [ {
                    label                    : "Sold",
                    fill                     : true,
                    lineTension              : 0.4,
                    backgroundColor          : pvrLineGradient,
                    borderColor              : "#FFA534",
                    borderCapStyle           : 'butt',
                    borderDash               : [],
                    borderDashOffset         : 0.0,
                    borderJoinStyle          : 'miter',
                    pointBorderColor         : "#fff",
                    pointBackgroundColor     : "#2a2f37",
                    pointBorderWidth         : 2,
                    pointHoverRadius         : 6,
                    pointHoverBackgroundColor: "#FF5221",
                    pointHoverBorderColor    : "#fff",
                    pointHoverBorderWidth    : 2,
                    pointRadius              : 4,
                    pointHitRadius           : 5,
                    data                     : [ 13, 28, 39, 24, 43, 19 ],
                    spanGaps                 : false
                } ]
            };
            var mypvrLineChart = new Chart(pvrLineChart, {
                type   : 'line',
                data   : liteLineData,
                options: {
                    tooltips: {enabled: false},
                    legend  : {display: false},
                    scales  : {
                        xAxes     : [ {
                            display  : false,
                            ticks    : {fontSize: '11', fontColor: '#969da5'},
                            gridLines: {color: 'rgba(0,0,0,0.0)', zeroLineColor: 'rgba(0,0,0,0.0)'}
                        } ], yAxes: [ {display: false, ticks: {beginAtZero: true, max: 55}} ]
                    }
                }
            });
        }

        if ($("#pvrLineChart_3").length) {
            var pvrLineChart = $("#pvrLineChart_3");
            var pvrLineGradient = pvrLineChart[ 0 ].getContext('2d').createLinearGradient(0, 0, 0, 200);
            pvrLineGradient.addColorStop(0, 'rgba(135, 203, 22,0.48)');
            pvrLineGradient.addColorStop(1, 'rgba(109, 192, 48, 0.7)');
            var liteLineData = {
                labels  : [ "January 1", "January 5", "January 10", "January 15", "January 20", "January 25" ],
                datasets: [ {
                    label                    : "Sold",
                    fill                     : true,
                    lineTension              : 0.4,
                    backgroundColor          : pvrLineGradient,
                    borderColor              : "#87CB16",
                    borderCapStyle           : 'butt',
                    borderDash               : [],
                    borderDashOffset         : 0.0,
                    borderJoinStyle          : 'miter',
                    pointBorderColor         : "#fff",
                    pointBackgroundColor     : "#2a2f37",
                    pointBorderWidth         : 2,
                    pointHoverRadius         : 6,
                    pointHoverBackgroundColor: "#6DC030",
                    pointHoverBorderColor    : "#fff",
                    pointHoverBorderWidth    : 2,
                    pointRadius              : 4,
                    pointHitRadius           : 5,
                    data                     : [ 13, 28, 39, 24, 43, 19 ],
                    spanGaps                 : false
                } ]
            };
            var mypvrLineChart = new Chart(pvrLineChart, {
                type   : 'line',
                data   : liteLineData,
                options: {
                    tooltips: {enabled: false},
                    legend  : {display: false},
                    scales  : {
                        xAxes     : [ {
                            display  : false,
                            ticks    : {fontSize: '11', fontColor: '#969da5'},
                            gridLines: {color: 'rgba(0,0,0,0.0)', zeroLineColor: 'rgba(0,0,0,0.0)'}
                        } ], yAxes: [ {display: false, ticks: {beginAtZero: true, max: 55}} ]
                    }
                }
            });
        }

        if ($("#pvrLineChart_4").length) {
            var pvrLineChart = $("#pvrLineChart_4");
            var pvrLineGradient = pvrLineChart[ 0 ].getContext('2d').createLinearGradient(0, 0, 0, 200);
            pvrLineGradient.addColorStop(0, 'rgba(251, 64, 75,0.48)');
            pvrLineGradient.addColorStop(1, 'rgba(251, 102, 110, 0.7)');
            var liteLineData = {
                labels  : [ "January 1", "January 5", "January 10", "January 15", "January 20", "January 25" ],
                datasets: [ {
                    label                    : "Sold",
                    fill                     : true,
                    lineTension              : 0.4,
                    backgroundColor          : pvrLineGradient,
                    borderColor              : "#FB404B",
                    borderCapStyle           : 'butt',
                    borderDash               : [],
                    borderDashOffset         : 0.0,
                    borderJoinStyle          : 'miter',
                    pointBorderColor         : "#fff",
                    pointBackgroundColor     : "#2a2f37",
                    pointBorderWidth         : 2,
                    pointHoverRadius         : 6,
                    pointHoverBackgroundColor: "#FB404B",
                    pointHoverBorderColor    : "#fff",
                    pointHoverBorderWidth    : 2,
                    pointRadius              : 4,
                    pointHitRadius           : 5,
                    data                     : [ 13, 8, 29, 24, 43, 49 ],
                    spanGaps                 : false
                } ]
            };
            var mypvrLineChart = new Chart(pvrLineChart, {
                type   : 'line',
                data   : liteLineData,
                options: {
                    tooltips: {enabled: false},
                    legend  : {display: false},
                    scales  : {
                        xAxes     : [ {
                            display  : false,
                            ticks    : {fontSize: '11', fontColor: '#969da5'},
                            gridLines: {color: 'rgba(0,0,0,0.0)', zeroLineColor: 'rgba(0,0,0,0.0)'}
                        } ], yAxes: [ {display: false, ticks: {beginAtZero: true, max: 55}} ]
                    }
                }
            });
        }

    },
};
window.addEventListener('load', function () {
    app.main();
});
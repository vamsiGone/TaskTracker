var app = {
    main   : function () {
        "use strict";
        app.execute();
    },
    execute: function () {
        var blue = "#333333",
            grey = "#b6c2c9",
            red = "#dc3545";

        var seriesData = [ [], [] ];
        var random = new Rickshaw.Fixtures.RandomData(50);
        for (var i = 0; i < 50; i++) {
            random.addData(seriesData);
        }
        var graph = new Rickshaw.Graph({
            element : document.querySelector("#rs1"),
            height  : 70,
            renderer: 'area',
            series  : [
                {
                    data : seriesData[ 0 ],
                    color: blue,
                    name : 'DB Server'
                }, {
                    data : seriesData[ 1 ],
                    color: grey,
                    name : 'Web Server'
                }
            ]
        });
        var hoverDetail = new Rickshaw.Graph.HoverDetail({
            graph: graph
        });
        random.removeData(seriesData);
        random.addData(seriesData);
        graph.update();
        setInterval(function () {
            random.removeData(seriesData);
            random.addData(seriesData);
            graph.update();
            $("#change_random").text(Math.floor(Math.random() * 100));
            $("#change_random_per").text(Math.floor(Math.random() * 10)+"%");
        }, 1000);
        new ResizeSensor($('#page-container'), function () {
            graph.configure({
                width : $('#rs1').width(),
                height: $('#rs1').height()
            });
            graph.render();
        });

        /****rs2****/
        var seriesdata = [ [] ];
        var random_1 = new Rickshaw.Fixtures.RandomData(14);
        for (var i = 0; i < 15; i++) {
            random_1.addData(seriesdata);
        }
        var graph_2 = new Rickshaw.Graph({
            element : document.querySelector("#rs2"),
            renderer: 'bar',
            series  : [
                {
                    data : seriesdata[ 0 ],
                    color: blue,
                    name : 'Site Traffic'
                }
            ]
        });
        random_1.removeData(seriesdata);
        random_1.addData(seriesdata);
        graph_2.update();
        setInterval(function () {
            random_1.removeData(seriesdata);
            random_1.addData(seriesdata);
            graph_2.update();
            $("#change_random1").text(Math.floor(Math.random() * 100));
            $("#change_random_per1").text(Math.floor(Math.random() * 10)+"%");
        }, 1000);
        new ResizeSensor($('#page-container'), function () {
            graph_2.configure({
                width : $('#rs2').width(),
                height: $('#rs2').height()
            });
            graph_2.render();
        });

        var rs3 = new Rickshaw.Graph({
            element : document.querySelector('#rs3'),
            renderer: 'line',
            series  : [ {
                data : [
                    {x: 0, y: 5},
                    {x: 1, y: 7},
                    {x: 2, y: 10},
                    {x: 3, y: 11},
                    {x: 4, y: 12},
                    {x: 5, y: 10},
                    {x: 6, y: 9},
                    {x: 7, y: 7},
                    {x: 8, y: 6},
                    {x: 9, y: 8},
                    {x: 10, y: 9},
                    {x: 11, y: 10},
                    {x: 12, y: 7},
                    {x: 13, y: 10}
                ],
                color: red
            } ]
        });
        rs3.render();
        // Responsive Mode
        new ResizeSensor($('#page-container'), function () {
            rs3.configure({
                width : $('#rs3').width(),
                height: $('#rs3').height()
            });
            rs3.render();
        });


        $('.sparkline').each(function () {
            var $this = $(this);
            $this.sparkline('html', {
                barColor       : '#333333',
                type           : 'bar',
                height         : '26px',
                barWidth       : 5,
                barSpacing     : 2,
                stackedBarColor: '#333333',
                negBarColor    : '#333333',
                zeroAxis       : 'false'
            });
            $this = null;
        });

        if ($("#chartdiv_map").length !== 0) {
            var targetSVG = "M9,0C4.029,0,0,4.029,0,9s4.029,9,9,9s9-4.029,9-9S13.971,0,9,0z M9,15.93 c-3.83,0-6.93-3.1-6.93-6.93S5.17,2.07,9,2.07s6.93,3.1,6.93,6.93S12.83,15.93,9,15.93 M12.5,9c0,1.933-1.567,3.5-3.5,3.5S5.5,10.933,5.5,9S7.067,5.5,9,5.5 S12.5,7.067,12.5,9z";
            var planeSVG = "m2,106h28l24,30h72l-44,-133h35l80,132h98c21,0 21,34 0,34l-98,0 -80,134h-35l43,-133h-71l-24,30h-28l15,-47";
            var map = AmCharts.makeChart("chartdiv_map", {
                "type"          : "map",
                "theme"         : "none",
                "dataProvider"  : {
                    "map"          : "worldLow",
                    "zoomLevel"    : 3.0,
                    "zoomLongitude": -75,
                    "zoomLatitude" : 42,
                    "lines"        : [ {
                        "id"        : "line1",
                        "arc"       : -0.85,
                        "alpha"     : 0.3,
                        "latitudes" : [ 48.8567, 43.8163, 34.3, 23 ],
                        "longitudes": [ 2.3510, -79.4287, -118.15, -82 ]
                    }, {
                        "id"        : "line2",
                        "alpha"     : 0,
                        "color"     : "#000000",
                        "latitudes" : [ 48.8567, 43.8163, 34.3, 23 ],
                        "longitudes": [ 2.3510, -79.4287, -118.15, -82 ]
                    } ],
                    "images"       : [ {
                        "svgPath"  : targetSVG,
                        "title"    : "Paris",
                        "latitude" : 48.8567,
                        "longitude": 2.3510
                    }, {
                        "svgPath"  : targetSVG,
                        "title"    : "Toronto",
                        "latitude" : 43.8163,
                        "longitude": -79.4287
                    }, {
                        "svgPath"  : targetSVG,
                        "title"    : "Los Angeles",
                        "latitude" : 34.3,
                        "longitude": -118.15
                    }, {"svgPath": targetSVG, "title": "Havana", "latitude": 23, "longitude": -82}, {
                        "svgPath"         : planeSVG,
                        "positionOnLine"  : 0,
                        "color"           : "#000000",
                        "alpha"           : 0.1,
                        "animateAlongLine": true,
                        "lineId"          : "line2",
                        "flipDirection"   : true,
                        "loop"            : true,
                        "scale"           : 0.03,
                        "positionScale"   : 1.3
                    }, {
                        "svgPath"         : planeSVG,
                        "positionOnLine"  : 0,
                        "color"           : "#585869",
                        "animateAlongLine": true,
                        "lineId"          : "line1",
                        "flipDirection"   : true,
                        "loop"            : true,
                        "scale"           : 0.03,
                        "positionScale"   : 1.8
                    } ]
                },
                "areasSettings" : {"unlistedAreasColor": "#8dd9ef"},
                "imagesSettings": {
                    "color"               : "#585869",
                    "rollOverColor"       : "#585869",
                    "selectedColor"       : "#585869",
                    "pauseDuration"       : 0.2,
                    "animationDuration"   : 2.5,
                    "adjustAnimationSpeed": true
                },
                "linesSettings" : {"color": "#585869", "alpha": 0.4},
                "export"        : {"enabled": true}
            });
        }

    },
};
window.addEventListener('load', function () {
    app.main();
});
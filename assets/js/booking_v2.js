"use strict";
var app = {
    main   : function () {
        "use strict";
        app.execute();
    },
    execute: function () {
        toastr.options = {
            "closeButton"      : true,
            "debug"            : false,
            "newestOnTop"      : false,
            "progressBar"      : true,
            "positionClass"    : "toast-bottom-left",
            "preventDuplicates": true,
            "onclick"          : null,
            "showDuration"     : "300",
            "hideDuration"     : "1000",
            "timeOut"          : "5000",
            "extendedTimeOut"  : "1000",
            "showEasing"       : "swing",
            "hideEasing"       : "linear",
            "showMethod"       : "fadeIn",
            "hideMethod"       : "fadeOut"
        }

        var directionsDisplayW;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        var map = {};
        var marker;
        var infowindow;
        var allMarkers = [];
        var styles = [[{
            url: 'assets/images/culster.png',
            height: 98,
            width: 106,
            anchor: [35, 37],
            textColor: '#ff00ff',
            textSize: 11
        }]];
        var markerCluster;
        var bounds = new google.maps.LatLngBounds();
        var start_place = null;
        var end_place = null;
        var markers = [];

        function CenterControl(controlDiv, map) {
            var controlUI = document.createElement('div');
            controlUI.style.bottom = '10px';
            controlUI.style.right = '-20px';
            controlUI.style.position = 'fixed';
            controlUI.title = 'Click to recenter the mapdfds ';
            controlDiv.appendChild(controlUI);

            var controlText = document.createElement('div');
            controlText.innerHTML = '<img id="center_img_loc" src="assets/images/current_location.png" style="width: 60%;" />';
            controlUI.appendChild(controlText);

            controlUI.addEventListener('click', function () {
                alert("center map")
            });
        }

        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[ i ].setMap(map);
            }
        }

        function deleteMarkers() {
            clearMarkers();
            markers = [];
        }

        function clearMarkers() {
            setMapOnAll(null);
        }

        function InputControl(controlDiv, map) {
            var controlInput = document.createElement('div');
            controlInput.style.position = 'inherit';
            controlInput.style.width = '350px';
            controlInput.style.padding = '10px';
            controlInput.title = 'Click to recenter the map';
            controlDiv.appendChild(controlInput);

            var controlInputText = document.createElement('div');
            controlInputText.innerHTML = '<div class="">\n' +
                '            <div class="col-md-12">\n' +
                '                <!-- begin panel -->\n' +
                '                <div class="panel panel-pvr m-b-0" style="background: rgba(255, 255, 255, 0.8);">\n' +
                '                    <div class="panel-body">\n' +
                '                        <form id="booking_form">\n' +
                '                            <div class="row">\n' +
                '                                <div class="col-sm-12">\n' +
                '                                    <div class="form-group">\n' +
                '                                        <label class="control-label required">Mobile Number</label>\n' +
                '                                        <input type="text" id="mobile_number" class="form-control input-sm">\n' +
                '                                    </div>\n' +
                '\n' +
                '                                    <div class="form-group">\n' +
                '                                        <label class="control-label">From Place</label>\n' +
                '                                        <select class="form-control w-in-100" id="from_place">\n' +
                '                                            <option value="">Select From Place</option>\n' +
                '                                            <option value="1003" data-lat="11.021125" data-lon="76.976163">100 FEET Road\n' +
                '                                            </option>\n' +
                '                                            <option value="3080" data-lat="11.020374" data-lon="76.992865">110, Avinashi\n' +
                '                                                Rd,\n' +
                '                                                KR Puram,\n' +
                '                                                Udayampalayam, Coimbatore, Tamil Nadu 641006, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1653" data-lat="11.0611107" data-lon="76.9887207">11/4,\n' +
                '                                                Chinnavedampatti\n' +
                '                                                Rd, Murugan Nagar, Saravanampatty, Coimbatore, Tamil Nadu 641049, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1467" data-lat="11.0776826" data-lon="76.9973725">11-A, Sathy\n' +
                '                                                Rd,\n' +
                '                                                EB\n' +
                '                                                Codata-lony, Saravanampatty, Coimbatore, Tamil Nadu 641035, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1707" data-lat="11.0611239" data-lon="76.9887234">11,\n' +
                '                                                Chinnavedampatti Rd,\n' +
                '                                                Murugan Nagar, Saravanampatty, Coimbatore, Tamil Nadu 641049, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1678" data-lat="11.030443" data-lon="76.976051">11, NH948,\n' +
                '                                                Sivasakthi\n' +
                '                                                Codata-lony, Ganapathypudur, Coimbatore, Tamil Nadu 641006, India\n' +
                '                                            </option>\n' +
                '                                            <option value="10018" data-lat="10.9970625" data-lon="76.9822627">1212,\n' +
                '                                                Trichy\n' +
                '                                                Road,\n' +
                '                                                Bannari Amman Sugars Limited, Trichy Road, Nadar Codata-lony,\n' +
                '                                                Ramanathapuram,\n' +
                '                                                Coimbatore, Tamil Nadu 641018, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1627" data-lat="11.0158792" data-lon="76.9632253">121, Rajaji\n' +
                '                                                Rd,\n' +
                '                                                Peranaidu\n' +
                '                                                Layout, Ram Nagar, Coimbatore, Tamil Nadu 641009, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1464" data-lat="11.034672" data-lon="76.968389">12 Sanganoor\n' +
                '                                                Main\n' +
                '                                                Road\n' +
                '                                                Ganapathypudur Coimbatore Tamil Nadu India\n' +
                '                                            </option>\n' +
                '                                            <option value="1411" data-lat="11.030518" data-lon="76.966423">12, Sanganoor\n' +
                '                                                Main Road,\n' +
                '                                                Tatabad\n' +
                '                                            </option>\n' +
                '                                            <option value="1410" data-lat="11.0231978" data-lon="77.0020938">1326,\n' +
                '                                                Avinashi\n' +
                '                                                Rd,\n' +
                '                                                Peelamedu\n' +
                '                                            </option>\n' +
                '                                            <option value="1671" data-lat="11.0232674" data-lon="77.0013445">1328,\n' +
                '                                                Avinashi\n' +
                '                                                Rd,\n' +
                '                                                Peelamedu, Coimbatore, Tamil Nadu 641004, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1631" data-lat="11.0164984" data-lon="76.9624531">13, Nehru\n' +
                '                                                St,\n' +
                '                                                Peranaidu\n' +
                '                                                Layout, Ram Nagar, Coimbatore, Tamil Nadu 641009, India\n' +
                '                                            </option>\n' +
                '                                            <option value="7651" data-lat="11.03309" data-lon="76.9781">140, Vysiyal\n' +
                '                                                Street,\n' +
                '                                                Vysiyal\n' +
                '                                                Street, Near Om Sakthi Temple, Perur Road, Sivasakthi Codata-lony,\n' +
                '                                                Ganapathypudur, Coimbatore, Tamil Nadu 641026, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3115" data-lat="11.0611199" data-lon="76.9908502">142, Mani\n' +
                '                                                Nagar,\n' +
                '                                                Saravanampatty, Coimbatore, Tamil Nadu 641035, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1700" data-lat="11.0877478" data-lon="77.0092463">14 I,\n' +
                '                                                NH948,\n' +
                '                                                Amman Nagar,\n' +
                '                                                Saravanampatty, Coimbatore, Tamil Nadu 641035, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1677" data-lat="10.9705408" data-lon="76.9691396"> 152E,\n' +
                '                                                Podanur\n' +
                '                                                Rd,\n' +
                '                                                Kurichi Pirivu, K.R. Koil Bus Stop, Thirumarai Nagar, Kurichi,\n' +
                '                                                Coimbatore,\n' +
                '                                                Tamil Nadu 641023, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3077" data-lat="11.0767343" data-lon="77.0022736">160, Sathy\n' +
                '                                                Rd,\n' +
                '                                                Saravanampatty, Coimbatore, Tamil Nadu 641035, India\n' +
                '                                            </option>\n' +
                '                                            <option value="7658" data-lat="11.03929" data-lon="76.98036">189,\n' +
                '                                                Thondamuthur\n' +
                '                                                Road,\n' +
                '                                                Thondamuthur Road, Near Police Station, Perur, Sri Lakshmi Nagar,\n' +
                '                                                Ganapathypudur, Coimbatore, Tamil Nadu 641010, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1689" data-lat="11.0013698" data-lon="77.0291534">18,\n' +
                '                                                Kamarajar\n' +
                '                                                Rd,\n' +
                '                                                Singanallur, Coimbatore, Tamil Nadu 641005, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1696" data-lat="11.034532" data-lon="76.981335">1B, Gandhi\n' +
                '                                                Nagar\n' +
                '                                                Main Road,\n' +
                '                                                Gandhi Nagar, Ganapathypudur, Coimbatore, Tamil Nadu 641006, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1650" data-lat="11.1006189" data-lon="77.0199">1, NH948, VGP\n' +
                '                                                Prem\n' +
                '                                                Nagar,\n' +
                '                                                Saravanampatty, Coimbatore, Tamil Nadu 641035, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3092" data-lat="11.031021" data-lon="76.977936">212,\n' +
                '                                                Sivasakthi\n' +
                '                                                Codata-lony,\n' +
                '                                                Ganapathypudur, Coimbatore, Tamil Nadu 641006, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3105" data-lat="11.019211" data-lon="76.965934">220, 7th St,\n' +
                '                                                Gandipuram,\n' +
                '                                                Coimbatore, Tamil Nadu 641012, India\n' +
                '                                            </option>\n' +
                '                                            <option value="7624" data-lat="11.0168685" data-lon="76.9234717">247-1,\n' +
                '                                                SH167,\n' +
                '                                                Aishwarya\n' +
                '                                                Nagar, PN Pudur, Coimbatore, Tamil Nadu 641007, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3073" data-lat="12.9588129" data-lon="77.605965">26, Hosur\n' +
                '                                                Rd,\n' +
                '                                                Richmond\n' +
                '                                                Town, Bengaluru, Karnataka 560025, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3128" data-lat="11.0076385" data-lon="76.9911236">27 A,\n' +
                '                                                Puliakulam Rd,\n' +
                '                                                Dhamu Nagar, Puliakulam, Coimbatore, Tamil Nadu 641045, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3085" data-lat="11.0233707" data-lon="76.9096076">29/1B,\n' +
                '                                                Marudhamalai Rd,\n' +
                '                                                Thirumurugan Nagar, Vadavalli, Coimbatore, Tamil Nadu 641041, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3114" data-lat="11.016909" data-lon="76.999219">29,\n' +
                '                                                Damodarswamy\n' +
                '                                                Nagar,\n' +
                '                                                Thirumagal Nagar, Masakalipalayam, Coimbatore, Tamil Nadu 641028, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3122" data-lat="11.0027985" data-lon="77.0282839">2,\n' +
                '                                                Kamarajar\n' +
                '                                                Rd, TNHB\n' +
                '                                                Housing Unit\n' +
                '                                            </option>\n' +
                '                                            <option value="1610" data-lat="11.0789611" data-lon="76.9998954">2nd Cross\n' +
                '                                                St,\n' +
                '                                                Raja\n' +
                '                                                Rajeshwari Nagar, Saravanampatty, Coimbatore, Tamil Nadu 641035, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1706" data-lat="11.0641825" data-lon="77.0079297">2,\n' +
                '                                                Vilankuruchi\n' +
                '                                                Rd,\n' +
                '                                                Poompugar Nagar, Murugan Nagar, Vinayagapuram, Coimbatore, Tamil Nadu\n' +
                '                                                641035, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3087" data-lat="11.0799949" data-lon="76.9314334">3/10B,\n' +
                '                                                Mullai\n' +
                '                                                Nagar,\n' +
                '                                                Thudiyalur, Coimbatore, Tamil Nadu 641034, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1637" data-lat="11.0107288" data-lon="76.9601196">355B, Patel\n' +
                '                                                Rd,\n' +
                '                                                Ram\n' +
                '                                                Nagar, Coimbatore, Tamil Nadu 641009, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3089" data-lat="11.0266274" data-lon="76.9038067">35,\n' +
                '                                                Koothandai\n' +
                '                                                Kovil St,\n' +
                '                                                IOB Codata-lony, Vadavalli, Coimbatore, Tamil Nadu 641041, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1629" data-lat="11.0165005" data-lon="76.9624154">363-372,\n' +
                '                                                Nehru\n' +
                '                                                St,\n' +
                '                                                Peranaidu Layout, Ram Nagar, Coimbatore, Tamil Nadu 641009, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1628" data-lat="11.0166004" data-lon="76.9624119">372, Nehru\n' +
                '                                                St,\n' +
                '                                                Peranaidu\n' +
                '                                                Layout, Ram Nagar, Coimbatore, Tamil Nadu 641009, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3086" data-lat="11.0937905" data-lon="76.9432598">3/78, VKV\n' +
                '                                                Nagar, NGGO\n' +
                '                                                Codata-lony, Thudiyalur, Coimbatore, Tamil Nadu 641022, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3127" data-lat="11.0055982" data-lon="76.9904102">38, Old\n' +
                '                                                Damu\n' +
                '                                                Nagar,\n' +
                '                                                Puliakulam, Coimbatore, Tamil Nadu 641045, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1473" data-lat="11.0717696" data-lon="76.9993955">3rd Cross\n' +
                '                                                St, G\n' +
                '                                                K S\n' +
                '                                                Nagar, Ramanandha Nagar, Saravanampatty, Coimbatore, Tamil Nadu 641035,\n' +
                '                                                India\n' +
                '                                            </option>\n' +
                '                                            <option value="1691" data-lat="11.0232114" data-lon="77.0021598">410,\n' +
                '                                                Avinashi\n' +
                '                                                Rd,\n' +
                '                                                Masakalipalayam, Peelamedu, Coimbatore, Tamil Nadu 641004, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3094" data-lat="11.015142" data-lon="76.994224">421,\n' +
                '                                                Udayampalayam,\n' +
                '                                                Coimbatore, Tamil Nadu 641028, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1670" data-lat="11.032166" data-lon="76.995232">440,\n' +
                '                                                Peelamedu,\n' +
                '                                                Coimbatore,\n' +
                '                                                Tamil Nadu 641004, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3088" data-lat="11.0245237" data-lon="76.8984557">49,\n' +
                '                                                Vadavalli-Thondamuthur Rd, Maharani Avenue, Vadavalli, Coimbatore, Tamil\n' +
                '                                                Nadu 641041, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1672" data-lat="10.991601" data-lon="77.016807">4,\n' +
                '                                                Kallimadai,\n' +
                '                                                Coimbatore,\n' +
                '                                                Tamil Nadu 641005, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1669" data-lat="11.008013" data-lon="76.950609">520, R.S.\n' +
                '                                                Puram,\n' +
                '                                                Coimbatore, Tamil Nadu 641002, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1667" data-lat="11.0151062" data-lon="76.9578716">56, Patel\n' +
                '                                                Rd,\n' +
                '                                                Opposite\n' +
                '                                                Lakshmi Gas, Kattoor, Ram Nagar, Coimbatore, Tamil Nadu 641009, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1673" data-lat="11.0025067" data-lon="77.0284134">58,\n' +
                '                                                Kamarajar\n' +
                '                                                Rd, TNHB\n' +
                '                                                Housing Unit, Singanallur, Coimbatore, Tamil Nadu 641005, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3124" data-lat="11.0069516" data-lon="76.9915615">63/54-55,\n' +
                '                                                Puliakulam Rd,\n' +
                '                                                Dhamu Nagar, Puliakulam, Coimbatore, Tamil Nadu 641045, India\n' +
                '                                            </option>\n' +
                '                                            <option value="9992" data-lat="12.9286135" data-lon="80.1623916">6th Cross\n' +
                '                                                St,\n' +
                '                                                Tharakeswari Nagar, Gowrivakkam, Sembakkam, Chennai, Tamil Nadu 600064,\n' +
                '                                                India\n' +
                '                                            </option>\n' +
                '                                            <option value="3126" data-lat="11.0066331" data-lon="76.9917613">74/75,\n' +
                '                                                Street\n' +
                '                                                Number 33,\n' +
                '                                                Opp. Sri Hospital, Dhamu Nagar, Puliakulam, Coimbatore, Tamil Nadu\n' +
                '                                                641045,\n' +
                '                                                India\n' +
                '                                            </option>\n' +
                '                                            <option value="3129" data-lat="11.0065229" data-lon="76.991613">79,\n' +
                '                                                Puliakulam\n' +
                '                                                Rd, Pudur,\n' +
                '                                                Coimbatore, Tamil Nadu 641045, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3054" data-lat="11.0206995" data-lon="76.9967382">7, Avinashi\n' +
                '                                                Rd,\n' +
                '                                                Near\n' +
                '                                                Anjaneyar Kovil, Esso Bunk, Navaindia, Kalki Nagar, Peelamedu,\n' +
                '                                                Coimbatore,\n' +
                '                                                Tamil Nadu 641004, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1635" data-lat="10.9420836" data-lon="76.9464481">7, Pleasant\n' +
                '                                                Nagar,\n' +
                '                                                Sreevatsa Hill View, BK Pudur, Kuniamuthur, Coimbatore, Tamil Nadu\n' +
                '                                                641042,\n' +
                '                                                India\n' +
                '                                            </option>\n' +
                '                                            <option value="1686" data-lat="11.0448999" data-lon="76.9877641">89,\n' +
                '                                                Prashakthi\n' +
                '                                                Nagar,\n' +
                '                                                Ganapathypudur, Coimbatore, Tamil Nadu 641006, India\n' +
                '                                            </option>\n' +
                '                                            <option value="9991" data-lat="12.9297688" data-lon="80.160678">8th Cross\n' +
                '                                                St, MF\n' +
                '                                                Nagar,\n' +
                '                                                Thirumalai Nagar, Sembakkam, Chennai, Tamil Nadu 600064, India\n' +
                '                                            </option>\n' +
                '                                        </select>\n' +
                '                                    </div>\n' +
                '\n' +
                '                                    <div class="form-group">\n' +
                '                                        <label class="control-label">To Place</label>\n' +
                '                                        <select class="form-control w-in-100" id="to_place">\n' +
                '                                            <option value="">Select To Place</option>\n' +
                '                                            <option value="1003" data-lat="11.021125" data-lon="76.976163">100 FEET Road\n' +
                '                                            </option>\n' +
                '                                            <option value="3080" data-lat="11.020374" data-lon="76.992865">110, Avinashi\n' +
                '                                                Rd,\n' +
                '                                                KR Puram,\n' +
                '                                                Udayampalayam, Coimbatore, Tamil Nadu 641006, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1653" data-lat="11.0611107" data-lon="76.9887207">11/4,\n' +
                '                                                Chinnavedampatti\n' +
                '                                                Rd, Murugan Nagar, Saravanampatty, Coimbatore, Tamil Nadu 641049, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1467" data-lat="11.0776826" data-lon="76.9973725">11-A, Sathy\n' +
                '                                                Rd,\n' +
                '                                                EB\n' +
                '                                                Codata-lony, Saravanampatty, Coimbatore, Tamil Nadu 641035, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1707" data-lat="11.0611239" data-lon="76.9887234">11,\n' +
                '                                                Chinnavedampatti Rd,\n' +
                '                                                Murugan Nagar, Saravanampatty, Coimbatore, Tamil Nadu 641049, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1678" data-lat="11.030443" data-lon="76.976051">11, NH948,\n' +
                '                                                Sivasakthi\n' +
                '                                                Codata-lony, Ganapathypudur, Coimbatore, Tamil Nadu 641006, India\n' +
                '                                            </option>\n' +
                '                                            <option value="10018" data-lat="10.9970625" data-lon="76.9822627">1212,\n' +
                '                                                Trichy\n' +
                '                                                Road,\n' +
                '                                                Bannari Amman Sugars Limited, Trichy Road, Nadar Codata-lony,\n' +
                '                                                Ramanathapuram,\n' +
                '                                                Coimbatore, Tamil Nadu 641018, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1627" data-lat="11.0158792" data-lon="76.9632253">121, Rajaji\n' +
                '                                                Rd,\n' +
                '                                                Peranaidu\n' +
                '                                                Layout, Ram Nagar, Coimbatore, Tamil Nadu 641009, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1464" data-lat="11.034672" data-lon="76.968389">12 Sanganoor\n' +
                '                                                Main\n' +
                '                                                Road\n' +
                '                                                Ganapathypudur Coimbatore Tamil Nadu India\n' +
                '                                            </option>\n' +
                '                                            <option value="1411" data-lat="11.030518" data-lon="76.966423">12, Sanganoor\n' +
                '                                                Main Road,\n' +
                '                                                Tatabad\n' +
                '                                            </option>\n' +
                '                                            <option value="1410" data-lat="11.0231978" data-lon="77.0020938">1326,\n' +
                '                                                Avinashi\n' +
                '                                                Rd,\n' +
                '                                                Peelamedu\n' +
                '                                            </option>\n' +
                '                                            <option value="1671" data-lat="11.0232674" data-lon="77.0013445">1328,\n' +
                '                                                Avinashi\n' +
                '                                                Rd,\n' +
                '                                                Peelamedu, Coimbatore, Tamil Nadu 641004, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1631" data-lat="11.0164984" data-lon="76.9624531">13, Nehru\n' +
                '                                                St,\n' +
                '                                                Peranaidu\n' +
                '                                                Layout, Ram Nagar, Coimbatore, Tamil Nadu 641009, India\n' +
                '                                            </option>\n' +
                '                                            <option value="7651" data-lat="11.03309" data-lon="76.9781">140, Vysiyal\n' +
                '                                                Street,\n' +
                '                                                Vysiyal\n' +
                '                                                Street, Near Om Sakthi Temple, Perur Road, Sivasakthi Codata-lony,\n' +
                '                                                Ganapathypudur, Coimbatore, Tamil Nadu 641026, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3115" data-lat="11.0611199" data-lon="76.9908502">142, Mani\n' +
                '                                                Nagar,\n' +
                '                                                Saravanampatty, Coimbatore, Tamil Nadu 641035, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1700" data-lat="11.0877478" data-lon="77.0092463">14 I,\n' +
                '                                                NH948,\n' +
                '                                                Amman Nagar,\n' +
                '                                                Saravanampatty, Coimbatore, Tamil Nadu 641035, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1677" data-lat="10.9705408" data-lon="76.9691396"> 152E,\n' +
                '                                                Podanur\n' +
                '                                                Rd,\n' +
                '                                                Kurichi Pirivu, K.R. Koil Bus Stop, Thirumarai Nagar, Kurichi,\n' +
                '                                                Coimbatore,\n' +
                '                                                Tamil Nadu 641023, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3077" data-lat="11.0767343" data-lon="77.0022736">160, Sathy\n' +
                '                                                Rd,\n' +
                '                                                Saravanampatty, Coimbatore, Tamil Nadu 641035, India\n' +
                '                                            </option>\n' +
                '                                            <option value="7658" data-lat="11.03929" data-lon="76.98036">189,\n' +
                '                                                Thondamuthur\n' +
                '                                                Road,\n' +
                '                                                Thondamuthur Road, Near Police Station, Perur, Sri Lakshmi Nagar,\n' +
                '                                                Ganapathypudur, Coimbatore, Tamil Nadu 641010, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1689" data-lat="11.0013698" data-lon="77.0291534">18,\n' +
                '                                                Kamarajar\n' +
                '                                                Rd,\n' +
                '                                                Singanallur, Coimbatore, Tamil Nadu 641005, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1696" data-lat="11.034532" data-lon="76.981335">1B, Gandhi\n' +
                '                                                Nagar\n' +
                '                                                Main Road,\n' +
                '                                                Gandhi Nagar, Ganapathypudur, Coimbatore, Tamil Nadu 641006, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1650" data-lat="11.1006189" data-lon="77.0199">1, NH948, VGP\n' +
                '                                                Prem\n' +
                '                                                Nagar,\n' +
                '                                                Saravanampatty, Coimbatore, Tamil Nadu 641035, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3092" data-lat="11.031021" data-lon="76.977936">212,\n' +
                '                                                Sivasakthi\n' +
                '                                                Codata-lony,\n' +
                '                                                Ganapathypudur, Coimbatore, Tamil Nadu 641006, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3105" data-lat="11.019211" data-lon="76.965934">220, 7th St,\n' +
                '                                                Gandipuram,\n' +
                '                                                Coimbatore, Tamil Nadu 641012, India\n' +
                '                                            </option>\n' +
                '                                            <option value="7624" data-lat="11.0168685" data-lon="76.9234717">247-1,\n' +
                '                                                SH167,\n' +
                '                                                Aishwarya\n' +
                '                                                Nagar, PN Pudur, Coimbatore, Tamil Nadu 641007, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3073" data-lat="12.9588129" data-lon="77.605965">26, Hosur\n' +
                '                                                Rd,\n' +
                '                                                Richmond\n' +
                '                                                Town, Bengaluru, Karnataka 560025, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3128" data-lat="11.0076385" data-lon="76.9911236">27 A,\n' +
                '                                                Puliakulam Rd,\n' +
                '                                                Dhamu Nagar, Puliakulam, Coimbatore, Tamil Nadu 641045, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3085" data-lat="11.0233707" data-lon="76.9096076">29/1B,\n' +
                '                                                Marudhamalai Rd,\n' +
                '                                                Thirumurugan Nagar, Vadavalli, Coimbatore, Tamil Nadu 641041, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3114" data-lat="11.016909" data-lon="76.999219">29,\n' +
                '                                                Damodarswamy\n' +
                '                                                Nagar,\n' +
                '                                                Thirumagal Nagar, Masakalipalayam, Coimbatore, Tamil Nadu 641028, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3122" data-lat="11.0027985" data-lon="77.0282839">2,\n' +
                '                                                Kamarajar\n' +
                '                                                Rd, TNHB\n' +
                '                                                Housing Unit\n' +
                '                                            </option>\n' +
                '                                            <option value="1610" data-lat="11.0789611" data-lon="76.9998954">2nd Cross\n' +
                '                                                St,\n' +
                '                                                Raja\n' +
                '                                                Rajeshwari Nagar, Saravanampatty, Coimbatore, Tamil Nadu 641035, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1706" data-lat="11.0641825" data-lon="77.0079297">2,\n' +
                '                                                Vilankuruchi\n' +
                '                                                Rd,\n' +
                '                                                Poompugar Nagar, Murugan Nagar, Vinayagapuram, Coimbatore, Tamil Nadu\n' +
                '                                                641035, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3087" data-lat="11.0799949" data-lon="76.9314334">3/10B,\n' +
                '                                                Mullai\n' +
                '                                                Nagar,\n' +
                '                                                Thudiyalur, Coimbatore, Tamil Nadu 641034, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1637" data-lat="11.0107288" data-lon="76.9601196">355B, Patel\n' +
                '                                                Rd,\n' +
                '                                                Ram\n' +
                '                                                Nagar, Coimbatore, Tamil Nadu 641009, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3089" data-lat="11.0266274" data-lon="76.9038067">35,\n' +
                '                                                Koothandai\n' +
                '                                                Kovil St,\n' +
                '                                                IOB Codata-lony, Vadavalli, Coimbatore, Tamil Nadu 641041, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1629" data-lat="11.0165005" data-lon="76.9624154">363-372,\n' +
                '                                                Nehru\n' +
                '                                                St,\n' +
                '                                                Peranaidu Layout, Ram Nagar, Coimbatore, Tamil Nadu 641009, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1628" data-lat="11.0166004" data-lon="76.9624119">372, Nehru\n' +
                '                                                St,\n' +
                '                                                Peranaidu\n' +
                '                                                Layout, Ram Nagar, Coimbatore, Tamil Nadu 641009, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3086" data-lat="11.0937905" data-lon="76.9432598">3/78, VKV\n' +
                '                                                Nagar, NGGO\n' +
                '                                                Codata-lony, Thudiyalur, Coimbatore, Tamil Nadu 641022, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3127" data-lat="11.0055982" data-lon="76.9904102">38, Old\n' +
                '                                                Damu\n' +
                '                                                Nagar,\n' +
                '                                                Puliakulam, Coimbatore, Tamil Nadu 641045, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1473" data-lat="11.0717696" data-lon="76.9993955">3rd Cross\n' +
                '                                                St, G\n' +
                '                                                K S\n' +
                '                                                Nagar, Ramanandha Nagar, Saravanampatty, Coimbatore, Tamil Nadu 641035,\n' +
                '                                                India\n' +
                '                                            </option>\n' +
                '                                            <option value="1691" data-lat="11.0232114" data-lon="77.0021598">410,\n' +
                '                                                Avinashi\n' +
                '                                                Rd,\n' +
                '                                                Masakalipalayam, Peelamedu, Coimbatore, Tamil Nadu 641004, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3094" data-lat="11.015142" data-lon="76.994224">421,\n' +
                '                                                Udayampalayam,\n' +
                '                                                Coimbatore, Tamil Nadu 641028, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1670" data-lat="11.032166" data-lon="76.995232">440,\n' +
                '                                                Peelamedu,\n' +
                '                                                Coimbatore,\n' +
                '                                                Tamil Nadu 641004, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3088" data-lat="11.0245237" data-lon="76.8984557">49,\n' +
                '                                                Vadavalli-Thondamuthur Rd, Maharani Avenue, Vadavalli, Coimbatore, Tamil\n' +
                '                                                Nadu 641041, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1672" data-lat="10.991601" data-lon="77.016807">4,\n' +
                '                                                Kallimadai,\n' +
                '                                                Coimbatore,\n' +
                '                                                Tamil Nadu 641005, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1669" data-lat="11.008013" data-lon="76.950609">520, R.S.\n' +
                '                                                Puram,\n' +
                '                                                Coimbatore, Tamil Nadu 641002, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1667" data-lat="11.0151062" data-lon="76.9578716">56, Patel\n' +
                '                                                Rd,\n' +
                '                                                Opposite\n' +
                '                                                Lakshmi Gas, Kattoor, Ram Nagar, Coimbatore, Tamil Nadu 641009, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1673" data-lat="11.0025067" data-lon="77.0284134">58,\n' +
                '                                                Kamarajar\n' +
                '                                                Rd, TNHB\n' +
                '                                                Housing Unit, Singanallur, Coimbatore, Tamil Nadu 641005, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3124" data-lat="11.0069516" data-lon="76.9915615">63/54-55,\n' +
                '                                                Puliakulam Rd,\n' +
                '                                                Dhamu Nagar, Puliakulam, Coimbatore, Tamil Nadu 641045, India\n' +
                '                                            </option>\n' +
                '                                            <option value="9992" data-lat="12.9286135" data-lon="80.1623916">6th Cross\n' +
                '                                                St,\n' +
                '                                                Tharakeswari Nagar, Gowrivakkam, Sembakkam, Chennai, Tamil Nadu 600064,\n' +
                '                                                India\n' +
                '                                            </option>\n' +
                '                                            <option value="3126" data-lat="11.0066331" data-lon="76.9917613">74/75,\n' +
                '                                                Street\n' +
                '                                                Number 33,\n' +
                '                                                Opp. Sri Hospital, Dhamu Nagar, Puliakulam, Coimbatore, Tamil Nadu\n' +
                '                                                641045,\n' +
                '                                                India\n' +
                '                                            </option>\n' +
                '                                            <option value="3129" data-lat="11.0065229" data-lon="76.991613">79,\n' +
                '                                                Puliakulam\n' +
                '                                                Rd, Pudur,\n' +
                '                                                Coimbatore, Tamil Nadu 641045, India\n' +
                '                                            </option>\n' +
                '                                            <option value="3054" data-lat="11.0206995" data-lon="76.9967382">7, Avinashi\n' +
                '                                                Rd,\n' +
                '                                                Near\n' +
                '                                                Anjaneyar Kovil, Esso Bunk, Navaindia, Kalki Nagar, Peelamedu,\n' +
                '                                                Coimbatore,\n' +
                '                                                Tamil Nadu 641004, India\n' +
                '                                            </option>\n' +
                '                                            <option value="1635" data-lat="10.9420836" data-lon="76.9464481">7, Pleasant\n' +
                '                                                Nagar,\n' +
                '                                                Sreevatsa Hill View, BK Pudur, Kuniamuthur, Coimbatore, Tamil Nadu\n' +
                '                                                641042,\n' +
                '                                                India\n' +
                '                                            </option>\n' +
                '                                            <option value="1686" data-lat="11.0448999" data-lon="76.9877641">89,\n' +
                '                                                Prashakthi\n' +
                '                                                Nagar,\n' +
                '                                                Ganapathypudur, Coimbatore, Tamil Nadu 641006, India\n' +
                '                                            </option>\n' +
                '                                            <option value="9991" data-lat="12.9297688" data-lon="80.160678">8th Cross\n' +
                '                                                St, MF\n' +
                '                                                Nagar,\n' +
                '                                                Thirumalai Nagar, Sembakkam, Chennai, Tamil Nadu 600064, India\n' +
                '                                            </option>\n' +
                '                                        </select>\n' +
                '                                    </div>\n' +
                '\n' +
                '                                    ' +
                '<div class="form-group m-l-5 hide hide_res">' +
                '<label class="control-label w-in-100">Time to Reach the Destination</label>' +
                '<label id="estimatedtime" class="control-label f-s-14">10 km</label>' +
                '</div>' +
                '<div class="form-group m-l-5 hide hide_res">' +
                '<label class="control-label w-in-100">Distance to Reach the Destination</label>' +
                '<label id="estimatedkm" class="control-label f-s-14">10 km</label>' +
                '</div>' +
                '<div class="form-group">\n' +
                '                                        <label class="control-label">Number of Passenger</label>\n' +
                '                                        <select class="form-control input-sm" id="select_passenger">\n' +
                '                                            <option value="">Select Passenger</option>\n' +
                '                                            <option value="1">1</option>\n' +
                '                                            <option value="2">2</option>\n' +
                '                                            <option value="3">3</option>\n' +
                '                                            <option value="4">4</option>\n' +
                '                                            <option value="5">5</option>\n' +
                '                                            <option value="6">6</option>\n' +
                '                                            <option value="7">7</option>\n' +
                '                                            <option value="8">8</option>\n' +
                '                                            <option value="9">9</option>\n' +
                '                                            <option value="10">10</option>\n' +
                '                                            <option value="11">11</option>\n' +
                '                                            <option value="12">12</option>\n' +
                '                                        </select>\n' +
                '                                    </div>\n' +
                '\n' +
                '                                    <div class="form-group m-0">\n' +
                '                                        <button type="button" id="book_noe_but" class="btn btn-dark m-r-5 m-b-5 btn-sm">Book Now\n' +
                '                                        </button>\n' +
                '                                    </div>\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                        </form>\n' +
                '                    </div>\n' +
                '                </div>\n' +
                '            </div>\n' +
                '            <!-- end panel -->\n' +
                '        </div>';
            controlInput.appendChild(controlInputText);

            controlInput.addEventListener('click', function () {
                //$("#autocomplete").trigger('focus');
            });
        }


        function initialize() {
            var walkingLineSymbol = {
                path       : google.maps.SymbolPath.CIRCLE,
                fillOpacity: 1,
                scale      : 3
            };
            var walkingPathLine = new google.maps.Polyline({
                strokeColor  : '#00BFA5',
                strokeOpacity: 0,
                fillOpacity  : 0,
                icons        : [ {
                    icon  : walkingLineSymbol,
                    offset: '0',
                    repeat: '10px'
                } ]
            });

            directionsDisplay = new google.maps.DirectionsRenderer();
            var myLatlng = new google.maps.LatLng(11.0804455, 76.9949342);
            var mapOptions = {
                center          : myLatlng,
                zoom            : 14,
                mapTypeId       : google.maps.MapTypeId.ROADMAP,
                disableDefaultUI: true
            };
            map = new google.maps.Map(document.getElementById("google-map"), mapOptions);
            directionsDisplay.setMap(map);
            directionsDisplayW = new google.maps.DirectionsRenderer({
                suppressMarkers : true,
                polylineOptions : walkingPathLine,
                map             : map,
                preserveViewport: true
            });

            var centerControlDiv = document.createElement('div');
            var centerControl = new CenterControl(centerControlDiv, map);
            centerControlDiv.index = 1;
            map.controls[ google.maps.ControlPosition.BOTTOM_LEFT ].push(centerControlDiv);

            var centerInputControlDiv = document.createElement('div');
            var centerInputControl = new InputControl(centerInputControlDiv, map);
            centerInputControlDiv.index = 1;
            map.controls[ google.maps.ControlPosition.TOP_LEFT ].push(centerInputControlDiv);
            infowindow = new google.maps.InfoWindow({maxWidth: 200});

            var mobile_number = $(centerInputControlDiv).find('#mobile_number');

            var from_p = $(centerInputControlDiv).find('#from_place');
            $(from_p).select2();
            $(from_p).on('change', function () {
                deleteMarkers()
                var lat = $("#from_place option:selected").attr('data-lat');
                var lon = $("#from_place option:selected").attr('data-lon');
                lat = parseFloat(lat);
                lon = parseFloat(lon);
                var myLatLng = new google.maps.LatLng(lat, lon);

                start_place = myLatLng;
                bounds.extend(myLatLng);
                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map     : map,
                    icon    : "assets/images/A.png"
                });
                markers.push(marker);
                bounds.extend(myLatLng);
                map.setCenter(myLatLng);
                calcRoute(lat, lon);
            });

            var top = $(centerInputControlDiv).find('#to_place');
            $(top).select2();
            $(top).on('change', function () {
                var lat = $("#to_place option:selected").attr('data-lat');
                var lon = $("#to_place option:selected").attr('data-lon');
                lat = parseFloat(lat);
                lon = parseFloat(lon);
                var myLatLng = new google.maps.LatLng(lat, lon);

                end_place = myLatLng;
                bounds.extend(myLatLng);
                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map     : map,
                    icon    : "assets/images/B.png"
                });
                markers.push(marker);
                /*bounds.extend(myLatLng);
                map.setCenter(myLatLng);*/
                calcRoute(lat, lon);
            });

            var select_passenger = $(centerInputControlDiv).find('#select_passenger');
            $(select_passenger).select2();
            $(select_passenger).on('change', function () {
            });

            var book_now_but = $(centerInputControlDiv).find('#book_noe_but');
            $(book_now_but).on('click', function (e) {
                e.preventDefault();
                if ($(mobile_number).val() != "" && $(from_p).val() != "" && $(top).val() != "" && $(select_passenger).val() != "") {
                    toastr.success('Estimated drop in '+timeto+', Travel distance '+ disto, 'Booking Successfully.');
                } else {
                    toastr.error('I do not think that all inputs are filled. Please fill all required fields.', 'Error!')
                }

            });


            loadMap(map, vehicleList);
            map.setCenter(allMarkers[28].getPosition());



        }

        var timeto;
        var disto;
        function calcRoute() {
            var start = start_place;
            var end = end_place;
            if (start !== null && end !== null) {
                var request = {
                    origin     : start,
                    destination: end,
                    travelMode : 'DRIVING'
                };
                directionsService.route(request, function (result, status) {
                    if (status == 'OK') {
                        directionsDisplayW.setDirections(result);
                        var route = result.routes[ 0 ];
                        for (var i = 0; i < route.legs.length; i++) {
                            var routeSegment = i + 1;
                            timeto = route.legs[ i ].duration.text;
                            disto = route.legs[ i ].distance.text;
                            $('body').find('#estimatedtime').text(timeto);
                            $('body').find('#estimatedkm').text(disto);
                            $('body').find('.hide').removeClass('hide');
                        }

                        var bounds = new google.maps.LatLngBounds();
                        bounds.extend(start_place);
                        bounds.extend(end_place);
                        map.fitBounds(bounds);
                        map.setZoom(13);
                    }
                });

            }
        }

        function makeMarker(position, icon, vid, icon_label) {
            marker = new Marker({
                position: position,
                id: vid,
                icon: icon,
                map: map,
                //animation: google.maps.Animation.DROP,
                draggable: false,
                map_icon_label: icon_label
            });
            return marker;
        }

        var loadMap = function(map, locations){
            var i, latlng, markPos, icon;
            for (i in locations) {
                var color_array = {
                    "free": "#00DEAF",
                    "assigned": "#CD11EE",
                    "allotted": "#2B1AAB",
                    "running": "#9999FF",
                    "break_down": "#BE394F",
                    "break": "#F0AD4E",
                    "leave": "#E0690A"
                };

                icons.taxi.fillColor = color_array[locations[i]["running_status"]];
                markPos = new google.maps.LatLng(locations[i]['current_lat'], locations[i]['current_lng']);
                marker = makeMarker(markPos, icons.taxi, locations[i]["vehicle_no"], '<span class="map-icon m-b-38"><i class="fa fa-taxi f-s-16" aria-hidden="true"></i></span>');

                // console.log(marker);

                var geocoder = new google.maps.Geocoder();
                var LocationAddress;

                google.maps.event.addListener(marker, 'mouseover', (function (marker, i) {
                    return function () {
                        // Get the address of marker starts
                        latlng = new google.maps.LatLng(locations[i]['current_lat'], locations[i]["current_lng"]);
                        geocoder.geocode({
                            "latLng": latlng
                        }, function (results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                var placeName = results[0].address_components[0].long_name;
                                LocationAddress = results[0].formatted_address;

                                var content = LocationAddress.substring(0, 30) + "...<br /><b> Vehicle No: </b>" + locations[i]["vehicle_no"] + " <br><span class='hide'><b> Model: </b> " + locations[i]["model"] + "<br/><b> Seat Capacity: </b>" + locations[i]["seat_capacity"] + "<br/></span><b> Status: </b>" + show_as_label(locations[i]["running_status"]);

                                infowindow.setContent(content);
                                infowindow.open(map, marker);
                            }
                        });
                        google.maps.event.addListener(map, 'click', function () {
                            infowindow.close();
                        });

                        // Get the address of marker ends
                    }
                })(marker, i));

                function show_as_label(text) {
                    text = text.replace("_", " ");
                    var opt = text.toLowerCase().replace(/\b[a-z]/g, function (letter) {
                        return letter.toUpperCase();
                    });

                    return opt;
                }

                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        if ($("#allot_now_div").is(":visible") == true) {
                            var veh_id = locations[i]["vehicle_id"];
                            pick_veh_forAllot("marker", veh_id);
                        }
                    }
                })(marker, i));
                allMarkers.push(marker);
            }

            // >>>>> Fit all markers within the visible map area
            for (var i = 0; i < allMarkers.length; i++) {
                bounds.extend(allMarkers[i].getPosition());
            }
            // map.fitBounds(bounds);
            if (allMarkers.length == 1) {
                map.setCenter(allMarkers[0].getPosition());
                map.setZoom(15);
            }
            // console.log(allMarkers);
            // <<<<< Fit all markers within the visible map area

            markerCluster = new MarkerClusterer(map, allMarkers, {
                gridSize: 50,
                styles: styles[0]
            });
        };

        var icons = {
            taxi: {
                path: MAP_PIN,
                fillColor: '#348fe2',
                fillOpacity: 1,
                strokeColor: '',
                strokeWeight: 0
            },
            start: {
                path: ROUTE,
                fillColor: '#1998F7',
                fillOpacity: 1,
                strokeColor: '',
                strokeWeight: 0
            },
            end: {
                path: ROUTE,
                fillColor: '#6331AE',
                fillOpacity: 1,
                strokeColor: '',
                strokeWeight: 0
            }
        };

        initialize();
    },
};
window.addEventListener('load', function () {
    app.main();
});
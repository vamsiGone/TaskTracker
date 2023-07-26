<?php

class Data //extends MController
{
    function __construct()
    {
        //$this->DB = pg_connect("host=". HOST . "dbname=". DATABASE . "user=". USER . "password=". PASSWORD . "port=". PORT) or die('could not connect');
        //UNCOMMENT THE ABOVE LINE TO CONNECT TO DATABASE
    }

    function mobilenumberchange($array, $va)
    {
        foreach ($array as $key => $field) {
            if ($field[$va]) {
                $arr1 = str_split($array[$key][$va]);
                $array[$key][$va] = $arr1[0] . $arr1[1] . $arr1[2] = 'x' . $arr1[3] = 'x' . $arr1[4] = 'x' . $arr1[5] = 'x' . $arr1[6] = 'x' . $arr1[7] = 'x' . $arr1[8] . $arr1[9];
            }
        }
        return $array;
        //print_r(json_encode($this->mobilenumberchange($array, 3)));
    }

    function removelast($array, $va)
    {
        foreach ($array as $key => $field) {
            if ($field[$va]) {
                $t = explode("", $array[$key][$va]);
                $array[$key][$va] = $t[0] . ' ' . $t[1];
            }
        }
        return $array;
        //print_r(json_encode($this->removelast($array, 3)));
    }

    function get_starred($str, $cc)
    {
        $len = strlen($str);
        return substr($str, 0, $cc) . str_repeat('*', $len - 2) . substr($str, $len - 1, 1);
    }

    function emailchange($array, $va)
    {
        foreach ($array as $key => $field) {
            if ($field[$va]) {
                $t = explode("@", $array[$key][$va]);
                $array[$key][$va] = $this->get_starred($t[0], 2) . '@' . $t[1];

            }
        }
        return $array;
        //print_r(json_encode($this->emailchange($array, 3)));
    }

    function imeichange($array, $va)
    {
        foreach ($array as $key => $field) {
            if ($field[$va]) {
                if ($array[$key][$va] != "null") {
                    $array[$key][$va] = $this->get_starred($array[$key][$va], 10);
                }
            }
        }
        return $array;
        //print_r(json_encode($this->imeichange($array, 3)));
    }

    function sample()
    {
        echo 'Sample';
    }

    function regular($data1, $data2)
    {
        $array = [[1, "anu radha", "90xxxxxx94", "pn pudur", "womens center", "2018-04-09", "31/12/2018", "mon, tues, wed, thu, fri", "08:30:00", "Active"], [2, "anuradha", "90xxxxxx19", "koundampalayam, india", "koundampalayam", "2018-04-09", "31/12/2018", "mon, tues, wed, thu, fri", "16:15:00", "In-Active"], [3, "chitra", "93xxxxxx04", "kannappan nagar", "oppanakara street", "2018-06-01", "31/12/2018", "mon, tues, wed, thu, fri, sat", "09:15:00", "Active"], [4, "chitra", "93xxxxxx04", "oppanakara street", "kannappan nagar", "2018-06-01", "31/12/2018", "mon, tues, wed, thu, fri, sat", "17:00:00", "Active"], [5, "devaraj ", "89xxxxxx45", "rACe course", "lakshmi mills", "2018-04-07", "31/12/2018", "sun, mon, tues, wed, thu, fri, sat", "17:30:00", "In-Active"], [6, "devaraj ", "89xxxxxx45", "lakshmi mills", "rACe course", "2018-04-07", "31/12/2018", "sun, mon, tues, wed, thu, fri, sat", "20:45:00", "In-Active"], [7, "dr. ramasamy", "94xxxxxx40", "k.k pudhur", "peelamedu", "2018-04-08", "31/12/2018", "mon, tues, wed, thu, fri", "08:30:00", "Active"], [8, "dr. ramasamy", "94xxxxxx40", "peelamedu", "k.k pudhur", "2018-04-09", "31/12/2018", "mon, tues, wed, thu, fri", "12:30:00", "Active"], [9, "dr. ramasamy", "94xxxxxx40", "peelamedu", "k.k pudhur", "2018-04-09", "31/12/2018", "mon, tues, wed, thu, fri", "12:30:00", "In-Active"], [10, "dr antiha", "82xxxxxx89", "saibaba colony", "gh", "2018-06-25", "31/12/2018", "mon, tues, wed, thu, fri, sat", "08:00:00", "In-Active"], [11, "dr antiha", "82xxxxxx89", "gh", "saibaba colony", "2018-06-25", "31/12/2018", "mon, tues, wed, thu, fri, sat", "16:30:00", "In-Active"], [12, "dr.sivangyanam", "99xxxxxx62", "hope college", "kmch", "2018-04-07", "31/12/2018", "mon, tues, wed, thu, fri, sat", "08:45:00", "Active"], [13, "dr.sivangyanam", "99xxxxxx62", "kmch", "hope college", "2018-04-07", "31/12/2018", "mon, tues, wed, thu, fri, sat", "18:00:00", "Active"], [14, "dr.sivangyanam", "99xxxxxx62", "hope college", "fun mall", "2018-04-07", "31/12/2018", "mon, tues, wed, thu, fri, sat", "19:00:00", "Active"], [15, "dr.sivangyanam", "99xxxxxx62", "fun mall", "hope college", "2018-04-07", "31/12/2018", "mon, tues, wed, thu, fri, sat", "22:00:00", "Active"], [16, "geetha", "99xxxxxx70", "town hall", "ramakrishna hospital", "2018-04-07", "31/12/2018", "tues, thu, sat", "14:00:00", "Active"], [17, "geetha", "99xxxxxx70", "ramakrishna hospital", "town hall", "2018-04-07", "31/12/2018", "tues, thu, sat", "19:30:00", "Active"], [18, "isabella", "90xxxxxx46", "vadavalli", "agri", "2018-05-26", "31/12/2018", "mon, tues, wed, thu, fri, sat", "09:30:00", "Active"], [19, "isabella", "90xxxxxx46", "agri", "vadavalli", "2018-05-26", "31/12/2018", "mon, tues, wed, thu, fri, sat", "12:30:00", "Active"], [20, "isabella", "90xxxxxx46", "vadavalli", "agri", "2018-05-26", "31/12/2018", "mon, tues, wed, thu, fri, sat", "13:45:00", "Active"]];

        $tags = array_map(function ($tag) {
            return array(
                'SNo'          => ucfirst($tag[0]),
                'CustomerName' => ucfirst($tag[1]),
                'MobileNumber' => ucfirst($tag[2]),
                'FromLocation' => ucfirst($tag[3]),
                'ToLocation'   => ucfirst($tag[4]),
                'StartDate'    => ucfirst($tag[5]),
                'DaysinWeek'   => ucfirst($tag[6]),
                'PickupTime'   => ucfirst($tag[7]),
                'Status'       => ucfirst($tag[8]),
                'Status1'      => ucfirst($tag[9])
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }

    function role($data1, $data2)
    {
        $array = [[1, "Admin", "In-Active"], [3, "Assignor", "Active"], [19, "Booking Agents", "Active"], [4, "Driver", "Active"], [18, "manager", "Active"], [5, "Owner", "Active"], [2, "Shift Assignor", "Active"], [6, "Tech Admin", "Active"]];
        $tags = array_map(function ($tag) {
            return array(
                'sno'    => $tag[0],
                'role'   => ucfirst($tag[1]),
                'status' => ucfirst($tag[2])
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }

    function customer_master($data1, $data2)
    {
        $array = [[49562, "Subramaniyam", "94XXXXXX60", "su*******l@yahoo.com", null, "In-Active", "vadavalli, Mullai Nagar", null, "crm"], [80158, "Stanley", "98XXXXXX25", "st**********r@gmail.com", null, "Active", "3/122, TeAChers Colony, Annur", null, "crm"], [126578, "Stanly", "95XXXXXX83", "st***********r@gmail.com", "No", "Active", "", "30-08-2018", "crm"], [60305, "Ibrahim ", "99XXXXXX02", "s.*********c@gmail.com", null, "Active", "grand regent", null, "crm"], [12752, "Sasikumar.", "98XXXXXX21", "ss**************y@gmail.com", null, "Active", "14/26 sri ram garden phase II, Vedapatti, Kurumbapalayam", null, "crm"], [28234, "Raguraman", "96XXXXXX46", "sr******4@yahoo.co.in", null, "Active", "Sri Garden Apartment Flat E 2, 3 rd Floor Arun Nager Vadavalli", null, "crm"], [32272, "Ramaswamy", "94XXXXXX37", "sr*******a@yahoo.co.in", null, "Active", "2, indra nagar, gold wins, cbe 14 ", null, "crm"], [126695, "srisarankumar m", "99XXXXXX22", "sr************2@gmail.com", null, "Active", null, "22-03-2018", "app"], [54538, "Srinivasan ", "94XXXXXX11", "sr*******a@gmail.com", null, "Active", "koundam,apalayam govt it staff", null, "crm"], [60101, "Anand", "98XXXXXX82", "sr***i@fashionsquare.biz", null, "Active", "lee meridian hotel, chiniyam palayam\r\n\r\nnot give address", null, "crm"], [83831, "Srinivasan", "93XXXXXX06", "sr********0@yahoo.com", null, "Active", "7,hindusthan avenue,avarampalayam", null, "crm"], [18984, "Sushant", "93XXXXXX94", "sr*********a@gmail.com", "No", "Active", "chinmaya mission 1334a, thadagam rd, rspuram", "16-08-2018", "crm"], [90962, "Bhuvaneshwari", "99XXXXXX91", "sr*********a@gmail.com", "No", "Active", "kavundampalaym ", "16-08-2018", "crm"], [62453, "Valli murugesan", "94XXXXXX60", "sr*********a@gmail.com", "No", "Active", "3rd st, koundampalayam", "16-08-2018", "crm"], [52616, "Srinath", "97XXXXXX64", "sr*****6@gmail.com", null, "Active", "gm mills koungu nadu arts", null, "crm"], [41229, "Kokila", "87XXXXXX48", "sp**********b@yahoo.co.in", null, "Active", "Maha Rani Avanue,\r\nvadavalli", null, "crm"], [74564, "Gopinath", "97XXXXXX17", "sp**o@smcindia.in", null, "Active", "41 cwest barshikarler rd \r\nnera eye foundation \r\nrs puram", null, "crm"], [51708, "Santhosh", "97XXXXXX10", "so*******7@gmail.com", null, "Active", "1,gandhi nagar, behind charan nager", null, "crm"], [11624, "Ravi Venkataraman", "97XXXXXX76", "so*****a@hotmail.com", null, "Active", "D2 Tri Star Apartment laxmi mills avinashi road cbe", null, "crm"], [74468, "Sounder Rajan", "99XXXXXX35", "so***********n@wipro.com", null, "Active", "106,lingapa setty st,coimbatore-1", null, "crm"]];

        $tags = array_map(function ($tag) {
            return array(
                'sno'              => ucfirst($tag[0]),
                'Name'             => ucfirst($tag[1]),
                'PrimaryMobile'    => ucfirst($tag[2]),
                'Email'            => ucfirst($tag[3]),
                'VIP'              => ucfirst($tag[4]),
                'Status'           => ucfirst($tag[5]),
                'Address'          => ucfirst($tag[6]),
                'RegistrationDate' => ucfirst($tag[7]),
                'RegMode'          => ucfirst($tag[8]),
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }

    function customer_type_master($data1, $data2)
    {
        $array = [[2, "Gold", "#a67c00", "Active"], [4, "Normal", "#1b66ff", "Active"], [1, "Platinum", "#7F51BE", "Active"], [3, "Silver", "#FA8072", "Active"], [2, "Golden", "#68df2b", "In-Active"]];
        $tags = array_map(function ($tag) {
            return array(
                'sno'    => ucfirst($tag[0]),
                'Type'   => ucfirst($tag[1]),
                'Color'  => ucfirst($tag[2]),
                'Status' => ucfirst($tag[3])
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }

    function user_master($data1, $data2)
    {
        $array = [[435, "435 Siva", "435", "75XXXXXX00", "", null, "", "Active", "907 Annanagar Housing Unit Veerakeralam"], [85, "437 Kathiravan", "437", "86XXXXXX56", "", null, "", "Active", "124 amma nager kuttianila thottam mAChamapalayam sundarapuram cbe : 641024"], [438, "438 Ravishankar", "438", "98XXXXXX11", "ravirani211@yahoo.co.in", null, "", "Active", "4/11, super garden extension 2, vadavalli"], [72, "441 Marimuthu", "441", "74XXXXXX62", "", null, "", "Active", "2/3, moover nagar, kavundampalayam, cbe-640030"], [442, "442 Vaigundaraj", "442", "93XXXXXX08", "", null, "", "Active", "4/134 VijayaAChampadu Therku theru Naganeri Tahaluka Thrunelvelli"], [444, "444 Arogyasamy", "444", "88XXXXXX52", "", null, "", "Active", "15 c2, Cheran thottam, GN Mills"], [445, "445 Srinivasan", "445", "88XXXXXX22", "", null, "", "Active", "92c, Maruthakonar street, velandipalayam, cbe-25"], [123, "447 Kalimuthu", "447", "99XXXXXX57", "", null, "", "Active", "2/3 Periyapatti chetti st sundakamuttur cbe-10"], [164, "448 Chinnadurai", "448", "70XXXXXX23", "", null, "", "Active", "107 A Periyar nager saibabakovil cbe :43"], [163, "448 Owner", "448", "70XXXXXX23", "", null, "", "Active", "107 A periyar nager Saibabakovil cbe :43"], [122, "453 Rajkumar", "453", "96XXXXXX35", "", null, "", "Active", "25 Vadavalangulam kodikulam po paramakudi"], [111, "455 Abdul", "455555", "90XXXXXX35", "", null, "", "In-Active", "3rd, cross, sri ayyappan nagar, narasimma puram, kuniamuthur 641008"], [51, "455 Abdul", "45512", "97XXXXXX90", "", null, "", "Active", "50 Om ganesh nager vadavalli"], [155, "455 Durai", "455", "95XXXXXX55", "", null, "", "Active", "9/104 Jeeva nager Gn mills post Urumandampalayam"], [154, "455 Owner", "455", "95XXXXXX15", "", null, "", "Active", "9/104 Jeeva St Gn mills post urumandampalayam"], [456, "456 Govindraj", "456", "96XXXXXX85", "", null, "", "Active", "10/22, kippepalayam, thoendamuthur"], [459, "459 Rafi", "459", "94XXXXXX00", "", null, "", "Active", "27/3 Royal Nagar, Karumbukkadai, Coimbatore 8"], [465, "465 Ajithkumar", "465", "95XXXXXX24", "", null, "", "Active", "1st division, mudis valparai"], [471, "471 Ravi", "471", "82XXXXXX67", "", null, "", "Active", "35/78, Rajiv gandhi 1st street, edayarplayam, cbe-641025"], [106, "471 Senthamarai", "471 Owner", "98XXXXXX32", "", null, "", "Active", "9/73, senniyappa goundar, 9/73,2nd floor, new anantha nagar, p n pudur, cbe 641041"]];

        $tags = array_map(function ($tag) {
            return array(
                'sno'           => ucfirst($tag[0]),
                'namee'         => ucfirst($tag[1]),
                'UaerName'      => ucfirst($tag[2]),
                'PrimaryMobile' => ucfirst($tag[3]),
                'Address'       => ucfirst($tag[8]),
                'Status'        => ucfirst($tag[7])
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }

    function zone_master($data1, $data2)
    {
        $array = [[10, "saibaba colony, kk pudur, velandipalayam, venkatapuram", "in-Active"], [11, "rs puram, vadakovai, poo market, ghandhipark", "Active"], [12, "vadavalli, pn pudur, marudhamalai", "Active"], [13, "edayarpalayam, tvs nagar, kanuvai", "Active"], [14, "thudiyalur, gn mills, nggo colony, goundampalayam", "Active"], [16, "ganapathy, sanganoor, textool", "Active"], [18, "gandhipuram, sidhapudur, omni bus stand, ram nagar", "Active"], [19, "saravanampatti, ramakrishnapuram, kgisl, keeranatham", "Active"], [20, "thondamuthur, siruvani, vellingiri ", "Active"], [21, "vedapatti, veerakeralam, sundapalayam", "Active"], [24, "sitra, airport, hopes, kalapptti, codissia", "Active"], [25, "kovaipudur, sundakkamuthur, perur, telungulapalayam", "Active"], [27, "ukkadam, oppanakkara st, vysyal st, townhall, selvapuram", "Active"], [30, "pothanur, sundarapuram, kuniamuthur, ichanari", "Active"], [32, "railway station, collector office,rACe course, anna silai", "Active"], [33, "peelamedu, laxmi mills, nava india, avarampalayam", "Active"], [34, "singanallur, gv residency, sowripalayam, udayampalayam", "Active"], [35, "ramanathapuram, nanjundapuram, sungam, puliakulam", "Active"], [36, "long distance < 100 kms", "Active"], [37, "long distance > 100 kms but < 200 kms", "Active"], [38, "long distance >200 kms but < 300 kms", "Active"], [39, "long distance > 300 kms", "Active"], [40, "cheran maa nagar, gandhi maa nagar, thannerrpandal", "Active"], [41, "ondipudur, chinthamani pudur, pappampatti, sulur", "Active"]];
        $tags = array_map(function ($tag) {
            return array(
                'sno'    => ucfirst($tag[0]),
                'namee'  => ucfirst($tag[1]),
                'Status' => ucfirst($tag[2])
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }

    function location_master($data1, $data2)
    {
        $array = [[1696, "1B, Gandhi Nagar Main Road, Gandhi Nagar, Ganapathypudur, Coimbatore, Tamil Nadu 641006, India", 11.034532, 76.981335, "Active"], [1650, "1, NH948, VGP Prem Nagar, Saravanampatty, Coimbatore, Tamil Nadu 641035, India", 11.1006189, 77.0199, "Active"], [3092, "212, Sivasakthi Colony, Ganapathypudur, Coimbatore, Tamil Nadu 641006, India", 11.031021, 76.977936, "Active"], [3105, "220, 7th St, Gandipuram, Coimbatore, Tamil Nadu 641012, India", 11.019211, 76.965934, "Active"], [7624, "247-1, SH167, Aishwarya Nagar, PN Pudur, Coimbatore, Tamil Nadu 641007, India", 11.0168685, 76.9234717, "Active"], [3073, "26, Hosur Rd, Richmond Town, Bengaluru, Karnataka 560025, India", 12.9588129, 77.605965, "Active"], [3128, "27 A, Puliakulam Rd, Dhamu Nagar, Puliakulam, Coimbatore, Tamil Nadu 641045, India", 11.0076385, 76.9911236, "Active"], [3085, "29/1B, Marudhamalai Rd, Thirumurugan Nagar, Vadavalli, Coimbatore, Tamil Nadu 641041, India", 11.0233707, 76.9096076, "Active"], [3114, "29, Damodarswamy Nagar, Thirumagal Nagar, Masakalipalayam, Coimbatore, Tamil Nadu 641028, India", 11.016909, 76.999219, "Active"], [3122, "2, Kamarajar Rd, TNHB Housing Unit", 11.0027985, 77.0282839, "Active"], [1610, "2nd Cross St, Raja Rajeshwari Nagar, Saravanampatty, Coimbatore, Tamil Nadu 641035, India", 11.0789611, 76.9998954, "Active"], [1706, "2, Vilankuruchi Rd, Poompugar Nagar, Murugan Nagar, Vinayagapuram, Coimbatore, Tamil Nadu 641035, India", 11.0641825, 77.0079297, "Active"], [3087, "3/10B, Mullai Nagar, Thudiyalur, Coimbatore, Tamil Nadu 641034, India", 11.0799949, 76.9314334, "Active"], [1637, "355B, Patel Rd, Ram Nagar, Coimbatore, Tamil Nadu 641009, India", 11.0107288, 76.9601196, "Active"], [3089, "35, Koothandai Kovil St, IOB Colony, Vadavalli, Coimbatore, Tamil Nadu 641041, India", 11.0266274, 76.9038067, "Active"], [1629, "363-372, Nehru St, Peranaidu Layout, Ram Nagar, Coimbatore, Tamil Nadu 641009, India", 11.0165005, 76.9624154, "Active"], [1628, "372, Nehru St, Peranaidu Layout, Ram Nagar, Coimbatore, Tamil Nadu 641009, India", 11.0166004, 76.9624119, "Active"], [3086, "3/78, VKV Nagar, NGGO Colony, Thudiyalur, Coimbatore, Tamil Nadu 641022, India", 11.0937905, 76.9432598, "Active"], [3127, "38, Old Damu Nagar, Puliakulam, Coimbatore, Tamil Nadu 641045, India", 11.0055982, 76.9904102, "Active"], [1473, "3rd Cross St, G K S Nagar, Ramanandha Nagar, Saravanampatty, Coimbatore, Tamil Nadu 641035, India", 11.0717696, 76.9993955, "Active"]];
        $tags = array_map(function ($tag) {
            return array(
                'sno'    => ucfirst($tag[0]),
                'name'   => ucfirst($tag[1]),
                'lat'    => ucfirst($tag[2]),
                'lon'    => ucfirst($tag[3]),
                'Status' => ucfirst($tag[4])
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }

    function vehicle_model_master($data1, $data2)
    {
        $array = [[92, "any vehicle", "", "any vehicle", 4, 20, "In-Active"], [83, "chevarlot", "hatch bACk", "enjoy AC", 5, 12, "Active"], [81, "chevarlot", "hatch bACk", "tavera AC", 5, 12, "Active"], [88, "chevarlot", "mini AC", "beat Non AC", 5, 10, "Active"], [75, "chevarlot", "mini AC", "beat", 5, 12, "Active"], [67, "chinna", "hatch bACk", "bpl", 10, 12, "Active"], [65, "ford", "sedan AC", "aspire", 4, 15, "Active"], [79, "hyundai", "sedan AC", "hyundai xcent", 5, 12, "Active"], [80, "mahendra", "hatch bACk", "xylo AC", 7, 12, "Active"], [91, "maruti", "sedan AC", "dzire AC", 4, 20, "Active"], [90, "maruti", "sedan AC", "dzire Non AC", 4, 20, "Active"], [77, "maruti suzuki", "sedan AC", "dzire AC", 5, 12, "Active"], [74, "maruti suzuki", "mini AC", "maruti ritz", 5, 12, "Active"], [82, "renault", "hatch bACk", "renault lodgy", 5, 15, "Active"], [73, "tata", "mini AC", "indica AC", 5, 12, "Active"], [87, "tata", "mini AC", "indica Non AC", 5, 12, "Active"], [86, "tata", "mini AC", "indigo xest", 5, 12, "Active"], [89, "tata", "mini AC", "indica Non AC", 4, 20, "Active"], [85, "tata", "mini AC", "indigo AC", 6, 12, "Active"], [76, "tata", "mini AC", "indigo Non AC", 4, 12, "Active"]];
        $tags = array_map(function ($tag) {
            return array(
                'sno'     => ucfirst($tag[0]),
                'make'    => ucfirst($tag[1]),
                'tariff'  => ucfirst($tag[2]),
                'model'   => ucfirst($tag[3]),
                'seat'    => ucfirst($tag[4]),
                'mileage' => ucfirst($tag[5]),
                'status'  => ucfirst($tag[6])
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }

    function vehicle_master($data1, $data2)
    {
        $array = [[155, "indica AC", "8648500359*************9", "tn 99 j 3994", "437", 100, "", 'yes', "disabled"], [66, "indica AC", "3571520846*************0", "tn11y21", "40", 0, "", 'no', "In-Active"], [171, "indica AC", "3581880770*************0", "tn37bp 2946", "417", 230000, "", null, "In-Active"], [69, "maruti ritz", "8691240264*************6", "tn66t0759", "408", 0, "408", null, "Active"], [67, "maruti ritz", "null", "tn99f7354", "404", 0, "", null, "In-Active"], [141, "maruti ritz", "3533220669*************7", "tn 38 cd 1231", "420", 100177, "", null, "In-Active"], [70, "maruti ritz", "8697280207*************5", "tn66t3368", "409", 0, "", null, "Active"], [188, "maruti ritz", "3554060916*************9", "tn37da 6169", "425", 25000, "425", null, "In-Active"], [75, "beat", "null", "tn37cr3795", "424", 0, "", null, "In-Active"], [76, "beat", "8629600339*************0", "tn37cq8163", "426", 0, "426", null, "disabled"], [170, "indigo Non AC", "3527450722*************1", "tn 38 bt 8107", "00635", 10000, "", null, "In-Active"], [97, "indigo Non AC", "9114307081*************6", "tn37cm6154", "601", 0, "", null, "In-Active"], [108, "dzire AC", "8613270311*************6", "tn38cc7139", "633", 0, "", null, "Active"], [193, "dzire AC", "3580010728*************3", "tn 99 f 7954", "655", 54980, "655", null, "Active"], [185, "dzire AC", "8681430293*************6", "tn38 cm 7018", "635", 100, "635", null, "Active"], [101, "dzire AC", "3535730940*************5", "tn99e8944", "608", 0, "", null, "Active"], [123, "dzire AC", "9115770501*************5", "tn37tt2445", "699", 0, "", null, "In-Active"], [106, "dzire AC", "3527760707*************5", "tn38bt3766", "00631", 0, "", null, "In-Active"], [107, "dzire AC", "8663440337*************6", "tn99c5265", "632", 0, "", null, "In-Active"], [159, "dzire AC", "3552870819*************1", "tn 37 da 4993", "679", 100, "", null, "In-Active"]];

        $tags = array_map(function ($tag) {
            return array(
                'sno'    => ucfirst($tag[0]),
                'model'  => ucfirst($tag[1]),
                'imei'   => ucfirst($tag[2]),
                'reg'    => ucfirst($tag[3]),
                'vech'   => ucfirst($tag[4]),
                'km'     => ucfirst($tag[5]),
                'driver' => ucfirst($tag[6]),
                'app'    => ucfirst($tag[7]),
                'status' => ucfirst($tag[8])
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }

    function reasons_master($data1, $data2)
    {
        $array = [[3, "Breakdown", "ACcident", "Active"], [4, "Breakdown", "Mechanical Complaint", "Active"], [5, "Breakdown", "Driver Health", "Active"], [23, "Breakdown", "test", "Active"], [6, "Breakdown", "Vehicle Puncture", "Active"], [1, "Cancellation", "Customer Cancellation", "Active"], [21, "Cancellation", "test", "Active"], [8, "Cancellation", "Driver no responce", "Active"], [25, "Cancellation", "Customer Program Change", "Active"], [26, "Cancellation", "Others", "Active"], [7, "Cancellation", "Bad Vehicle Condition", "Active"], [9, "Cancellation", "Double Booking", "Active"], [18, "Negative FeedbACk", "Any other reason explained as per remarks column", "Active"], [17, "Negative FeedbACk", "Rude Behavior of driver", "Active"], [20, "Negative FeedbACk", "test", "Active"], [14, "Positive FeedbACk", "Will suggest to the friends", "Active"], [16, "Positive FeedbACk", "Ease of App Operation", "Active"], [19, "Positive FeedbACk", "test", "Active"], [11, "Positive FeedbACk", "Clean Vehicle", "Active"], [12, "Positive FeedbACk", "On Time Arrival", "Active"], [13, "Positive FeedbACk", "Ease of settling", "Active"], [15, "Positive FeedbACk", "Knowledgeable  Driver", "Active"], [29, "Followup", "Driver Not Yet Called Customer", "Active"], [28, "Followup", "Driver SMS not Delivered", "Active"], [22, "Followup", "Driver Non Cooperation / Rude Behaviour", "Active"], [27, "Followup", "Booking Conformed", "Active"], [2, "Reopen", "Customer Request", "Active"], [10, "Reopen", "Technical Error", "In-Active"], [24, "Reopen", "test", "Active"]];
        $tags = array_map(function ($tag) {
            return array(
                'sno'    => ucfirst($tag[0]),
                'type'   => ucfirst($tag[1]),
                'reason' => ucfirst($tag[2]),
                'status' => ucfirst($tag[3])
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }

    function dispatcher_wise($data1, $data2)
    {
        $array = [[3, "arumugam", 5, 28, 29, 0, 51, 20, 0, 8, 0, 0, "6715", "11074", 0, 1], [5, "superadmin", 0, 0, 44, 0, 0, 0, 0, 0, 0, 0, "4935", "0", 0, 2], [6, "testadmin", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, "0", "0", 0, 3], [11, "julie", 0, 0, 1, 0, 0, 0, 0, 2, 46, 0, "170", "0", 0, 4], [61, "admin.", 0, 0, 20, 0, 13, 7, 0, 0, 0, 0, "20026", "5661", 0, 5], [62, "admin1", 3, 2, 46, 0, 333, 7, 0, 23, 0, 0, "13791", "1125", 3, 6], [63, "pradeepa", 0, 2, 118, 0, 11, 28, 0, 18, 0, 38, "37997", "4826", 4, 7], [64, "anitha", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, "0", "0", 0, 8], [67, "rubina", 0, 0, 61, 0, 0, 2, 0, 8, 0, 25, "14721", "278", 3, 9], [172, "kamal", 0, 15, 66, 0, 0, 20, 0, 9, 0, 1, "15128", "14693", 3, 10]];
        $tags = array_map(function ($tag) {
            return array(
                'sno'        => ucfirst($tag[0]),
                'name'       => ucfirst($tag[1]),
                'login'      => ucfirst($tag[2]),
                'logout'     => ucfirst($tag[3]),
                'book'       => ucfirst($tag[4]),
                'appbook'    => ucfirst($tag[5]),
                'allot'      => ucfirst($tag[6]),
                'close'      => ucfirst($tag[7]),
                'enquiry'    => ucfirst($tag[8]),
                'cancel'     => ucfirst($tag[9]),
                'complaint'  => ucfirst($tag[10]),
                'followup'   => ucfirst($tag[11]),
                'collection' => ucfirst($tag[12]),
                'new'        => ucfirst($tag[2])
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }

    function vehicle_consolidate($data1, $data2)
    {
        $array = [["", "802", 1, 2, "401", "98011", "16:7:00", "00:14:15", "17.21", "98459.21", "6900.00", "6900", "828", 1], ["", "811", 1, 1, "503", "0", "0:2:00", "00:16:40", "13.27", "576.27", "6677.00", "6677", "801.24", 2], ["", "645", 0, 8, "285", "41313", "0:9:00", "00:42:05", "18.16", "41366.16", "5176.00", "5176", "621.12", 3], ["", "644", 1, 1, "300", "0", "9:12:00", "00:01:38", "11.00", "154377.00", "3300.00", "3300", "396", 4], ["", "408", 0, 8, "210", "64", "13:32:00", "00:32:16", "15.63", "113799.63", "3283.00", "3283", "393.96", 5], ["", "655", 0, 4, "250", "0", "8:23:00", "00:05:20", "13.06", "59519.06", "3265.00", "3265", "391.8", 6], ["", "662", 1, 5, "71", "691", "4:29:00", "00:12:12", "41.79", "691", "2967.00", "2967", "356.04", 7], ["", "409", 1, 1, "217", "0", "11:36:00", "00:02:41", "13.36", "90996.36", "2900.00", "2900", "348", 8], ["", "403", 1, 14, "158", "66", "5:40:00", "00:12:59", "17.37", "266986.37", "2745.00", "2745", "329.4", 9], ["", "621", 1, 3, "197", "9", "10:46:00", "00:02:15", "13.08", "162170.08", "2576.00", "2576", "309.12", 10], ["", "639", 1, 6, "138", "88622", "8:46:00", "00:06:06", "18.43", "177273.43", "2544.00", "2544", "305.28", 11], ["", "447", 0, 11, "147", "44", "5:32:00", "00:11:12", "16.70", "29972.70", "2455.00", "2455", "294.6", 12], ["", "608", 0, 9, "125", "48", "4:57:00", "00:15:39", "18.75", "97652.75", "2344.00", "2344", "281.28", 13], ["", "663", 1, 3, "206", "29", "6:13:00", "00:03:33", "11.07", "26810.07", "2280.00", "2280", "273.6", 14], ["", "414", 1, 12, "119", "280063", "6:4:00", "00:10:14", "18.42", "559925.42", "2192.00", "2192", "263.04", 15], ["", "471", 1, 3, "136", "11", "0:4:00", "00:13:23", "15.07", "149780.07", "2050.00", "2050", "246", 16], ["", "653", 1, 1, "125", "0", "0:1:00", "00:14:36", "14.80", "457.80", "1850.00", "1850", "222", 17], ["", "636", 1, 11, "179", "28", "4:24:00", "00:07:44", "10.22", "9736.22", "1829.00", "1829", "219.48", 18], ["", "635", 1, 5, "94", "44", "0:5:00", "00:08:11", "17.37", "61.37", "1633.00", "1633", "195.96", 19], ["", "617", 1, 5, "100", "0", "6:55:00", "00:04:03", "14.57", "405.57", "1457.00", "1457", "174.84", 20], ["", "678", 1, 2, "37", "6", "4:20:00", "00:02:33", "19.92", "13416.92", "737.00", "737", "88.44", 21], ["", "640", 1, 2, "34", "30", "0:3:00", "00:04:08", "13.24", "79.24", "450.00", "450", "54", 22], ["", "602", 0, 3, "15", "0", "0:26:00", "00:01:51", "20.00", "152515.00", "300.00", "300", "36", 23], ["", "412", 1, 1, "3", "0", "0:17:00", "00:00:41", "29.00", "498.00", "87.00", "87", "10.44", 24]];
        $tags = array_map(function ($tag) {
            return array(
                'sno'           => ucfirst($tag[0]),
                'vid'           => ucfirst($tag[1]),
                'noofdays'      => ucfirst($tag[2]),
                'trips'         => ucfirst($tag[3]),
                'runkm'         => ucfirst($tag[4]),
                'emptykm'       => ucfirst($tag[5]),
                'runtime'       => ucfirst($tag[6]),
                'idle'          => ucfirst($tag[7]),
                'APRK1'         => ucfirst($tag[8]),
                'APRK2'         => ucfirst($tag[9]),
                'avgcollperday' => ucfirst($tag[10]),
                'coll'          => ucfirst($tag[11]),
                'cccharge'      => ucfirst($tag[12])
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }

    function booking($data1, $data2)
    {
        $array = [[74497, "radhakrishnan", "95xxxxxx01", "PVR201872795", "408", "408 nagaraj", "new thillai nagar, pn pudur, coimbatore, tamil nadu, india", "gandhipuram", "maruti ritz", "crm", "145", 2, "17/09 09:15 pm", "114206", "114214", "5", "17/09 09:27 pm", "17/09 09:43 pm", "8", 0, null, null, "0", "9597667101", null, "closed", null, "", "", null, "17/09 08:45 pm", 61, "admin.", "", "", null, "vadavalli", "869124026460996", "vadavalli, pn pudur, marudhamalai", "silver", "indica Non AC", "2018-09-17 21:43:42", "17/09 09:44 pm", "later", "17/09 08:45 pm", "admin.", null, null, null, null, "0", "0", "0", "0", null, null, "", "408 nagaraj", "17/09 09:43 pm", "17/09 09:08 pm", "0", null, "cash", null, null], [74381, "savith", "99xxxxxx93", "PVR201872679", "621", "621 mohan", "koundampalayam, coimbatore, tamil nadu, india", "koundampalayam, coimbatore, tamil nadu, india", "indigo AC", "crm", "1540", 4, "17/09 11:50 am", "162406", "162491", "12", "17/09 12:10 pm", "17/09 09:28 pm", "85", 0, null, "karamadai", "0", "9952536693", null, "closed", null, "621id only", "", null, "17/09 11:33 am", 62, "admin1", "", "", "no", "", "911533150418828", "thudiyalur, gn mills, nggo colony, goundampalayam", null, "any vehicle", "2018-09-17 21:28:58", "17/09 09:29 pm", "later", "17/09 11:38 am", "admin1", null, null, null, null, "0", "0", "0", "0", null, null, "", "621 mohan", "17/09 09:28 pm", "17/09 11:40 am", "0", null, "cash", null, null], [74491, "dr usha nandhini", "80xxxxxx33", "PVR201872789", "653", "653 muthu", "saibaba colony coimbatore tamil nadu india", "suguna kalyana mandapam, avinashi rd, kr puram, udayampalayam, coimbatore, tamil nadu 641004, india", "dzire AC", "crm", "170", 4, "17/09 08:30 pm", "177115", "177125", "10", "17/09 08:45 pm", "17/09 09:26 pm", "10", 0, null, null, "0", "8012755333", null, "closed", null, "", "9487962110 alt", null, "17/09 08:15 pm", 62, "admin1", "", "", null, "69, tatabad 1 st sivantha colony", "353241090040513", "saibaba colony, kk pudur, velandipalayam, venkatapuram", "platinum", "indica AC", "2018-09-17 21:26:44", "17/09 09:27 pm", "now", "17/09 08:19 pm", "admin.", null, null, null, null, "0", "0", "0", "0", null, null, "", "653 muthu", "17/09 09:26 pm", "17/09 08:20 pm", "0", null, "cash", null, null], [74495, "bharathi", "98xxxxxx37", "PVR201872793", "625", "625 ramesh", "saibaba colony coimbatore tamil nadu india", "central studio", "dzire AC", "crm", "190", 4, "17/09 08:35 pm", "39216", "39226", "6", "17/09 08:52 pm", "17/09 09:21 pm", "10", 0, null, null, "0", "9840154437", null, "closed", null, "", "pls send pvr on time", null, "17/09 08:25 pm", 62, "admin1", "", "", null, "tamil nadu, agricultural university", "861226031146458", "vadavalli, pn pudur, marudhamalai", "normal", "indica AC", "2018-09-17 21:21:43", "17/09 09:22 pm", "later", "17/09 08:28 pm", "admin.", null, null, null, null, "0", "0", "0", "0", null, null, "", "625 ramesh", "17/09 09:21 pm", "17/09 08:33 pm", "0", null, "cash", null, null], [74480, "narayanan", "97xxxxxx17", "PVR201872778", "639", "639 saravanakumar", "vadavalli", "railway station", "etios AC", "crm", "150", 2, "17/09 09:00 pm", "88891", "88899", "3", "17/09 09:04 pm", "17/09 09:19 pm", "8", 0, null, null, "0", "9791306717", null, "closed", null, "", "indica small pvr", null, "17/09 07:34 pm", 63, "pradeepa", "4222425318", "", null, "85 veeras enclave apt omganesh nagar 5th street vadavalli", "864557031325404", "vadavalli, pn pudur, marudhamalai", "gold", "any vehicle", "2018-09-17 21:19:30", "17/09 09:19 pm", "later", "17/09 08:14 pm", "admin.", null, null, null, null, "0", "0", "0", "0", null, null, "", "639 saravanakumar", "17/09 09:19 pm", "17/09 08:17 pm", "0", null, "cash", null, null], [74439, "dhakshanamoorthy", "99xxxxxx55", "PVR201872737", "835", "835 dhakshanamoorthy", "rs puram", "rs puram", "enjoy AC", "crm", "1200", 4, "17/09 04:15 pm", "10", "74", "0", "17/09 11:08 pm", "17/09 11:09 pm", "64", null, "1200", "periyanaickenpalayam, coimbatore, tamil nadu, india", "0.5", "9994247355", null, "closed", null, "835id only", "", 1, "17/09 04:04 pm", 62, "admin1", "", "", "no", "ganapathy", "357279083157189", "vadavalli, pn pudur, marudhamalai", null, "any vehicle", "2018-09-17 23:09:07", "17/09 11:09 pm", "later", "17/09 04:06 pm", "admin1", "64", "0", null, null, "0", "0", "0", "0", null, null, "", "arumugam ", "17/09 11:09 pm", "17/09 11:08 pm", "0", "cash", null, null, null], [74287, "isabella", "90xxxxxx46", "PVR201872585", "835", "835 dhakshanamoorthy", "agri", "vadavalli", "enjoy AC", "crm", "70", 1, "17/09 03:45 pm", "945", "949", "11", "17/09 03:43 pm", "17/09 11:08 pm", "4", null, "70", null, "8", "9003432546", null, "closed", null, null, "", 446, "17/09 06:00 am", 5, "superadmin", "", "", null, "vmal nagar,vadavalli", "357279083157189", "vadavalli, pn pudur, marudhamalai", "platinum", "indica Non AC", "2018-09-17 23:08:32", "17/09 11:08 pm", "regular", "17/09 03:23 pm", "admin1", "4", "0", null, null, "0", "0", "0", "0", null, null, "", "arumugam ", "17/09 11:08 pm", "17/09 03:29 pm", "0", "cash", "cash", null, null], [74410, "pradeen", "70xxxxxx20", "PVR201872708", "645", "645 saravanan", "saibaba colony coimbatore tamil nadu india", "saibaba colony coimbatore tamil nadu india", "dzire AC", "crm", "1250", 4, "17/09 02:15 pm", "31", "67", "0", "17/09 10:28 pm", "17/09 10:30 pm", "36", null, "1250", "periyanaickenpalayam, coimbatore, tamil nadu, india", null, "7094972020", null, "closed", null, "645id only", "", 2, "17/09 01:43 pm", 62, "admin1", "-", "", "no", "null", "867158031903220", "vadavalli, pn pudur, marudhamalai", "normal", "any vehicle", "2018-09-17 22:30:17", "17/09 10:30 pm", "later", "17/09 01:48 pm", "admin1", "36", "0", null, null, "0", "0", "0", "0", null, null, "", "arumugam ", "17/09 10:30 pm", "17/09 10:28 pm", "0", "cash", null, null, null], [74481, "siddarth", "98xxxxxx22", "PVR201872779", "637", "637 venkatesh", "new thillai nagar, pn pudur, coimbatore, tamil nadu, india", "nava india", "dzire AC", "crm", "190", 2, "17/09 10:00 pm", "35201", "35211", "0", "17/09 10:27 pm", "17/09 10:27 pm", "10", null, "190", null, "41.25", "9894288422", null, "closed", null, "", "", 1, "17/09 07:39 pm", 172, "kamal", "", "", null, "7/10,1st aven main road,new thillai nagar,vadvalli", "359932073559453", "vadavalli, pn pudur, marudhamalai", "silver", "indica Non AC", "2018-09-17 22:27:39", "17/09 10:27 pm", "later", "17/09 09:32 pm", "admin.", "10", "0", null, null, "0", "0", "0", "0", null, null, "", "arumugam ", "17/09 10:27 pm", "17/09 10:27 pm", "0", "cash", null, null, null], [74488, "venkatasamy", "94xxxxxx86", "PVR201872786", "485", "485 sadhasivam", "pn pudur", "railway station", "indica AC", "crm", "178", 2, "17/09 09:50 pm", "88111", "88120", "0", "17/09 10:23 pm", "17/09 10:23 pm", "9", null, "178", null, "23.25", "9442074486", null, "closed", null, "", "indica ok ", 1, "17/09 08:09 pm", 61, "admin.", "", "", null, "ramani sai enclve,pn pudhur", "911436351877430", "vadavalli, pn pudur, marudhamalai", "platinum", "indica Non AC", "2018-09-17 22:23:43", "17/09 10:23 pm", "later", "17/09 09:21 pm", "admin.", "9", "0", null, null, "0", "0", "0", "0", null, null, "", "arumugam ", "17/09 10:23 pm", "17/09 10:23 pm", "0", "cash", null, null, null]];

        $tags = array_map(function ($tag) {
            return array(
                'id'          => ucfirst($tag[0]),
                'name'        => ucfirst($tag[1]),
                'number'      => ucfirst($tag[2]),
                'pnr'         => ucfirst($tag[3]),
                'taxino'      => ucfirst($tag[4]),
                'driver'      => ucfirst($tag[5]),
                'from'        => ucfirst($tag[6]),
                'to'          => ucfirst($tag[7]),
                'model'       => ucfirst($tag[40]),
                'bookingtype' => ucfirst($tag[9]),
                'total'       => ucfirst($tag[10]),
                'bookedby'    => ucfirst($tag[32]),
                'assignedby'  => ucfirst($tag[32]),
                'closedby'    => ucfirst($tag[57]),
                'paymode'     => ucfirst($tag[62])
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }

    function cancelled_booking($data1, $data2)
    {
        $array = [[74285, "dr.sivangyanam", "99xxxxxx62", "PVR201872583", "653", "653 muthu kumar 9789293798", "fun mall", "hope college", "dzire AC", "crm", "0", 1, "17/09 09:35 pm", null, null, null, "", "", null, null, null, null, null, "9944455662", null, "cancelled", null, null, null, null, "17/09 06:00 am", 5, "superadmin", "", "", null, "hopes doctor diabitician in kmch", "353241090040513", "peelamedu, laxmi mills, nava india, avarampalayam", "platinum", "indica Non AC", null, "17/09 09:45 pm", "regular", "17/09 09:23 pm", "admin.", null, null, null, null, "0", "0", "0", "0", null, null, "", null, "", "", "0", null, null, "arumugam", "2018-09-17 21:45:19", "arumugam", "2018-09-17 21:45:19"], [74309, "ramesh", "99xxxxxx78", "PVR201872607", "607", "607 pandiyarajan 9585840075", "edayarpalayam- thadagam road", "avinashlingam clg", "indigo AC", "crm", "0", 1, "17/09 09:40 am", null, null, null, "", "", null, null, null, null, null, "9994129078", null, "cancelled", null, null, "indigo must", null, "17/09 06:00 am", 5, "superadmin", "4222401887", "", null, "marutham apart, srinivasa nagar, edayarpalayam", "864000037625998", "edayarpalayam, tvs nagar, kanuvai", "gold", "indica Non AC", null, "17/09 09:54 am", "regular", "17/09 09:18 am", "admin1", null, null, null, null, "0", "0", "0", "0", null, null, "", null, "", "", "0", null, null, "admin1", "2018-09-17 09:54:14", "admin1", "2018-09-17 09:54:14"], [74325, "mary", "99xxxxxx32", "PVR201872623", "644", "644 thiyagu 8778645599", "lakshmi mills", "lakshmi mills", "etios AC", "crm", "0", 1, "17/09 08:15 am", null, null, null, "", "", null, null, null, null, null, "9944081732", null, "cancelled", null, null, "school trip, pls tc on time", null, "17/09 06:00 am", 5, "superadmin", "", "", "no", "lakshmi mills ", "863882036878517", "peelamedu, laxmi mills, nava india, avarampalayam", "gold", "indica Non AC", null, "17/09 07:58 am", "regular", "17/09 07:53 am", "arumugam", null, null, null, null, "0", "0", "0", "0", null, null, "", null, "", "17/09 07:53 am", "0", null, null, "admin1", "2018-09-17 07:58:31", "admin1", "2018-09-17 07:58:31"], [74325, "mary", "99xxxxxx32", "PVR201872623", "644", "644 thiyagu 8778645599", "lakshmi mills", "lakshmi mills", "etios AC", "crm", "0", 1, "17/09 08:15 am", null, null, null, "", "", null, null, null, null, null, "9944081732", null, "cancelled", null, null, "school trip, pls tc on time", null, "17/09 06:00 am", 5, "superadmin", "", "", "no", "lakshmi mills ", "863882036878517", "peelamedu, laxmi mills, nava india, avarampalayam", "gold", "indica Non AC", null, "17/09 07:58 am", "regular", "17/09 07:53 am", "arumugam", null, null, null, null, "0", "0", "0", "0", null, null, "", null, "", "17/09 07:53 am", "0", null, null, "admin1", "2018-09-17 07:58:31", "arumugam", "2018-09-17 07:51:45"], [74288, "ap ganesan", "96xxxxxx72", "PVR201872586", null, null, "selvapuram", "rs puram", null, "crm", null, 1, "17/09 05:00 pm", null, null, null, "", "", null, null, null, null, null, "9677707072", null, "cancelled", null, null, null, null, "17/09 06:00 am", 5, "superadmin", "", "", "no", "19, chandrasekarapuram selvapurampost cbe chettiveethi, selvapuram.", null, "ukkadam, oppanakkara st, vysyal st, townhall, selvapuram", "platinum", "indica Non AC", null, "", "regular", "", null, null, null, null, null, "0", "0", "0", "0", null, null, "", null, "", "", "0", null, null, "pradeepa", "2018-09-17 08:15:20", "pradeepa", "2018-09-17 08:15:20"]];

        $tags = array_map(function ($tag) {
            return array(
                'id'          => ucfirst($tag[0]),
                'name'        => ucfirst($tag[1]),
                'number'      => ucfirst($tag[2]),
                'pnr'         => ucfirst($tag[3]),
                'taxino'      => ucfirst($tag[4]),
                'driver'      => ucfirst($tag[5]),
                'from'        => ucfirst($tag[6]),
                'to'          => ucfirst($tag[7]),
                'model'       => ucfirst($tag[40]),
                'bookingtype' => ucfirst($tag[9]),
                'total'       => ucfirst($tag[10]),
                'bookedby'    => ucfirst($tag[32]),
                'assignedby'  => ucfirst($tag[32]),
                'closedby'    => ucfirst($tag[57]),
                'paymode'     => ucfirst($tag[62])
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }

    function attendance_report($data1, $data2)
    {
        $array = [["607", null, "607 pandiyarajan", null, null, null, null, null, null, null, 460, "88325.5", "88325.5", "88325.5"], [null, null, null, null, null, null, null, null, null, null, 164, "47350.67", "47350.67", "47350.67"], ["663", null, "663 saran", null, null, null, null, null, null, null, 1381, "372022.25", "372022.25", "372022.25"], [null, null, null, null, null, null, null, null, null, null, 209, "31980.75", "31980.75", "31980.75"], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], [null, null, null, null, null, null, null, null, null, null, 602, "145375.5", "145375.5", "145375.5"], ["485", null, "485 sadhasivam", null, null, null, null, null, null, null, 385, "74378", "74378", "74378"], [null, null, null, null, null, null, null, null, null, null, 82, "20750", "20750", "20750"], ["617", null, "617 mani", null, null, null, null, null, null, null, 968, "230052.25", "230052.25", "230052.25"], [null, null, null, null, null, null, null, null, null, null, 1433, "341193.42", "341193.42", "341193.42"], ["639", null, "639 saravanakumar", null, null, null, null, null, null, null, 1488, "447478.47", "447478.47", "447478.47"], [null, null, null, null, null, null, null, null, null, null, 648, "123114.5", "123114.5", "123114.5"], ["603", null, "603 jai", null, null, null, null, null, null, null, 1073, "243701.33", "243701.33", "243701.33"], [null, null, null, null, null, null, null, null, null, null, 751, "156029.5", "156029.5", "156029.5"], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], [null, null, null, null, null, null, null, null, null, null, 891, "194461.85", "194461.85", "194461.85"], ["403", null, "403 ", null, null, null, null, null, null, null, 1679, "345713", "345713", "345713"], [null, null, null, null, null, null, null, null, null, null, 657, "204384.12", "204384.12", "204384.12"], ["658", null, "688 hari", null, null, null, null, null, null, null, 1220, "394838.73", "394838.73", "394838.73"], [null, null, null, null, null, null, null, null, null, null, 832, "343710.55", "343710.55", "343710.55"], [null, null, null, null, null, null, null, null, null, null, 164, "62297", "62297", "62297"], [null, null, null, null, null, null, null, null, null, null, 121, "35288", "35288", "35288"], ["662", null, "662 rathnasamy", null, null, null, null, null, null, null, 1599, "424180.59", "424180.59", "424180.59"], ["811", null, "811 chandra", null, null, null, null, null, null, null, 431, "185524.5", "185524.5", "185524.5"], [null, null, null, null, null, null, null, null, null, null, 254, "86761.25", "86761.25", "86761.25"], [null, null, null, null, null, null, null, null, null, null, 202, "30919.75", "30919.75", "30919.75"], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], [null, null, null, null, null, null, null, null, null, null, 45, "12359", "12359", "12359"], [null, null, null, null, null, null, null, null, null, null, 318, "94812.5", "94812.5", "94812.5"], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], [null, null, null, null, null, null, null, null, null, null, 389, "180266.92", "180266.92", "180266.92"], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], [null, null, null, null, null, null, null, null, null, null, 13, "1701", "1701", "1701"], [null, null, null, null, null, null, null, null, null, null, 1704, "413045.09", "413045.09", "413045.09"], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], ["442", null, "442 vaigundaraj", null, null, null, null, null, null, null, 1342, "291494.6", "291494.6", "291494.6"], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], ["678", null, "678 guna", null, null, null, null, null, null, null, 583, "181815", "181815", "181815"], [null, null, null, null, null, null, null, null, null, null, 122, "23179.25", "23179.25", "23179.25"], [null, null, null, null, null, null, null, null, null, null, 1018, "279683.75", "279683.75", "279683.75"], ["635", null, "635 amalanathan", null, null, null, null, null, null, null, 780, "255479.58", "255479.58", "255479.58"], ["640", null, "640 ", null, null, null, null, null, null, null, 1188, "297209.59", "297209.59", "297209.59"], [null, null, null, null, null, null, null, null, null, null, 1084, "337820.93", "337820.93", "337820.93"], ["456", null, "456 govindraj", null, null, null, null, null, null, null, 1530, "373467.78", "373467.78", "373467.78"], [null, null, null, null, null, null, null, null, null, null, 202, "32916", "32916", "32916"], ["487", null, "487 saravanan", null, null, null, null, null, null, null, 896, "235188.8", "235188.8", "235188.8"], ["409", null, "409 balamurugan", null, null, null, null, null, null, null, 1220, "292989.95", "292989.95", "292989.95"], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], ["667", null, "667 mukundan", null, null, null, null, null, null, null, 181, "46554.42", "46554.42", "46554.42"], ["437", null, "437 kathiravan", null, null, null, null, null, null, null, 776, "153574.5", "153574.5", "153574.5"], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], ["637", null, "637 venkateshkumar", null, null, null, null, null, null, null, 1718, "431149.5", "431149.5", "431149.5"], ["817", null, "817 bharath", null, null, null, null, null, null, null, 958, "414847.83", "414847.83", "414847.83"], [null, null, null, null, null, null, null, null, null, null, 70, "18694.65", "18694.65", "18694.65"], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], [null, null, null, null, null, null, null, null, null, null, 126, "21230.3", "21230.3", "21230.3"], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], [null, null, null, null, null, null, null, null, null, null, 167, "36967", "36967", "36967"], ["802", null, "802 rajasekar", null, null, null, null, null, null, null, 238, "163947", "163947", "163947"], [null, null, null, null, null, null, null, null, null, null, 13, "2433", "2433", "2433"], [null, null, null, null, null, null, null, null, null, null, 1463, "381790.08", "381790.08", "381790.08"], [null, null, null, null, null, null, null, null, null, null, 341, "233533", "233533", "233533"], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], ["636", null, "636 vijay", null, null, null, null, null, null, null, 304, "65881.42", "65881.42", "65881.42"], [null, null, null, null, null, null, null, null, null, null, 151, "60156", "60156", "60156"], [null, null, null, null, null, null, null, null, null, null, 122, "26367", "26367", "26367"], [null, null, null, null, null, null, null, null, null, null, 203, "57353", "57353", "57353"], [null, null, null, null, null, null, null, null, null, null, 53, "34322.28", "34322.28", "34322.28"], ["499", null, "499 rajesh", null, null, null, null, null, null, null, 63, "11215", "11215", "11215"], [null, null, null, null, null, null, null, null, null, null, 260, "137358", "137358", "137358"], [null, null, null, null, null, null, null, null, null, null, 79, "25037.75", "25037.75", "25037.75"], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], [null, null, null, null, null, null, null, null, null, null, 1412, "292896.67", "292896.67", "292896.67"], [null, null, null, null, null, null, null, null, null, null, 261, "55292.25", "55292.25", "55292.25"], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], ["459", null, "459 rafi", null, null, null, null, null, null, null, 1468, "238256.67", "238256.67", "238256.67"], ["810", null, "810 senthilkumar", null, null, null, null, null, null, null, 495, "193574", "193574", "193574"], [null, null, null, null, null, null, null, null, null, null, 137, "26492", "26492", "26492"], [null, null, null, null, null, null, null, null, null, null, 708, "301940.08", "301940.08", "301940.08"], [null, null, null, null, null, null, null, null, null, null, 154, "24626.45", "24626.45", "24626.45"], [null, null, null, null, null, null, null, null, null, null, 318, "57450.75", "57450.75", "57450.75"], [null, null, null, null, null, null, null, null, null, null, 379, "95727.5", "95727.5", "95727.5"], [null, null, null, null, null, null, null, null, null, null, 187, "30328.25", "30328.25", "30328.25"], [null, null, null, null, null, null, null, null, null, null, 478, "123740.8", "123740.8", "123740.8"], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], [null, null, null, null, null, null, null, null, null, null, 862, "195956.25", "195956.25", "195956.25"], ["633", null, "633 ramu", null, null, null, null, null, null, null, 1430, "424265.67", "424265.67", "424265.67"], [null, null, null, null, null, null, null, null, null, null, 124, "40809.25", "40809.25", "40809.25"], [null, null, null, null, null, null, null, null, null, null, 2, "6302", "6302", "6302"], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], [null, null, null, null, null, null, null, null, null, null, 886, "173491.2", "173491.2", "173491.2"], ["408", null, "408 nagaraj", null, null, null, null, null, null, null, 1922, "465685.5", "465685.5", "465685.5"], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], [null, null, null, null, null, null, null, null, null, null, 49, "13803", "13803", "13803"], [null, null, null, null, null, null, null, null, null, null, 96, "15797", "15797", "15797"], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], ["438", null, "438 ravishankar", null, null, null, null, null, null, null, 1500, "313952.5", "313952.5", "313952.5"], [null, null, null, null, null, null, null, null, null, null, 6, "706", "706", "706"], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], ["685", null, "685 sivakumar", null, null, null, null, null, null, null, 1286, "393186.08", "393186.08", "393186.08"], ["471", null, "471 ravi", null, null, null, null, null, null, null, 1600, "278168.25", "278168.25", "278168.25"], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], [null, null, null, null, null, null, null, null, null, null, 39, "6656.65", "6656.65", "6656.65"], ["645", null, "645 saravanan", null, null, null, null, null, null, null, 1146, "467291", "467291", "467291"], [null, null, null, null, null, null, null, null, null, null, 201, "40329.25", "40329.25", "40329.25"], ["602", null, "602 ravi", null, null, null, null, null, null, null, 1479, "350983.15", "350983.15", "350983.15"], [null, null, null, null, null, null, null, null, null, null, 241, "138693.18", "138693.18", "138693.18"], ["655", null, "655 durai", null, null, null, null, null, null, null, 211, "52979", "52979", "52979"], ["621", null, "621 mohan", null, null, null, null, null, null, null, 1214, "282078.62", "282078.62", "282078.62"], [null, null, null, null, null, null, null, null, null, null, 14, "1856.25", "1856.25", "1856.25"], [null, null, null, null, null, null, null, null, null, null, 188, "37855", "37855", "37855"], ["653", null, "653 muthu", null, null, null, null, null, null, null, 1676, "489914.59", "489914.59", "489914.59"], [null, null, null, null, null, null, null, null, null, null, 1140, "429982.33", "429982.33", "429982.33"], ["902", null, "902 sudhan", null, null, null, null, null, null, null, 22, "140493.75", "140493.75", "140493.75"], [null, null, null, null, null, null, null, null, null, null, 58, "14100", "14100", "14100"], [null, null, null, null, null, null, null, null, null, null, 25, "8897", "8897", "8897"], [null, null, null, null, null, null, null, null, null, null, 11, "150", "150", "150"], [null, null, null, null, null, null, null, null, null, null, 26, "4860", "4860", "4860"], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], [null, null, null, null, null, null, null, null, null, null, 883, "364654.65", "364654.65", "364654.65"], [null, null, null, null, null, null, null, null, null, null, 37, "5332.75", "5332.75", "5332.75"], [null, null, null, null, null, null, null, null, null, null, 99, "28317.41", "28317.41", "28317.41"], [null, null, null, null, null, null, null, null, null, null, 34, "4414", "4414", "4414"], [null, null, null, null, null, null, null, null, null, null, 339, "71302", "71302", "71302"], [null, null, null, null, null, null, null, null, null, null, 713, "217770", "217770", "217770"], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], ["123", null, "pvrbie test", null, null, null, null, null, null, null, 21, "745", "745", "745"], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], [null, null, null, null, null, null, null, null, null, null, 158, "29243.5", "29243.5", "29243.5"], [null, null, null, null, null, null, null, null, null, null, 52, "12390", "12390", "12390"], [null, null, null, null, null, null, null, null, null, null, 712, "132868.35", "132868.35", "132868.35"], ["412", null, "412 sundar", null, null, null, null, null, null, null, 1775, "375118.18", "375118.18", "375118.18"], [null, null, null, null, null, null, null, null, null, null, 0, null, null, null], [null, null, null, null, null, null, null, null, null, null, 141, "29749", "29749", "29749"], ["414", null, "414 raju", null, null, null, null, null, null, null, 2073, "470953.38", "470953.38", "470953.38"], ["815", null, "815 prabhu", null, null, null, null, null, null, null, 552, "239171.83", "239171.83", "239171.83"], [null, null, null, null, null, null, null, null, null, null, 114, "15975.25", "15975.25", "15975.25"], [null, null, null, null, null, null, null, null, null, null, 284, "59045.07", "59045.07", "59045.07"], [null, null, null, null, null, null, null, null, null, null, 77, "13756", "13756", "13756"]];

        $tags = array_map(function ($tag) {
            return array(
                'sno'          => ucfirst($tag[0]),
                'vid'          => ucfirst($tag[0]),
                'paymenttype'  => ucfirst($tag[2]),
                'driver'       => ucfirst($tag[3]),
                'schedule'     => ucfirst($tag[4]),
                'starttime'    => ucfirst($tag[5]),
                'startkm'      => ucfirst($tag[6]),
                'startloc'     => ucfirst($tag[7]),
                'currlocation' => ucfirst($tag[8]),
                'currkm'       => ucfirst($tag[9]),
                'nofotrips'    => ucfirst($tag[10]),
                'coll'         => ucfirst($tag[11]),
                'cccharge'     => ucfirst($tag[12]),
                'ccpending'    => ucfirst($tag[13])
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }

    function customers_report($data1, $data2)
    {
        $array = [["PVR201872580", "2018-09-17 05:50:43", "400", "sivakumar", "vadavalli", "narasi puram", "403"], ["PVR201872586", "2018-09-17 06:00:01", null, "ap ganesan", "selvapuram", "rs puram", null], ["PVR201872588", "2018-09-17 06:00:01", "70", "isabella", "vadavalli", "agri", "437"], ["PVR201872585", "2018-09-17 06:00:01", "70", "isabella", "agri", "vadavalli", "835"], ["PVR201872584", "2018-09-17 06:00:01", "180", "dr. ramasamy", "peelamedu", "k.k pudhur", "678"], ["PVR201872587", "2018-09-17 06:00:01", "77", "dr.sivangyanam", "kmch", "hope college", "407"], ["PVR201872583", "2018-09-17 06:00:01", "0", "dr.sivangyanam", "fun mall", "hope college", "653"], ["PVR201872582", "2018-09-17 06:00:01", "50", "dr.sivangyanam", "hope college", "fun mall", "655"], ["PVR201872581", "2018-09-17 06:00:01", null, "vishnu", "gp", "pn palayam", null], ["PVR201872589", "2018-09-17 06:00:01", "130", "chitra", "oppanakara street", "kannappan nagar", "658"], ["PVR201872599", "2018-09-17 06:00:02", "50", "divya", "sungam", "race course", "625"], ["PVR201872593", "2018-09-17 06:00:02", "80", "saraswathi", "thaneer pandhal", "kalapatty", "635"], ["PVR201872594", "2018-09-17 06:00:02", "94", "dr. nirmala", "pn palayam", "womens center", "408"], ["PVR201872598", "2018-09-17 06:00:02", "75", "suguna", "avarampalayam", "annasilai", "403"], ["PVR201872606", "2018-09-17 06:00:02", "145", "preethi", "race course", "k.k pudhur", "815"], ["PVR201872601", "2018-09-17 06:00:02", "143", "preethi", "k k pudur, coimbatore, tamil nadu, india", "race course", "408"], ["PVR201872617", "2018-09-17 06:00:02", null, "mary", "lakshmi mills", "lakshmi mills", null], ["PVR201872597", "2018-09-17 06:00:02", "87", "dr.sivangyanam", "hope college", "kmch", "645"], ["PVR201872612", "2018-09-17 06:00:02", "80", "isabella", "vadavalli", "agri", "653"], ["PVR201872613", "2018-09-17 06:00:02", "235", "rama subramaniam", "gknm", "vadavalli", "408"], ["PVR201872624", "2018-09-17 06:00:02", "138", "kanagaraj", "poomarket", "vadavalli", "607"], ["PVR201872619", "2018-09-17 06:00:02", null, "rohini", "peelamedu", "peelamedu", null], ["PVR201872615", "2018-09-17 06:00:02", "50", "priya", "saibaba koil", "saibaba colony, coimbatore, tamil nadu, india", "403"], ["PVR201872622", "2018-09-17 06:00:02", "60", "devaraj ", "race course", "kidney center", "607"], ["PVR201872595", "2018-09-17 06:00:02", "130", "chitra", "kannappan nagar, sanganoor,coimbatore", "oppanakara street", "835"], ["PVR201872621", "2018-09-17 06:00:02", "0", "devaraj ", "kidney center", "race course", "655"], ["PVR201872603", "2018-09-17 06:00:02", "50", "umahari", "saibaba colony", "saibaba koil", "644"], ["PVR201872604", "2018-09-17 06:00:02", "143", "kanagaraj", "vadavalli", "poomarket", "456"], ["PVR201872592", "2018-09-17 06:00:02", "70", "isabella", "agri", "vadavalli", "653"], ["PVR201872611", "2018-09-17 06:00:02", "160", "parveen", "sowripalayam udayampalayam", "oppanakara street", "414"], ["PVR201872620", "2018-09-17 06:00:02", "116", "meenachi", "gv residency", "gv residency", "639"], ["PVR201872602", "2018-09-17 06:00:02", "115", "chokalingam", "sihs colony", "sihs colony", "414"], ["PVR201872596", "2018-09-17 06:00:02", "50", "divya", "race course", "sungam", "802"], ["PVR201872600", "2018-09-17 06:00:02", "85", "umahari", "vadavalli", "saibaba colony", "607"], ["PVR201872590", "2018-09-17 06:00:02", "130", "mary", "vadavalli", "saibaba colony", "636"], ["PVR201872614", "2018-09-17 06:00:02", "210", "radha", "navavoor pirivu", "gh", "636"], ["PVR201872610", "2018-09-17 06:00:02", "110", "umahari", "saibaba colony", "vadavalli", "456"], ["PVR201872605", "2018-09-17 06:00:02", "250", "rama subramaniam", "vadavalli", "gknm", "635"], ["PVR201872618", "2018-09-17 06:00:02", "170", "dr. ramasamy", "k.k pudhur", "peelamedu", "678"], ["PVR201872591", "2018-09-17 06:00:02", "120", "anu radha", "pn pudur", "womens center", "471"], ["PVR201872616", "2018-09-17 06:00:02", null, "easwara moorthy", "gold wins", "100 feet road", null], ["PVR201872608", "2018-09-17 06:00:02", "110", "dr. nirmala", "womens center", "pn palayam", "655"], ["PVR201872623", "2018-09-17 06:00:02", "0", "mary", "lakshmi mills", "lakshmi mills", "644"], ["PVR201872607", "2018-09-17 06:00:02", "0", "ramesh", "edayarpalayam- thadagam road", "avinashlingam clg", "607"], ["PVR201872609", "2018-09-17 06:00:02", "500", "chokalingam", "sihs colony", "sihs colony", "636"], ["PVR201872625", "2018-09-17 06:33:11", "115", "dr.venkatakrishnan", "pn pudur", "power house", "685"], ["PVR201872626", "2018-09-17 06:39:25", "227", "venkateshvaran", "vadavalli", "lakshmi mills", "437"], ["PVR201872627", "2018-09-17 06:41:07", "200", "venkatraman", "nana nani phase 4 kasturinayakenpalayam", "ukkadam", "442"], ["PVR201872628", "2018-09-17 06:50:16", "220", "arunachalam", "vadavalli", "ganapathy", "621"], ["PVR201872629", "2018-09-17 07:17:32", "550", "kannammal", "gv residency", "periyanaicken palayam", "485"], ["PVR201872630", "2018-09-17 07:19:09", "49", "kalaivani", "veerakeralam", "vadavalli", "607"], ["PVR201872631", "2018-09-17 07:20:21", "85", "lalitha radha krshinan", "vadavalli", "kng pudur", "655"], ["PVR201872632", "2018-09-17 07:24:40", "130", "srinivasan", "veerakeralam", "kng pudur", "663"], ["PVR201872633", "2018-09-17 07:29:05", "189", "manokaran", "vadavalli", "ramakrishna hospital", "662"], ["PVR201872634", "2018-09-17 07:34:42", "3400", "vinoth", "pn pudur", "madurai, tamil nadu, india", "409"], ["PVR201872635", "2018-09-17 07:40:31", "90", "vanitha", "nallam palayam", "ganapathy", "811"], ["PVR201872636", "2018-09-17 07:52:33", "0", "ganga", "nana nani phase 2 vadavalli", "mullai nagar", "655"], ["PVR201872637", "2018-09-17 08:06:35", "70", "usha", "kasthurinaickan palayam", "vadavalli", "607"], ["PVR201872638", "2018-09-17 08:10:19", "1500", "sunil", "saravanampatti coimbatore tamil nadu india", "saravanampatti coimbatore tamil nadu india", "602"], ["PVR201872639", "2018-09-17 08:10:23", "180", "krishna kumari", "tvs nagar", "ramakrishna hospital", "663"], ["PVR201872640", "2018-09-17 08:13:36", "200", "madhu", "vadavalli", "gknm", "655"], ["PVR201872641", "2018-09-17 08:16:11", "95", "ap ganesan", "selvapuram", "kg", "815"], ["PVR201872642", "2018-09-17 08:17:05", "168", "nalini", "vadavalli", "saibaba koil", "456"], ["PVR201872643", "2018-09-17 08:23:58", "190", "bharathi", "central studio", "saibaba colony", "644"], ["PVR201872644", "2018-09-17 08:27:47", "112", "anu", "edayarpalayam- thadagam road", "tatabad", "408"], ["PVR201872645", "2018-09-17 08:27:56", "160", "dr.varma", "vadavalli", "town hall", "802"], ["PVR201872646", "2018-09-17 08:34:58", "170", "rajagopal", "vadavalli", "vadakovai", "658"], ["PVR201872647", "2018-09-17 08:40:18", "130", "thiyagarajan", "peelamedu", "kalapatty nehru nagar", "678"], ["PVR201872648", "2018-09-17 08:42:21", "260", "ranganathan", "somayampalayam", "ramanathapuram", "471"], ["PVR201872649", "2018-09-17 08:56:40", "100", "sridaran", "vadavalli, coimbatore, tamil nadu, india", "edayarpalayam rd, edayarpalayam, tamil nadu 641016, india", "456"], ["PVR201872650", "2018-09-17 09:00:29", "750", "trupathy", "vadavalli, coimbatore, tamil nadu, india", "vadavalli, coimbatore, tamil nadu, india", "442"], ["PVR201872651", "2018-09-17 09:06:13", "100", "manonmani appu", "rs puram", "vadavalli, coimbatore, tamil nadu, india", "636"], ["PVR201872652", "2018-09-17 09:06:17", "135", "leela iyyer", "gem nirmalayam, ganapathypudur, coimbatore, tamil nadu 641006, india", "gem nirmalayam, ganapathypudur, coimbatore, tamil nadu 641006, india", "621"], ["PVR201872653", "2018-09-17 09:10:12", "200", "patapi raman", "veerakeralam", "veerakeralam", "607"], ["PVR201872654", "2018-09-17 09:12:31", "465", "kalaivani", "veerakeralam", "veerakeralam", "662"], ["PVR201872655", "2018-09-17 09:13:57", "120", "rajagopal", "mullai nagar", "saibaba colony", "658"], ["PVR201872656", "2018-09-17 09:26:54", "85", "krishnan", "gujan,s paripalana, apparment vadavalli", "vadavalli", "607"], ["PVR201872657", "2018-09-17 09:32:16", "100", "manonmani appu", "rs puram", "mullai nagar", "655"], ["PVR201872658", "2018-09-17 09:42:58", "110", "rohini", "peelamedu", "peelamedu", "645"], ["PVR201872659", "2018-09-17 09:43:16", "290", "narayanasamy", "somayampalayam", "kovai pudur", "655"], ["PVR201872660", "2018-09-17 09:44:08", "320", "dr. mariam", "new thillai nagar, pn pudur, coimbatore, tamil nadu, india", "airport", "602"], ["PVR201872661", "2018-09-17 09:45:02", "1600", "risik", "saibaba colony", "saibaba colony", "663"], ["PVR201872662", "2018-09-17 09:47:32", "205", "muthusamy", "peelamedu", "mullai nagar", "635"], ["PVR201872663", "2018-09-17 10:05:03", "55", "ganga", "nana nani phase 2 vadavalli", "mullai nagar", "655"], ["PVR201872664", "2018-09-17 10:06:24", "240", "nithya lakshmi", "race course", "saravanampatti", "625"], ["PVR201872665", "2018-09-17 10:17:20", "85", "rithish", "avarampalayam", "rs puram", "653"], ["PVR201872666", "2018-09-17 10:19:28", "145", "rajagopal", "vadakovai", "vadavalli", "403"], ["PVR201872667", "2018-09-17 10:21:46", "369", "udayakumar ", "thondamuthur rd, vadavalli, coimbatore, tamil nadu, india", "thondamuthur rd, vadavalli, coimbatore, tamil nadu, india", "678"], ["PVR201872668", "2018-09-17 10:41:37", "140", "rama", "avarampalayam", "town hall", "811"], ["PVR201872669", "2018-09-17 10:42:04", "245", "jayanthi", "vadavalli", "psg hospital", "636"], ["PVR201872670", "2018-09-17 10:46:18", "120", "rama", "vadavalli", "rs puram", "456"], ["PVR201872671", "2018-09-17 10:52:23", "120", "usha", "vadavalli", "saibaba colony", "403"], ["PVR201872672", "2018-09-17 10:54:40", "290", "nantha kumar", "vadavalli", "vadavalli", "644"], ["PVR201872673", "2018-09-17 11:01:24", "550", "k.l bhaskaran  ", "annasilai", "annasilai", "811"], ["PVR201872674", "2018-09-17 11:02:54", "1210", "mani", "airport", "pollachi", "617"], ["PVR201872675", "2018-09-17 11:09:46", "300", "indian bank", "town hall", "town hall", "835"], ["PVR201872676", "2018-09-17 11:23:19", "430", "vidhya", "vadavalli", "vadavalli", "414"], ["PVR201872677", "2018-09-17 11:25:23", "110", "dr usha nandhini", "gn mills", "saibaba colony", "485"], ["PVR201872678", "2018-09-17 11:32:34", "110", "sivakumar", "saibaba colony", "railway station", "437"], ["PVR201872679", "2018-09-17 11:33:29", "1540", "savith", "koundampalayam, coimbatore, tamil nadu, india", "koundampalayam, coimbatore, tamil nadu, india", "621"]];
        $tags = array_map(function ($tag) {
            return array(
                'pnr'    => ucfirst($tag[0]),
                'name'   => ucfirst($tag[3]),
                'vid'    => ucfirst($tag[2]),
                'from'   => ucfirst($tag[4]),
                'to'     => ucfirst($tag[5]),
                'date'   => ucfirst($tag[1]),
                'amount' => ucfirst($tag[2])
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }

    function vehicle_summary($data1, $data2)
    {
        $array = [[192019, "Driver Call"], [52, "Breakdown"], [41609, "Enquiry"], [732, "Feedbacks"], [120965, "Unable to Book"], [1060089, "Booking"], [99858, "Followup"], [207373, "Cancellation"]];
        $tags = array_map(function ($tag) {
            return array(
                'count' => ucfirst($tag[0]),
                'name'  => ucfirst($tag[1])
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }

    function payment_list($data1, $data2)
    {
        $array = [[3931, "SCC0003883", "412", "412 Sundar", "-94.65", "-30.21", "86", "-116.21", "08/2018", "20/09/2018", "Indica AC", null, "7868070703", "412 Sundar 7868070703", "credit", "Admin."], [3932, "SCC0003884", "447", "447 Kalimuthu", "159.6", "372.12", "50", "322.12", "08/2018", "20/09/2018", "Indica AC", null, "9940712957", "447 Kalimuthu 9940712957", "credit", "Admin."], [3933, "SCC0003885", "685", "685 Sivakumar", "-1091.11", "-565.84", "80", "-645.84", "08/2018", "20/09/2018", "Etios AC", null, "9786064991", "685 Sivakumar 9786064991", "credit", "Admin."], [3934, "SCC0003886", "653", "653 Muthu", "-133.13", "451.87", "185", "266.87", "08/2018", "20/09/2018", "Dzire AC", null, "9789293798", "653 Muthu Kumar 9789293798", "credit", "Admin."], [3935, "SCC0003887", "653", "653 Muthu", "266.87", "266.87", "190", "76.87", "08/2018", "20/09/2018", "Dzire AC", null, "9789293798", "653 Muthu Kumar 9789293798", "credit", "Admin."], [3936, "SCC0003888", "625", "625 Ramesh", "429.33", "495.81", "200", "295.81", "08/2018", "20/09/2018", "Dzire AC", null, "8056365129", "625 Ramesh 8056365129", "credit", "Admin."], [3937, "SCC0003889", "617", "617 Mani", "2766.45", "2766.45", "148", "2618.45", "08/2018", "20/09/2018", "INDIGO AC", null, "8220110069", "617 Mani 8220110069", "credit", "Admin."], [3938, "SCC0003890", "678", "678 Owner", "-162", "594.48", "148", "446.48", "08/2018", "20/09/2018", "Dzire AC", null, "9003889285", "678 Guna 7708777347", "credit", "Admin."], [3939, "SCC0003891", "442", "442 Vaigundaraj", "628.86", "761.46", "96", "665.46", "08/2018", "20/09/2018", "Indica AC", null, "9384157208", "442 Vaigundaraj 9384157208", "credit", "Admin."], [3940, "SCC0003892", "438", "438 Ravishankar", "176.44", "362.44", "210", "152.44", "08/2018", "20/09/2018", "Indica AC", null, "9894981811", "438 Ravishankar 9894981811", "credit", "Admin."], [3941, "SCC0003893", "603", "603 Jai", "194.56", "763.12", "500", "263.12", "08/2018", "20/09/2018", "Dzire AC", null, "9566441575", "603 Jai ganesh 9566441575", "cash", "Admin."], [3942, "SCC0003894", "442", "442 Vaigundaraj", "665.46", "747.06", "200", "547.06", "08/2018", "20/09/2018", "Indica AC", null, "9384157208", "442 Vaigundaraj 9384157208", "cash", "Admin."]];

        $tags = array_map(function ($tag) {
            return array(
                'uid'      => ucfirst($tag[1]),
                'vid'      => ucfirst($tag[2]),
                'owner'    => ucfirst($tag[3]),
                'prev'     => ucfirst($tag[4]),
                'tobepaid' => ucfirst($tag[5]),
                'received' => ucfirst($tag[6]),
                'bal'      => ucfirst($tag[7]),
                'recdate'  => ucfirst($tag[9]),
                'driver'   => ucfirst($tag[3]),
                'modal'    => ucfirst($tag[14]),
                'recby'    => ucfirst($tag[15])
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }

    function pending_payment($data1, $data2)
    {
        $array = [[0, "498", "0.13"], [1, "424", "-411"], [2, "493", 0], [3, "429", 0], [4, "455bb", "222.75"], [5, "495", 0], [6, "419", 0], [7, "434", 0], [8, "819-", "2299.64"], [9, "404", 0], [10, "TEST01", 0], [11, "819", 0], [12, "604", 0], [13, "501", 0], [14, "123", "89.4"], [15, "650", 0], [16, "813aa", "-1"], [17, "607", "494.62"], [18, "632", "1526.47"], [19, "00635", "448.2"], [20, "00667", "2412.68"], [21, "40", "0.48"], [22, "805", 0], [23, ".811", 0], [24, "828", 0], [25, "484", "1469.21"], [26, "425", "84.72"], [27, "804", "812.67"], [28, "667", "119.53"], [29, "467", 0], [30, "00631", "1122.12"], [31, "492", "980.6"], [32, "471", "1659.51"], [33, "494", "-415"], [34, "902", "13923.97"], [35, "601", 0], [36, "833", "2116.36"], [37, "445", "-1"], [38, "624", "1165.04"], [39, "603", "275.72"], [40, "679", "202.8"], [41, "415.", 0], [42, "499inAC", "2477.19"], [43, "903", "744"], [44, "333", 0], [45, "811", "1542.56"], [46, "663", "-2609.13"], [47, "699", "1181.76"], [48, "630", "1212"], [49, "626", 0], [50, "608", "-49.89"], [51, "459", "2749.41"], [52, "438", "-14.6"], [53, "824", "3906.2"], [54, "636", "-639.15"], [55, "453", "1361.74"], [56, "690", "1.72"], [57, "642", "4.12"], [58, "658", "557.45"], [59, "652", "3.64"], [60, "633", "211.45"], [61, "631", "291.96"], [62, "816", "3511.04"], [63, "678", "633.92"], [64, "657", "-494.43"], [65, "602", "-507.83"], [66, "616", "280.64"], [67, "618", "1466.22"], [68, "822", "-0.16"], [69, "627", "589.04"], [70, "427", "3189.44"], [71, "688", "283.24"], [72, "478", "88.04"], [73, "698", "2667.44"], [74, "835", "229.44"], [75, "615", "1378.11"], [76, "671", "4.83"], [77, "423", "853.03"], [78, "409", "-405.61"], [79, "420", "940.4"], [80, "622", "2341.04"], [81, "815", "143.22"], [82, "655", "3960.76"], [83, "448", "752.92"], [84, "437", "1466.15"], [85, "642..", "324.17"], [86, "201", "18"], [87, "487", "1767.8"], [88, "499", "116.8"], [89, "813", "132.36"], [90, "637", "903.18"], [91, "417", "1692.69"], [92, "412", "27.79"], [93, "646", "577.31"], [94, "415", "8944.35"], [95, "447", "436.72"], [96, "653", "200.47"], [97, "635", "-973.01"], [98, "801", "2122.96"], [99, "435", "-1.48"], [100, "644", "210.96"], [101, "625", "574.69"], [102, "403", "630.96"], [103, "7", "161.48"], [104, "689", "449.56"], [105, "623", "1279.64"], [106, "441", "1552.72"], [107, "820", "385"], [108, "465", "511.52"], [109, "426", "4899.84"], [110, "444", "1237.54"], [111, "407", "633.93"], [112, "802", "1773.84"], [113, "456", "-101.09"], [114, "817", "-117.26"], [115, "455", "926.51"], [116, "685", "-546.48"], [117, "645", "611.6"], [118, "655", "-990.44"], [119, "485", "998.6"], [120, "801 In-Active", "1848.32"], [121, "639", "-322.04"], [122, "442", "559.06"], [123, "408", "-712.72"], [124, "414", "-547.96"], [125, "803", "8153.09"], [126, "662", "470.24"], [127, "621", "-892.95"], [128, "496", "1602.84"], [129, "807", "4508.9"], [130, "617", "2618.45"], [131, "640", "-186.84"], [132, "810", "706.88"]];
        $tags = array_map(function ($tag) {
            return array(
                'vid' => ucfirst($tag[1]),
                'cc'  => ucfirst($tag[2])
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }

    function unlock($data1, $data2)
    {
        $array = [[1, "201", "18", 64], [2, "407", "1834", 68], [3, "426", "4925", 76], [4, "448", "753", 196], [5, "802", "1774", 197], [6, "835", "230", 136]];
        $tags = array_map(function ($tag) {
            return array(
                'vid' => ucfirst($tag[1]),
                'cc'  => ucfirst($tag[2])
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }

    function lock($data1, $data2)
    {
        $array = [[1, "00631", "1123", 106], [2, "00635", "449", 170], [3, "00667", "2413", 121], [4, "123", "90", 198], [5, "40", "1", 66], [6, "403", "520", 174], [7, "415", "8945", 73], [8, "415.", "799", 146], [9, "417", "1693", 171], [10, "420", "941", 141], [11, "423", "854", 177]];
        $tags = array_map(function ($tag) {
            return array(
                'vid' => ucfirst($tag[1]),
                'cc'  => ucfirst($tag[2])
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }

    function owner($data1, $data2)
    {
        $array = [[121, "403 Stephan", "403", "99XXXXXX14", "", "27 Anna nager 5 th st vadavalli", "Active"], [407, "407 Rajasekaran", "407", "98XXXXXX22", "", "892, Kannadhasan street, gandhi nagar, edayarpalayam, cbe-641025", "Active"], [102, "408 Dilsha", "408 owner", "94XXXXXX78", "", "193 prs Quatres Pn palayam", "Active"], [409, "409 Balamurugan", "409", "94XXXXXX12", "", "59c, Gopal Layout, Ponnaiya Raja Puram, Ganhdipark cbe", "Active"], [412, "412 Sundar", "412", "78XXXXXX03", "", "28,ganapathy devar colony,ramanathapura, cbe", "Active"], [414, "414 Raju", "414", "77XXXXXX42", "", "varatharajapuram", "Active"], [71, "415 Thamaraikani", "415..", "89XXXXXX00", "", "52 1 b kalaingar nager Irugur", "Active"], [117, "417 Boobalan", "417", "83XXXXXX19", "", "42 Zalikolli St bharathiyarpuram  thenamanallur thomdamuttur post", "Active"], [53, "420 Alex", "420", "72XXXXXX04", "", "46 nd street manikavasakar nager kaanusamy road                   kndampalayam ", "Active"], [124, "423 Munusamy", "423", "74XXXXXX77", "", "34 muniappan kovil st lawly rd cbe -3", "Active"], [424, "424 Suresh", "424", "88XXXXXX55", "", "81,vinayakar temple st,udayampalayam,coimbatore-28", "Active"], [146, "425 Krishnaprasath", "425", "96XXXXXX11", "", "F102 Kpk nager Smueka eagles app veriamapalayam rd kalapati", "Active"], [105, "426 Suresh", "426 owner", "90XXXXXX19", "", "52, dj nagar, peelamedu cbe-4", "Active"], [427, "427 Jaya", "427", "90XXXXXX60", "", "-541, periyar nagar, peelamedu, cbe", "Active"], [435, "435 Siva", "435", "75XXXXXX00", "", "907 Annanagar Housing Unit Veerakeralam", "Active"], [85, "437 Kathiravan", "437", "86XXXXXX56", "", "124 amma nager kuttianila thottam mAChamapalayam sundarapuram cbe : 641024", "Active"], [438, "438 Ravishankar", "438", "98XXXXXX11", "ravirani211@yahoo.co.in", "411, super garden extension 2, vadavalli", "In-Active"], [72, "441 Marimuthu", "441", "74XXXXXX62", "", "23, moover nagar, kavundampalayam, cbe-640030", "In-Active"]];

        $tags = array_map(function ($tag) {
            return array(
                'name'     => ucfirst($tag[1]),
                'username' => ucfirst($tag[2]),
                'mobile'   => ucfirst($tag[3]),
                'address'  => ucfirst($tag[5]),
                'status'   => ucfirst($tag[6]),
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }

    function driver($data1, $data2)
    {
        $array = [[121, "403 Stephan", "403", "99XXXXXX14", "", "27 Anna nager 5 th st vadavalli", "Active", "8677670333*************2"], [407, "407 Rajasekaran", "407", "98XXXXXX22", "", "89/2, Kannadhasan street, gandhi nagar, edayarpalayam, cbe-641025", "Active", "8652300275*************1"], [408, "408 Nagaraj", "408", "90XXXXXX64", "", "KRS Residency, kulathuplayam, thondamuthur post, cbe", "Active", "8691240264*************6"], [409, "409 Balamurugan", "409", "94XXXXXX12", "", "59c, Gopal Layout, Ponnaiya Raja Puram, Ganhdipark cbe", "Active", "8697280207*************5"], [412, "412 Sundar", "412", "78XXXXXX03", "", "28,ganapathy devar colony,ramanathapura, cbe", "Active", "3560420819*************0"], [414, "414 Raju", "414", "77XXXXXX42", "", "varatharajapuram", "Active", "3571510870*************8"], [97, "415 Thamaraikani", "415", "89XXXXXX78", "", "1 b kalaingar nager Irugur", "Active", "3590270862*************1"], [71, "415 Thamaraikani", "415..", "89XXXXXX00", "", "52 1 b kalaingar nager Irugur", "Active", "3590270862***********8"], [117, "417 Boobalan", "417", "83XXXXXX19", "", "42 Zalikolli St bharathiyarpuram thenamanallur thomdamuttur post", "Active", "3581880770*************0"], [53, "420 Alex", "420", "72XXXXXX04", "", "46 nd street manikavasakar nager kaanusamy road kndampalayam ", "Active", "3533220669*************7"], [124, "423 Munusamy", "423", "74XXXXXX77", "", "34 muniappan kovil st lawly rd cbe -3", "Active", "3552610748*************6"], [424, "424 Suresh", "424", "88XXXXXX55", "", "81,vinayakar temple st,udayampalayam,coimbatore-28", "Active", "null"], [147, "425 Krishnaprasath", "425", "96XXXXXX11", "", "F 102 Sumatha eagles nest App Veeraimapalayam rd Sitra", "Active", "3554060916*************9"], [426, "426 Rajesh", "426", "95XXXXXX13", "", "319A, Sriram nagar, 4th street, gandhi maa nagar, peelamedu, cbe-641004", "Active", "8629600339*************0"], [427, "427 Jaya", "427", "90XXXXXX60", "", "-5/41, periyar nagar, peelamedu, cbe", "Active", "8636610339*************3"], [435, "435 Siva", "435", "75XXXXXX00", "", "907 Annanagar Housing Unit Veerakeralam", "Active", "8681430293*************0"], [85, "437 Kathiravan", "437", "86XXXXXX56", "", "124 amma nager kuttianila thottam mAChamapalayam sundarapuram cbe : 641024", "Active", "8648500359*************9"], [438, "438 Ravishankar", "438", "98XXXXXX11", "ravirani211@yahoo.co.in", "4/11, super garden extension 2, vadavalli", "Active", "3559830567*************8"], [72, "441 Marimuthu", "441", "74XXXXXX62", "", "2/3, moover nagar, kavundampalayam, cbe-640030", "in-Active", "null"]];

        $tags = array_map(function ($tag) {
            return array(
                'name'     => ucfirst($tag[1]),
                'username' => ucfirst($tag[2]),
                'mobile'   => ucfirst($tag[3]),
                'address'  => trim(substr(ucfirst($tag[5]), 0, 30)) . '...',
                'imei'     => ucfirst($tag[7]),
                'status'   => ucfirst($tag[6])
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }

    function tariff($data1, $data2)
    {
        $array = [["hatch bACk", 8, "One - One", "2", "50", "14", "25", "Active"], ["hatchbACk Non AC", 11, "One - One", "4", "49", "11", "15", "Active"], ["mini", 21, "One - One", "2", "49", "15", "25", "Active"], ["mini AC", 24, "One - One", "2", "49", "16", "25", "Active"], ["mini Non AC", 23, "One - One", "2", "49", "14", "25", "Active"], ["sedan", 22, "One - One", "2", "49", "16", "25", "Active"], ["sedan AC", 26, "One - One", "2", "49", "17", "25", "Active"], ["sedan Non AC", 25, "One - One", "2", "49", "15", "25", "Active"], ["suv", 15, "One - One", "4", "49", "11", "15", "Active"], ["suv AC", 28, "One - One", "4", "100", "17", "25", "Active"], ["suv Non AC", 27, "One - One", "4", "100", "16", "25", "Active"], ["trail", 20, "One - One", "1", "12", "25", "2", "Active"]];

        $tags = array_map(function ($tag) {
            return array(
                'cat'    => ucfirst($tag[0]),
                'tt'     => ucfirst($tag[2]),
                'minkm'  => ucfirst($tag[3]),
                'minc'   => ucfirst($tag[4]),
                'exkm'   => ucfirst($tag[5]),
                'nc'     => ucfirst($tag[6]),
                'status' => ucfirst($tag[7])
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }

    function dnd_list($data1, $data2)
    {
        $array = [[2130, "offline", "01:45 AM", "09:45 AM", "06-05-2017", "no", "no", null, "close"], [2659, "offline", "06:33 PM", "09:53 AM", "07-05-2017", "no", "no", null, "close"], [1283, "offline", "11:12 AM", "06:56 PM", "01-05-2017", "no", "no", null, "close"], [1953, "schedule", "12:00 AM", "10:10 AM", "05-05-2017", "no", "yes", "Scheduled when login", "close"], [19209, "offline", "09:20 PM", "10:21 AM", "22-06-2017", "no", "no", null, "close"], [7817, "offline", "08:08 PM", "04:45 PM", "26-05-2017", "no", "no", null, "close"], [8165, "offline", "01:49 AM", "07:35 AM", "28-05-2017", "no", "no", null, "close"], [1135, "offline", "12:06 AM", "09:01 AM", "01-05-2017", "no", "no", null, "close"], [1625, "offline", "08:30 AM", "09:40 AM", "02-05-2017", "no", "no", null, "close"], [368, "schedule", "12:00 AM", "10:30 AM", "05-04-2017", "no", "yes", "Scheduled when login", "close"], [396, "offline", "09:09 PM", "09:34 AM", "05-04-2017", "no", "no", null, "close"], [279, "schedule", "09:35 AM", "10:05 AM", "03-04-2017", "no", "yes", "Scheduled when login", "close"], [455, "schedule", "12:00 AM", "10:55 AM", "07-04-2017", "no", "yes", "Scheduled when login", "close"], [603, "schedule", "09:30 AM", "09:50 AM", "19-04-2017", "no", "yes", "Scheduled when login", "close"], [319, "schedule", "12:00 AM", "10:25 AM", "04-04-2017", "no", "yes", "Scheduled when login", "close"], [538, "schedule", "03:15 PM", "04:05 PM", "11-04-2017", "no", "yes", "", "close"], [13, "offline", "01:17 AM", "09:41 AM", "01-04-2017", "no", "no", null, "close"], [565, "schedule", "09:35 AM", "10:10 AM", "13-04-2017", "no", "yes", "OWN", "close"], [2922, "offline", "07:40 PM", "04:06 PM", "08-05-2017", "no", "no", null, "close"], [2693, "offline", "12:03 AM", "09:18 AM", "08-05-2017", "no", "no", null, "close"]];

        $tags = array_map(function ($tag) {
            return array(
                'vid'     => ucfirst($tag[0]),
                'dndtype' => ucfirst($tag[1]),
                'ft'      => ucfirst($tag[2]),
                'tt'      => ucfirst($tag[3]),
                'date'    => ucfirst($tag[4]),
                'per'     => ucfirst($tag[6]),
                'cmt'     => ucfirst($tag[7])
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }

    function cancelled_trips($data1, $data2)
    {
        $array = [[9913, "sundharam", "98xxxxxx18", "PVR201874671", "koundampalayam", "gandhipuram", null, "others", "vna", null, null, "open", "indica Non AC", "crm", 2, "27/09/2018 05:30 am", "19, nk nagar, pnt cly koundampalayam", "9840899118", "27/09/2018 05:04 am", 49532, 76373], [9912, "rb devaraj ", "89xxxxxx45", "PVR201874521", "kidney center", "rACe course", "409", "others", "vna", "409 balamurugan 9940775294", null, "open", "indica Non AC", "crm", 1, "26/09/2018 08:40 pm", "airforce quaters athipalaya priviu ", "8903254945", "26/09/2018 09:12 pm", 70871, 76223], [9911, "praveenkumar", "99xxxxxx34", "PVR201874682", "olambus", "sowripalyam", "412", "others", "cmr went own veh", "412 sundar 7868070703", null, "open", "indica Non AC", "crm", 2, "26/09/2018 08:14 pm", "sowripalayam", "9944032634", "26/09/2018 08:39 pm", 91768, 76384], [9910, "rb divya", "95xxxxxx98", "PVR201874503", "rACe course", "sungam", "409", "customer program change", "cumr pc", "409 balamurugan 9940775294", null, "open", "indica Non AC", "crm", 1, "26/09/2018 07:30 pm", "sungam, sinthamani,", "9500505898", "26/09/2018 07:07 pm", 85923, 76205], [9909, "siva pragasam", "94xxxxxx20", "PVR201874642", "gknm", "edayarpalayam- thadagam road", "635", "others", "own trip cancel", "635 amalanathan 8248375935", null, "open", "indica Non AC", "crm", 2, "26/09/2018 05:00 pm", "edayarpalayam", "9442287720", "26/09/2018 04:50 pm", 88505, 76344], [9907, "rajan iyyer ", "99xxxxxx53", "PVR201874616", "brindavan senior citizen india", "vadavalli", null, "customer cancellation", "trip chngd u/d", null, null, "open", "indica AC", "crm", 2, "26/09/2018 05:00 pm", "bindhavan hill view lakshmi nager thondamuthur rd vadavalli", "9986130953", "26/09/2018 03:06 pm", 69303, 76318], [9906, "rb rohini", "75xxxxxx32", "PVR201874520", "peelamedu", "peelamedu", null, "customer program change", "school leave", null, null, "open", "indica AC", "crm", 1, "26/09/2018 02:40 pm", "a 309 sri ram app , avarampalayam rd, peelamedu.", "7598667032", "26/09/2018 01:24 pm", 31952, 76222], [9904, "rb priya", "99xxxxxx23", "PVR201874515", "saibaba koil", "saibaba colony, coimbatore, tamil nadu, india", null, "bad vehicle condition", "today leave", null, null, "open", "indica Non AC", "crm", 1, "26/09/2018 12:00 pm", "", "9942797723", "26/09/2018 10:47 am", 126398, 76217], [9903, "palani samy", "96xxxxxx00", "PVR201874559", "peelamedu", "chinna vedampatty", null, "others", "cus no rsp", null, null, "open", "indica AC", "crm", 2, "26/09/2018 09:50 am", "221 c block,manchester grant app, aavarampalayam", "9600693500", "26/09/2018 10:30 am", 8986, 76261], [9900, "murali ", "94xxxxxx08", "PVR201874549", "ram nagar", "collector office", null, "others", "pc", null, null, "open", "indica AC", "crm", 2, "26/09/2018 10:00 am", "210-a,sastri rd,ram nagar.", "9443046808", "26/09/2018 09:25 am", 7933, 76251], [9899, "rb easwara moorthy", "98xxxxxx39", "PVR201874516", "gold wins", "100 feet road", "412", "customer cancellation", "pc", "412 sundar 7868070703", null, "open", "indica Non AC", "crm", 1, "26/09/2018 09:00 am", "gandhipuram", "9842253339", "26/09/2018 09:07 am", 3186, 76218], [9898, "rb isabella", "90xxxxxx46", "PVR201874495", "vadavalli", "agri", null, "customer cancellation", "pc", null, null, "open", "indica Non AC", "crm", 1, "26/09/2018 09:30 am", "vmal nagar,vadavalli", "9003432546", "26/09/2018 09:05 am", 94323, 76197], [9897, "rb vishnu", "98xxxxxx77", "PVR201874505", "gp", "pn palayam", null, "customer cancellation", "leave", null, null, "open", "indica Non AC", "crm", 1, "26/09/2018 09:30 am", "gp signal", "9843034077", "26/09/2018 08:46 am", 32908, 76207], [9896, "prabhu", "99xxxxxx48", "PVR201874545", "rainbow sungam", "paal company", "640", "customer cancellation", "pc", "640 sukumaran 9500266380", null, "open", "indica AC", "crm", 2, "26/09/2018 09:00 am", "manoharam hosp paal company, rs puram", "9942757448", "26/09/2018 08:42 am", 9428, 76247], [9895, "rb saraswathi", "90xxxxxx56", "PVR201874500", "thaneer pandhal", "kalapatty", "412", "others", "cmr no response after pick up time", "412 sundar 7868070703", null, "open", "indica Non AC", "crm", 1, "26/09/2018 08:25 am", "25,gowthamapuri,vilankuruchi road,thaneeerpandal,", "9043473856", "26/09/2018 08:32 am", 92395, 76202], [9893, "rb dorathy", "96xxxxxx50", "PVR201874517", "gv residency", "gv residency", null, "customer cancellation", "today leave", null, null, "open", "indica Non AC", "crm", 1, "26/09/2018 08:00 am", "sungam", "9655581750", "26/09/2018 07:22 am", 92574, 76219], [9892, "rb hemalatha", "98xxxxxx75", "PVR201874519", "codissia", "olambus", null, "customer cancellation", "leave", null, null, "open", "indica Non AC", "crm", 1, "26/09/2018 03:25 pm", "", "9894020075", "26/09/2018 06:13 am", 125437, 76221], [9891, "rb hemalatha", "98xxxxxx75", "PVR201874523", "olambus", "codissia", null, "customer cancellation", "leave", null, null, "open", "indica Non AC", "crm", 1, "26/09/2018 01:35 pm", "", "9894020075", "26/09/2018 06:13 am", 125437, 76225], [9890, "rb dr.sivangyanam", "99xxxxxx62", "PVR201874303", "hope college", "fun mall", "437", "others", "vna", "437 kathiravan 8667668556", null, "open", "indica Non AC", "crm", 1, "25/09/2018 07:00 pm", "hopes doctor diabitician in kmch", "9944455662", "25/09/2018 08:31 pm", 80184, 76005], [9889, "nayagam", "99xxxxxx96", "PVR201874474", "vellakinar pirivu", "railway station", null, "bad vehicle condition", "informed vna due to traffic", null, null, "open", null, "crm", 4, "25/09/2018 09:30 pm", "vellakinar, thudiyalur", "9965595796", "25/09/2018 08:26 pm", 8627, 76176]];

        $tags = array_map(function ($tag) {
            return array(
                'pnr'     => ucfirst($tag[3]),
                'from'    => ucfirst($tag[4]),
                'to'      => ucfirst($tag[5]),
                'vech'    => ucfirst($tag[6]),
                'reason'  => ucfirst($tag[7]),
                'desc'    => ucfirst($tag[8]),
                'follow'  => ucfirst($tag[9]),
                'candate' => ucfirst($tag[15])
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }

    function enquiries($data1, $data2)
    {
        $array = [[212, "enq0298", "sundar", "98xxxxxx90", "24/09/2018 09:55 am", "km11+200+toll", "trip", null, "open", "kurinchi st,vembu avenue, vadavalli", "rs puram", "rajapalayam, tamil nadu, india", "sundar", "9865254090", "2018-09-25 00:00:00", "kurinchi st,vembu avenue, vadavalli", 43121, 1269, 7759], [211, "enq0297", "balaraman", "95xxxxxx30", "23/09/2018 11:05 am", "48 hrs pkg 6200+km9+bata+permit", "trip", null, "open", "47,lakshmi nagar.\r\nthondamuthur road,\r\nvadavalli", "vadavalli", "mysuru, karnataka, india", "balaraman", "9500100530", "2018-10-13 00:00:00", "47,lakshmi nagar.\r\nthondamuthur road,\r\nvadavalli", 66858, 1334, 9993], [210, "enq0296", "vimal", "98xxxxxx03", "19/09/2018 11:44 am", "asked call centre number", "general", null, "open", "16 c shakthi aksaya app alamelu mangai avaenue vadavalli", null, null, "vimal", "9894824403", null, "16 c shakthi aksaya app alamelu mangai avaenue vadavalli", 56101, null, null], [209, "enq0295", "kumar", "81xxxxxx72", "08/09/2018 01:00 pm", "1500+80+8+permit", "trip", null, "open", "34, alamelu mangai lay out, puliyakulam", "vadavalli", "thrissur, kerala, india", "kumar", "8122090772", "2018-09-09 00:00:00", "34, alamelu mangai lay out, puliyakulam", 70805, 1334, 8965], [208, "enq0294", "gourish", "98xxxxxx52", "06/09/2018 12:15 pm", "24 hrs pkg booked rubina", "trip", null, "open", "", "annasilai", "erode, tamil nadu, india", "gourish", "9884253052", "2018-09-06 00:00:00", "", 128454, 1010, 7661], [207, "enq0293", "ravindar", "99xxxxxx14", "02/09/2018 07:36 pm", "kothagiri return 2300+125+9/addkms dezire", "general", null, "open", "58,shresta 2nd st,\r\nmeenaestate", null, null, "ravindar", "9952622414", null, "58,shresta 2nd st,\r\nmeenaestate", 45632, null, null], [206, "enq0292", "lakshi", "70xxxxxx31", "31/08/2018 06:00 pm", "1500+80+8", "trip", null, "open", "null", "sitra", "erode, tamil nadu, india", "lakshi", "7010055131", "2018-09-01 00:00:00", "null", 84304, 1384, 7661], [205, "enq0291", "radha", "92xxxxxx80", "31/08/2018 08:11 am", "km10+bata200+", "trip", null, "open", "radha stores,maruthamalai main rd,navavoor pirivu", "navavoor pirivu", "trichy airport", "radha", "9245250580", "2018-09-15 00:00:00", "radha stores,maruthamalai main rd,navavoor pirivu", 10103, 1188, 9939], [204, "enq0290", "vasavaraj", "96xxxxxx18", "28/08/2018 11:39 am", "km18+200+cmr not ACcepted rate", "trip", null, "open", "65 ,viveganantha rd, ramnagar", "theethipalayam", "tirunelveli, tamil nadu, india", "vasavaraj", "9655944618", "2018-08-28 00:00:00", "65 ,viveganantha rd, ramnagar", 32002, 1310, 9970], [203, "enq0289", "kumar", "98xxxxxx16", "26/08/2018 08:55 am", "km 21+200+250", "trip", null, "open", "2nd block, muthammal avenue, tulipe lay out, vadavalli, ", "vadavalli", "e pondy rd, mandhakarai, villupuram, tamil nadu 605602, india", "kumar", "9894833116", "2018-08-27 00:00:00", "2nd block, muthammal avenue, tulipe lay out, vadavalli, ", 58694, 1334, 7702], [202, "enq0288", "merien", "94xxxxxx77", "25/08/2018 03:48 pm", "1500+80+8", "trip", null, "open", "om ganesh nagar, vadavalli", "vadavalli", "palakkad, kerala, india", "merien", "9487216977", "2018-08-26 00:00:00", "om ganesh nagar, vadavalli", 7598, 1334, 7499], [201, "enq0287", "uma krishnan", "97xxxxxx02", "22/08/2018 10:25 am", "thirupur 12 hres 80kms 1500+8/addkms", "general", null, "open", "sarojini street,ram nagar,", null, null, "uma krishnan", "9710127602", null, "sarojini street,ram nagar,", 8182, null, null], [200, "enq0286", "kumar", "98xxxxxx16", "21/08/2018 04:46 pm", "rs 13+300+250 permit", "trip", null, "open", "2nd block, muthammal avenue, tulipe lay out, vadavalli, ", "vadavalli", "cochin airport atc tower, nedumbassery, kerala 683111, india", "kumar", "9894833116", "2018-08-31 00:00:00", "2nd block, muthammal avenue, tulipe lay out, vadavalli, ", 58694, 1334, 7799], [199, "enq0285", "shamala", "95xxxxxx80", "16/08/2018 09:47 am", "km 20+permit 250", "trip", null, "open", "sree varsha gardern,near thudiyalur,opp venu gobal hospital", "vadavalli", "palakkad, kerala, india", "shamala", "9500746480", "2018-08-16 00:00:00", "sree varsha gardern,near thudiyalur,opp venu gobal hospital", 24851, 1334, 7499], [198, "enq0284", "santhanam", "93xxxxxx02", "14/08/2018 05:01 pm", "km 20+", "trip", null, "open", "50, peryathottam colony, 1 st st, veerakeralam", "vadavalli", "salem, tamil nadu, india", "santhanam", "9345815602", "2018-08-15 00:00:00", "50, peryathottam colony, 1 st st, veerakeralam", 19297, 1334, 7697], [197, "enq0283", "radha kirshnan", "99xxxxxx50", "14/08/2018 10:57 am", "vadavalli-palakad 1700+9/km+300", "general", null, "open", "archana gardens pnt clny koundampalayam", null, null, "radha kirshnan", "9944890950", null, "archana gardens pnt clny koundampalayam", 63721, null, null], [196, "enq0282", "mabel", "94xxxxxx75", "12/08/2018 05:38 pm", "", "trip", null, "open", "vasan eye care lakshmi mills", "pn palayam", "kerala, india", "mabel", "9443063475", "2018-08-30 00:00:00", "vasan eye care lakshmi mills", 60131, 1227, 7657], [195, "enq0281", "siva raman", "99xxxxxx98", "11/08/2018 12:12 pm", "1500+80+8", "trip", null, "open", "55 2 th cross periyathottam colony,vadavalli", "vadavalli", "tiruppur", "siva raman", "9944685798", "2018-08-15 00:00:00", "55 2 th cross periyathottam colony,vadavalli", 14269, 1334, 1324], [194, "enq0280", "sagthivel", "99xxxxxx00", "10/08/2018 12:23 pm", "1800+1+300", "trip", null, "open", "mani traders,rangee gounders st", "vadavalli", "ooty", "sagthivel", "9994540600", "2018-08-11 00:00:00", "mani traders,rangee gounders st", 37799, 1334, 1204], [193, "enq0279", "dr irulappan", "94xxxxxx75", "04/08/2018 10:42 am", "3000+125+8+200", "trip", null, "open", "5 /12, shagsh apptment, vadavalli", "vadavalli", "madurai, tamil nadu, india", "dr irulappan", "9444017375", "2018-08-30 00:00:00", "5 /12, shagsh apptment, vadavalli", 61964, 1334, 7494]];

        $tags = array_map(function ($tag) {
            return array(
                'enq'    => ucfirst($tag[1]),
                'name'   => ucfirst($tag[2]),
                'num'    => ucfirst($tag[3]),
                'date'   => ucfirst($tag[4]),
                'desc'   => ucfirst($tag[5]),
                'type'   => ucfirst($tag[6]),
                'enqdes' => ucfirst($tag[7]),
                'status' => ucfirst($tag[8])
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }

    function follow_up($data1, $data2)
    {
        $array = [[5945, "PVR201874689", "Ganapathy", "98xxxxxx19", "27/09/2018 07:04 AM", "Driver SMS not Delivered", "not call cmr ", null, "open", "3-b,block -2,sreerosh freedom squre appartment,sowripalyam", "Sowripalayam, Coimbatore, Tamil Nadu, India", "Railway Station", 76391], [5944, "PVR201874722", "RB Anu Radha", "90xxxxxx94", "27/09/2018 06:10 AM", "Booking Conformed", "time chng", null, "open", "KK colony,pn pudur,", "PN PUDUR", "WOMENS CENTER", 76424], [5943, "PVR201874654", "K.C.N Swamy", "99xxxxxx08", "26/09/2018 05:55 PM", "Booking Conformed", "", null, "open", "block a-flat a1, anjjanur road, bommanampalayam pirivu(vedapatti , gayathiri nagar", "Ramanathapuram, Coimbatore, Tamil Nadu, India", "Vadavalli, Coimbatore, Tamil Nadu, India", 76356], [5942, "PVR201874613", "Krishnamurthy", "94xxxxxx08", "26/09/2018 02:58 PM", "Booking Conformed", "PVR dtls", null, "open", "1458, brindhavan hill view lakshmi nagarvadavalli", "ONAAMPALAYAM", "Brindavan Senior Citizen Foundation Guhan Garden, Lakshmi Nagar, Thondamuthur Road, Bharathiar University Post, Coimbatore-641 046, Bommanampalayam, Coimbatore, Tamil Nadu 641046, India", 76315], [5941, "PVR201874576", "S.Venkat", "97xxxxxx31", "26/09/2018 12:32 PM", "Driver Not Yet Called Customer", "", null, "open", "107 Brindavan Hill View Lakshmni Nager, gujan garden ", "Brindavan Senior Citizen Foundation Guhan Garden, Lakshmi Nagar, Thondamuthur Road, Bharathiar University Post, Coimbatore-641 046, Bommanampalayam, Coimbatore, Tamil Nadu 641046, India", "Brindavan Senior Citizen Foundation Guhan Garden, Lakshmi Nagar, Thondamuthur Road, Bharathiar University Post, Coimbatore-641 046, Bommanampalayam, Coimbatore, Tamil Nadu 641046, India", 76278], [5940, "PVR201874583", "Radha", "96xxxxxx85", "26/09/2018 11:42 AM", "Booking Conformed", "drop place chngd", null, "open", "34 ,Nana Nani Phase 2 vadvalli", "Nana Nani Phase 2 Vadavalli", "Nana Nani Phase 4 Kasturinayakenpalayam", 76285], [5939, "PVR201874548", "RB Vishnu", "98xxxxxx77", "26/09/2018 11:29 AM", "Driver SMS not Delivered", "conformation msg not received ", null, "open", "gp signal", "GP", "PERUR PACCHAPALAYAM", 76250], [5938, "PVR201874561", "RB Sagundhala", "98xxxxxx33", "26/09/2018 10:21 AM", "Booking Conformed", "PVR dtls", null, "open", "65 raganendra nagar,bharathiyar univ,iob colony", "IOB COLONY", "IOB COLONY", 76263], [5937, "PVR201874559", "Palani Samy", "96xxxxxx00", "26/09/2018 09:58 AM", "Driver Not Yet Called Customer", "", null, "open", "221 c block,Manchester grant app, Aavarampalayam", "PEELAMEDU", "CHINNA VEDAMPATTY", 76261], [5936, "PVR201874462", "Rajamani", "89xxxxxx75", "26/09/2018 08:12 AM", "Booking Conformed", "PVR dtls", null, "open", "166, Brindavan Hill View, Vadavalli", "Brindavan Senior Citizen Foundation Guhan Garden, Lakshmi Nagar, Thondamuthur Road, Bharathiar University Post, Coimbatore-641 046, Bommanampalayam, Coimbatore, Tamil Nadu 641046, India", "KANNAPPAN NAGAR, sanganoor,coimbatore", 76164], [5935, "PVR201874468", "Murali", "70xxxxxx19", "26/09/2018 08:06 AM", "Booking Conformed", "PVR dtls", null, "open", "vadavalli", "VADAVALLI", "AIRPORT", 76170], [5934, "PVR201874470", "Nambi", "94xxxxxx54", "26/09/2018 07:04 AM", "Driver SMS not Delivered", "PVR detailes", null, "open", "Flat no 7 G.G.Avenue Near more super market road, vadavalli", "VADAVALLI", "GKNM", 76172], [5933, "PVR201874446", "Vaithyanathan", "99xxxxxx91", "26/09/2018 06:33 AM", "Driver SMS not Delivered", "pick up time change", null, "open", "Thaygi Shanmugan ager Singanallur", "SINGANALLUR", "NEELAMBUR", 76148], [5932, "PVR201874498", "RB Anu Radha", "90xxxxxx94", "26/09/2018 06:02 AM", "Driver SMS not Delivered", "pick up time change", null, "open", "KK colony,pn pudur,", "PN PUDUR", "WOMENS CENTER", 76200], [5931, "PVR201874468", "Murali", "70xxxxxx19", "26/09/2018 05:48 AM", "Driver SMS not Delivered", "pick up time change", null, "open", "vadavalli", "VADAVALLI", "AIRPORT", 76170], [5930, "PVR201874376", "Ramalingam", "96xxxxxx81", "25/09/2018 11:00 AM", "Booking Conformed", "PVR dtls", null, "open", "kuruchi, sundarapuram ", "RS PURAM", "SUNDARAPURAM", 76078], [5929, "PVR201874308", "RB Isabella", "90xxxxxx46", "25/09/2018 09:40 AM", "Driver Not Yet Called Customer", "drvr not call cus", null, "open", "vmal nagar,vadavalli", "AGRI", "VADAVALLI", 76010], [5928, "PVR201874187", "Akilashweran", "94xxxxxx58", "25/09/2018 09:32 AM", "Driver SMS not Delivered", "", null, "open", "26,vana prasta,kasturinayaken palayam,Vadavalli", "Vanaprastha Vadavalli", "Vanaprastha Vadavalli", 75889], [5927, "PVR201874349", "RB Vanitha", "99xxxxxx26", "25/09/2018 09:15 AM", "Booking Conformed", "PVR dtls", null, "open", "amirhtha school near ,nallampalayam road,kavundampalayam", "NALLAM PALAYAM", "GANAPATHY", 76051], [5926, "PVR201874298", "LAXMI KRISHNAN", "98xxxxxx05", "25/09/2018 06:28 AM", "Booking Conformed", "PVR dtls\r\n\r\n", null, "open", "32 Dhyana prastha Vadavalli.", "Vanaprastha Vadavalli", "Railway Station", 76000]];

        $tags = array_map(function ($tag) {
            return array(
                'enq'    => ucfirst($tag[1]),
                'name'   => ucfirst($tag[2]),
                'num'    => ucfirst($tag[3]),
                'date'   => ucfirst($tag[4]),
                'desc'   => ucfirst($tag[6]),
                'type'   => ucfirst($tag[5]),
                'enqdes' => ucfirst($tag[6]),
                'status' => ucfirst($tag[8])
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }

    function feedback_complaint($data1, $data2)
    {
        $array = [[1419, "Meenashi", "98xxxxxx26", null, "29/09/2018 04:34 PM", null, null, null, "open", "vadavalli", "", "", "", "vadavalli", "Meenashi", "9894838126", "vadavalli", null, 95749], [1418, "Jaganathan", "88xxxxxx80", null, "29/09/2018 04:33 PM", null, null, null, "open", "vnr nagarvadavalli 4th st", "", "", "", "vnr nagarvadavalli 4th st", "Jaganathan", "8870289280", "vnr nagarvadavalli 4th st", null, 42237], [1417, "Lalitha", "95xxxxxx34", null, "29/09/2018 04:33 PM", null, null, null, "open", "B-15/16,vsk nagar,vadavalli", "", "", "", "B-15/16,vsk nagar,vadavalli", "Lalitha", "9585516834", "B-15/16,vsk nagar,vadavalli", null, 6489], [1416, "Siva Raman", "99xxxxxx98", null, "29/09/2018 04:33 PM", null, null, null, "open", "55 2 th cross Periyathottam colony,vadavalli", "", "", "", "55 2 th cross Periyathottam colony,vadavalli", "Siva Raman", "9944685798", "55 2 th cross Periyathottam colony,vadavalli", null, 14269], [1415, "RB Umahari", "94xxxxxx63", null, "29/09/2018 04:33 PM", null, null, null, "open", "", "", "", "", "", "RB Umahari", "9487530963", "", null, 125438], [1414, "Mohan Ganapathy", "98xxxxxx01", null, "29/09/2018 04:33 PM", null, null, null, "open", "navavoor privu,vadvalli", "", "", "", "navavoor privu,vadvalli", "Mohan Ganapathy", "9840030001", "navavoor privu,vadvalli", null, 7737], [1413, "Srinivasan", "93xxxxxx29", null, "29/09/2018 04:33 PM", null, null, null, "open", "thatja gardern,thiruvalluvar nagar,vadavalli", "", "", "", "thatja gardern,thiruvalluvar nagar,vadavalli", "Srinivasan", "9363114229", "thatja gardern,thiruvalluvar nagar,vadavalli", null, 76323], [1412, "Shobana", "80xxxxxx77", null, "29/09/2018 04:33 PM", null, null, null, "open", "139,Krishna colony,ramanathapuram", "", "", "", "139,Krishna colony,ramanathapuram", "Shobana", "8098424277", "139,Krishna colony,ramanathapuram", null, 13902], [1411, "Muthu Mani", "98xxxxxx19", null, "29/09/2018 04:32 PM", null, null, null, "open", "Sowparniya apartment arun nagar,vadavalli", "", "", "", "Sowparniya apartment arun nagar,vadavalli", "Muthu Mani", "9843916619", "Sowparniya apartment arun nagar,vadavalli", null, 81], [1410, "RB Abirami", "98xxxxxx22", null, "29/09/2018 04:32 PM", null, null, null, "open", "new anukiraha app, manis theater near, hopes", "", "", "", "new anukiraha app, manis theater near, hopes", "RB Abirami", "9843451522", "new anukiraha app, manis theater near, hopes", null, 43735], [1409, "Senthil", "96xxxxxx45", null, "29/09/2018 04:32 PM", null, null, null, "open", "tvh", "", "", "", "tvh", "Senthil", "9677402745", "tvh", null, 81932], [1408, "Ganapathy", "94xxxxxx87", null, "29/09/2018 04:32 PM", null, null, null, "open", "54,Marthanagar.\r\nVadavalli", "", "", "", "54,Marthanagar.\r\nVadavalli", "Ganapathy", "9442139087", "54,Marthanagar.\r\nVadavalli", null, 3392], [1407, "Anitha", "90xxxxxx31", null, "29/09/2018 04:31 PM", null, null, null, "open", "", "", "", "", "", "Anitha", "9042004031", "", null, 126406], [1406, "Krishnan", "88xxxxxx57", null, "29/09/2018 04:31 PM", null, null, null, "open", "g1, block 2, kujan building, anjanur, bommannampalayam pirivu", "", "", "", "g1, block 2, kujan building, anjanur, bommannampalayam pirivu", "Krishnan", "8883009057", "g1, block 2, kujan building, anjanur, bommannampalayam pirivu", null, 81701], [1405, "Kalayana Ram", "98xxxxxx57", null, "29/09/2018 04:31 PM", null, null, null, "open", "4a,Vincent colony,R.S.Puram", "", "", "", "4a,Vincent colony,R.S.Puram", "Kalayana Ram", "9840279957", "4a,Vincent colony,R.S.Puram", null, 5175], [1404, "ROSELIN", "81xxxxxx07", null, "29/09/2018 04:29 PM", null, null, null, "open", "H-101,AIR FORCE HOUSING UINT ATHIPALYAM PIRIVU radio city office, (sungam)", "", "", "", "H-101,AIR FORCE HOUSING UINT ATHIPALYAM PIRIVU radio city office, (sungam)", "ROSELIN", "8122604907", "H-101,AIR FORCE HOUSING UINT ATHIPALYAM PIRIVU radio city office, (sungam)", null, 79088], [1403, "Narayanan", "89xxxxxx90", null, "29/09/2018 04:29 PM", null, null, null, "open", "16 E sasthri nagar near kongunadu clg gn mills", "", "", "", "16 E sasthri nagar near kongunadu clg gn mills", "Narayanan", "8903447690", "16 E sasthri nagar near kongunadu clg gn mills", null, 8479], [1402, "Krishnan", "88xxxxxx57", null, "29/09/2018 04:29 PM", null, null, null, "open", "g1, block 2, kujan building, anjanur, bommannampalayam pirivu", "", "", "", "g1, block 2, kujan building, anjanur, bommannampalayam pirivu", "Krishnan", "8883009057", "g1, block 2, kujan building, anjanur, bommannampalayam pirivu", null, 81701], [1401, "Sri", "70xxxxxx56", null, "29/09/2018 04:28 PM", null, null, null, "open", "null", "", "", "", "null", "Sri", "7092927656", "null", null, 96248], [1400, "pradeen", "70xxxxxx20", null, "29/09/2018 04:27 PM", null, null, null, "open", "null", "", "", "", "null", "pradeen", "7094972020", "null", null, 96238]];

        $tags = array_map(function ($tag) {
            return array(
                'cus'    => ucfirst($tag[1]),
                'mob'    => ucfirst($tag[2]),
                'fed'    => ucfirst($tag[3]),
                'cd'     => ucfirst($tag[4]),
                'fo'     => ucfirst($tag[6]),
                'des'    => ucfirst($tag[5]),
                'status' => ucfirst($tag[8])
            );
        }, $array);
        $data['data'] = $tags;
        print_r(json_encode($data));
        exit;
    }
}

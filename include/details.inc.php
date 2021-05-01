<?php
    $type_writing = array(
        "Essay(Any)","Admission Essay","Annotated Bibliography",
        "Article Review","Book/Movie Review","Business Plan",
        "Case Study","Creative Writing","Critical thinking/Review",
        "Literature Review","Presentation or Speech","Reflective Writing",
        "Report","Research Paper","Research Proposal","Term Paper","Thesis/Dissertation",
        "Homework Assignment","Biological Assignment","Chemistry Assignment","Engineering Assignment",
        "Geography Assignment","Math Assignment","Physics Assignment","Physics Assignment",
        "Statistic Assignment","Other Assignment","Multiple choice questions","Short Answer questions",
        "Word problems","others"
    );

    $grade=array(
        "school","college","university","masters","Dectorate"
    );

    $duration = array(
        "6hrs","12hrs","1day","2days","3days","5days","7days","10days",
        "2weeks","1month","2months"
    );

    $pages = [];
    for ($i = 0; $i < 400; $i++) {
         $pages[$i] = ''.($i + 1) . 'page / ' . (275 * ($i + 1)) . ' words';
    }

    $countries = [
        'Afghanistan','Albania','Angola','Anguilla','Argentina',
        'Armenia','Aruba','Australia','Austria','Azerbaijan',
        'Bahamas','Bahrain','Bangladesh','Barbados','Belarus',
        'Belgium','Benin','Bermuda','Bhutan','Bolivia','Botswana',
        'Brunei','BurkinaFaso','Burundi','Cambodia','Cameroon',
        'Canada','CapeVerde','CaymanIslands','Chad','Chile','China',
        'Colombia','Comoros','Congo','CookIslands','CostaRica',
        'Croatia','Cuba','Cyprus','CzechRepublic','Denmark',
        'DiegoGarcia','Djibouti','Dominica','Ecuador','Egypt',
        'ElSalvador','Eritrea','Ethiopia','FaroeIslands','Fiji',
        'Finland','France','FrenchGuiana','Gabon','Gambia','Georgia',
        'Germany','Ghana','Gibraltar','Greece','Greenland',
        'Grenada','Guadeloupe','Guam','Guatemala','Guinea',
        'Guinea-Bissau','Guyana','Haiti','Honduras','HongKong',
        'Hungary','Iceland','India','Indonesia','Iran','Iraq',
        'Ireland','IsleofMan','Israel','Italy','Jamaica','Japan',
        'Jersey','Kazakhstan','Kenya','Kiribati','Kuwait',
        'Kyrgyzstan','Laos','Lebanon','Lesotho','Liberia',
        'Libya','Liechtenstein','Lithuania','Luxembourg',
        'Macau','Macedonia','Madagascar','Malawi','Malaysia',
        'Maldives','Mali','Malta','Martinique','Mauritania',
        'Mauritius','Mayotte','Micronesia','Moldova','Monaco',
        'Mongolia','Montenegro','Montserrat','Morocco','Mozambique',
        'Namibia','Nauru','Nepal','Netherlands','NewCaledonia',
        'NewZealand','Nicaragua','Niger','Nigeria','Niue',
        'NorfolkIsland','NorthKorea','Norway','Oman','Pakistan',
        'Palau','Palestine','Panama','Paraguay','Peru','Philippines',
        'Poland','Portugal','PuertoRico','Qatar','ReunionIsland',
        'Romania','Russia','Rwanda','SaintLucia','SaintMartin',
        'SanMarino','SaudiArabia','Senegal','Serbia','Seychelles',
        'SierraLeone','Singapore','SintMaarten','Slovakia','Slovenia',
        'Somalia','SouthAfrica','SouthKorea','SouthSudan','Spain',
        'SriLanka','Sudan','Suriname','Svalbard','Swaziland','Sweden',
        'Switzerland','Syria','Taiwan','Tajikistan','Tanzania',
        'Thailand','Togo','Tokelau','TongaIslands','Tunisia','Turkey',
        'Turkmenistan','Tuvalu','Uganda','Ukraine','UnitedKingdom',
        'UnitedStates','Uruguay','Uzbekistan','Vanuatu','Venezuela',
        'Vietnam','Yemen','Zambia','Zimbabwe'
    ];

    $country_codes = [
        '93','355','244','1264','54','374','297','61','43','994',
        '1242','973','880','1246','375','32','229','1441','975','591',
        '267','673','226','257','855','237','1','238','1345','235','56',
        '86','57','269','242','682','506','385','53','357','420','45',
        '246','253','1767','593','20','503','291','251','298','679',
        '358','33','594','241','220','995','49','233','350','30','299',
        '1473','590','1671','502','224','245','592','509','504','852',
        '36','354','91','62','98','964','353','44','972','39','1876',
        '81','44','7','254','686','965','996','856','961','266','231',
        '218','423','370','352','853','389','261','265','60','960','223',
        '356','596','222','230','262','691','373','377','976','382',
        '1664','212','258','264','674','977','31','687','64','505',
        '227','234','683','672','850','47','968','92','680','970','507',
        '595','51','63','48','351','1787,1939','974','262','40','7',
        '250','1758','590','378','966','221','381','248','232','65',
        '1721','421','386','252','27','82','211','34','94','249','597',
        '47','268','46','41','963','886','992','255','66','228','690',
        '676','216','90','993','688','256','380',
        '44','1','598','998','678','58','84','967','260','263'
    ];
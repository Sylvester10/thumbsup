<?php

if ( ! function_exists('bytes_KB'))
{
    /**
     * is_assoc - checks if a variable is an associative array
     *
     * @param   array
     * @return  bool    TRUE / FALSE
     */
    function bytes_KB($int){
       return round($int / 1024);
    }
}

// --------------------------------------------------------------------

if ( ! function_exists('get_ext'))
{
    /**
     * is_assoc - checks if a variable is an associative array
     *
     * @param   array
     * @return  bool    TRUE / FALSE
     */
    function get_ext($file){
        return pathinfo($file, PATHINFO_EXTENSION);
    }
}

// --------------------------------------------------------------------



if ( ! function_exists('image_name'))
{
    /**
     * is_assoc - checks if a variable is an associative array
     *
     * @param   array
     * @return  bool    TRUE / FALSE
     */
    function image_name($str,$extension){
        $str = trim($str);
        $str = preg_replace('/\s+/', '_', $str);

        $str = $str.".".$extension;
        return $str;
    }
}

// --------------------------------------------------------------------

if ( ! function_exists('is_assoc'))
{
	/**
	 * is_assoc - checks if a variable is an associative array
	 *
	 * @param	array
	 * @return	bool    TRUE / FALSE
	 */
	function is_assoc($var){
        return is_array($var) and (array_values($var) !== $var);
    }
}

// --------------------------------------------------------------------


if ( ! function_exists('print_p'))
{
    /**
     * print_p
     * - prints an array in a more readable form
     * @param array 
     * @return  readable
     * 
     */
    function print_p($val){
        echo "<pre>";
        return print_r($val);
        echo "</pre>";
      }
}

// --------------------------------------------------------------------


if ( ! function_exists('substri_count'))
{
    /**
     * substri_count
     * - count how many times a string exist in another string case-insensitive
     * @param sentence - string @param word -array
     * @return int
     * 
     */
    function substri_count(string $haystack, string $needle){

        return substr_count(strtoupper($haystack), strtoupper($needle));
    }
}

// --------------------------------------------------------------------


if ( ! function_exists('curl_get_contents'))
{
    /**
     * curl_get_contents
     * - Sends HTTP request to a url
     * @param url 
     * @return json 
     * 
     */
    function curl_get_contents($url){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
      }
}

// --------------------------------------------------------------------


if ( ! function_exists('currencies'))
{
    

    /**
     * currencies
     * - returns an object of all currencies
     * @param  
     * @return object 
     * 
     * 
     */
    function currencies(){
    
        $data = '{"results":{"ALL":{"currencyName":"Albanian Lek","currencySymbol":"Lek","id":"ALL"},"XCD":{"currencyName":"East Caribbean Dollar","currencySymbol":"$","id":"XCD"},"EUR":{"currencyName":"Euro","currencySymbol":"€","id":"EUR"},"BBD":{"currencyName":"Barbadian Dollar","currencySymbol":"$","id":"BBD"},"BTN":{"currencyName":"Bhutanese Ngultrum","id":"BTN"},"BND":{"currencyName":"Brunei Dollar","currencySymbol":"$","id":"BND"},"XAF":{"currencyName":"Central African CFA Franc","id":"XAF"},"CUP":{"currencyName":"Cuban Peso","currencySymbol":"$","id":"CUP"},"USD":{"currencyName":"United States Dollar","currencySymbol":"$","id":"USD"},"FKP":{"currencyName":"Falkland Islands Pound","currencySymbol":"£","id":"FKP"},"GIP":{"currencyName":"Gibraltar Pound","currencySymbol":"£","id":"GIP"},"HUF":{"currencyName":"Hungarian Forint","currencySymbol":"Ft","id":"HUF"},"IRR":{"currencyName":"Iranian Rial","currencySymbol":"﷼","id":"IRR"},"JMD":{"currencyName":"Jamaican Dollar","currencySymbol":"J$","id":"JMD"},"AUD":{"currencyName":"Australian Dollar","currencySymbol":"$","id":"AUD"},"LAK":{"currencyName":"Lao Kip","currencySymbol":"₭","id":"LAK"},"LYD":{"currencyName":"Libyan Dinar","id":"LYD"},"MKD":{"currencyName":"Macedonian Denar","currencySymbol":"ден","id":"MKD"},"XOF":{"currencyName":"West African CFA Franc","id":"XOF"},"NZD":{"currencyName":"New Zealand Dollar","currencySymbol":"$","id":"NZD"},"OMR":{"currencyName":"Omani Rial","currencySymbol":"﷼","id":"OMR"},"PGK":{"currencyName":"Papua New Guinean Kina","id":"PGK"},"RWF":{"currencyName":"Rwandan Franc","id":"RWF"},"WST":{"currencyName":"Samoan Tala","id":"WST"},"RSD":{"currencyName":"Serbian Dinar","currencySymbol":"Дин.","id":"RSD"},"SEK":{"currencyName":"Swedish Krona","currencySymbol":"kr","id":"SEK"},"TZS":{"currencyName":"Tanzanian Shilling","currencySymbol":"TSh","id":"TZS"},"AMD":{"currencyName":"Armenian Dram","id":"AMD"},"BSD":{"currencyName":"Bahamian Dollar","currencySymbol":"$","id":"BSD"},"BAM":{"currencyName":"Bosnia And Herzegovina Konvertibilna Marka","currencySymbol":"KM","id":"BAM"},"CVE":{"currencyName":"Cape Verdean Escudo","id":"CVE"},"CNY":{"currencyName":"Chinese Yuan","currencySymbol":"¥","id":"CNY"},"CRC":{"currencyName":"Costa Rican Colon","currencySymbol":"₡","id":"CRC"},"CZK":{"currencyName":"Czech Koruna","currencySymbol":"Kč","id":"CZK"},"ERN":{"currencyName":"Eritrean Nakfa","id":"ERN"},"GEL":{"currencyName":"Georgian Lari","id":"GEL"},"HTG":{"currencyName":"Haitian Gourde","id":"HTG"},"INR":{"currencyName":"Indian Rupee","currencySymbol":"₹","id":"INR"},"JOD":{"currencyName":"Jordanian Dinar","id":"JOD"},"KRW":{"currencyName":"South Korean Won","currencySymbol":"₩","id":"KRW"},"LBP":{"currencyName":"Lebanese Lira","currencySymbol":"£","id":"LBP"},"MWK":{"currencyName":"Malawian Kwacha","id":"MWK"},"MRO":{"currencyName":"Mauritanian Ouguiya","id":"MRO"},"MZN":{"currencyName":"Mozambican Metical","id":"MZN"},"ANG":{"currencyName":"Netherlands Antillean Gulden","currencySymbol":"ƒ","id":"ANG"},"PEN":{"currencyName":"Peruvian Nuevo Sol","currencySymbol":"S/.","id":"PEN"},"QAR":{"currencyName":"Qatari Riyal","currencySymbol":"﷼","id":"QAR"},"STD":{"currencyName":"Sao Tome And Principe Dobra","id":"STD"},"SLL":{"currencyName":"Sierra Leonean Leone","id":"SLL"},"SOS":{"currencyName":"Somali Shilling","currencySymbol":"S","id":"SOS"},"SDG":{"currencyName":"Sudanese Pound","id":"SDG"},"SYP":{"currencyName":"Syrian Pound","currencySymbol":"£","id":"SYP"},"AOA":{"currencyName":"Angolan Kwanza","id":"AOA"},"AWG":{"currencyName":"Aruban Florin","currencySymbol":"ƒ","id":"AWG"},"BHD":{"currencyName":"Bahraini Dinar","id":"BHD"},"BZD":{"currencyName":"Belize Dollar","currencySymbol":"BZ$","id":"BZD"},"BWP":{"currencyName":"Botswana Pula","currencySymbol":"P","id":"BWP"},"BIF":{"currencyName":"Burundi Franc","id":"BIF"},"KYD":{"currencyName":"Cayman Islands Dollar","currencySymbol":"$","id":"KYD"},"COP":{"currencyName":"Colombian Peso","currencySymbol":"$","id":"COP"},"DKK":{"currencyName":"Danish Krone","currencySymbol":"kr","id":"DKK"},"GTQ":{"currencyName":"Guatemalan Quetzal","currencySymbol":"Q","id":"GTQ"},"HNL":{"currencyName":"Honduran Lempira","currencySymbol":"L","id":"HNL"},"IDR":{"currencyName":"Indonesian Rupiah","currencySymbol":"Rp","id":"IDR"},"ILS":{"currencyName":"Israeli New Sheqel","currencySymbol":"₪","id":"ILS"},"KZT":{"currencyName":"Kazakhstani Tenge","currencySymbol":"лв","id":"KZT"},"KWD":{"currencyName":"Kuwaiti Dinar","id":"KWD"},"LSL":{"currencyName":"Lesotho Loti","id":"LSL"},"MYR":{"currencyName":"Malaysian Ringgit","currencySymbol":"RM","id":"MYR"},"MUR":{"currencyName":"Mauritian Rupee","currencySymbol":"₨","id":"MUR"},"MNT":{"currencyName":"Mongolian Tugrik","currencySymbol":"₮","id":"MNT"},"MMK":{"currencyName":"Myanma Kyat","id":"MMK"},"NGN":{"currencyName":"Nigerian Naira","currencySymbol":"₦","id":"NGN"},"PAB":{"currencyName":"Panamanian Balboa","currencySymbol":"B/.","id":"PAB"},"PHP":{"currencyName":"Philippine Peso","currencySymbol":"₱","id":"PHP"},"RON":{"currencyName":"Romanian Leu","currencySymbol":"lei","id":"RON"},"SAR":{"currencyName":"Saudi Riyal","currencySymbol":"﷼","id":"SAR"},"SGD":{"currencyName":"Singapore Dollar","currencySymbol":"$","id":"SGD"},';
        $data .= '"ZAR":{"currencyName":"South African Rand","currencySymbol":"R","id":"ZAR"},"SRD":{"currencyName":"Surinamese Dollar","currencySymbol":"$","id":"SRD"},"TWD":{"currencyName":"New Taiwan Dollar","currencySymbol":"NT$","id":"TWD"},"TOP":{"currencyName":"Paanga","id":"TOP"},"VEF":{"currencyName":"Venezuelan Bolivar","id":"VEF"},"DZD":{"currencyName":"Algerian Dinar","id":"DZD"},"ARS":{"currencyName":"Argentine Peso","currencySymbol":"$","id":"ARS"},"AZN":{"currencyName":"Azerbaijani Manat","currencySymbol":"ман","id":"AZN"},"BYR":{"currencyName":"Belarusian Ruble","currencySymbol":"p.","id":"BYR"},"BOB":{"currencyName":"Bolivian Boliviano","currencySymbol":"$b","id":"BOB"},"BGN":{"currencyName":"Bulgarian Lev","currencySymbol":"лв","id":"BGN"},"CAD":{"currencyName":"Canadian Dollar","currencySymbol":"$","id":"CAD"},"CLP":{"currencyName":"Chilean Peso","currencySymbol":"$","id":"CLP"},"CDF":{"currencyName":"Congolese Franc","id":"CDF"},"DOP":{"currencyName":"Dominican Peso","currencySymbol":"RD$","id":"DOP"},"FJD":{"currencyName":"Fijian Dollar","currencySymbol":"$","id":"FJD"},"GMD":{"currencyName":"Gambian Dalasi","id":"GMD"},"GYD":{"currencyName":"Guyanese Dollar","currencySymbol":"$","id":"GYD"},"ISK":{"currencyName":"Icelandic Króna","currencySymbol":"kr","id":"ISK"},"IQD":{"currencyName":"Iraqi Dinar","id":"IQD"},"JPY":{"currencyName":"Japanese Yen","currencySymbol":"¥","id":"JPY"},"KPW":{"currencyName":"North Korean Won","currencySymbol":"₩","id":"KPW"},"LVL":{"currencyName":"Latvian Lats","currencySymbol":"Ls","id":"LVL"},"CHF":{"currencyName":"Swiss Franc","currencySymbol":"Fr.","id":"CHF"},"MGA":{"currencyName":"Malagasy Ariary","id":"MGA"},"MDL":{"currencyName":"Moldovan Leu","id":"MDL"},"MAD":{"currencyName":"Moroccan Dirham","id":"MAD"},"NPR":{"currencyName":"Nepalese Rupee","currencySymbol":"₨","id":"NPR"},"NIO":{"currencyName":"Nicaraguan Cordoba","currencySymbol":"C$","id":"NIO"},"PKR":{"currencyName":"Pakistani Rupee","currencySymbol":"₨","id":"PKR"},"PYG":{"currencyName":"Paraguayan Guarani","currencySymbol":"Gs","id":"PYG"},"SHP":{"currencyName":"Saint Helena Pound","currencySymbol":"£","id":"SHP"},"SCR":{"currencyName":"Seychellois Rupee","currencySymbol":"₨","id":"SCR"},"SBD":{"currencyName":"Solomon Islands Dollar","currencySymbol":"$","id":"SBD"},"LKR":{"currencyName":"Sri Lankan Rupee","currencySymbol":"₨","id":"LKR"},"THB":{"currencyName":"Thai Baht","currencySymbol":"฿","id":"THB"},"TRY":{"currencyName":"Turkish New Lira","id":"TRY"},"AED":{"currencyName":"UAE Dirham","id":"AED"},"VUV":{"currencyName":"Vanuatu Vatu","id":"VUV"},"YER":{"currencyName":"Yemeni Rial","currencySymbol":"﷼","id":"YER"},"AFN":{"currencyName":"Afghan Afghani","currencySymbol":"؋","id":"AFN"},"BDT":{"currencyName":"Bangladeshi Taka","id":"BDT"},"BRL":{"currencyName":"Brazilian Real","currencySymbol":"R$","id":"BRL"},"KHR":{"currencyName":"Cambodian Riel","currencySymbol":"៛","id":"KHR"},"KMF":{"currencyName":"Comorian Franc","id":"KMF"},"HRK":{"currencyName":"Croatian Kuna","currencySymbol":"kn","id":"HRK"},"DJF":{"currencyName":"Djiboutian Franc","id":"DJF"},"EGP":{"currencyName":"Egyptian Pound","currencySymbol":"£","id":"EGP"},"ETB":{"currencyName":"Ethiopian Birr","id":"ETB"},"XPF":{"currencyName":"CFP Franc","id":"XPF"},"GHS":{"currencyName":"Ghanaian Cedi","id":"GHS"},"GNF":{"currencyName":"Guinean Franc","id":"GNF"},"HKD":{"currencyName":"Hong Kong Dollar","currencySymbol":"$","id":"HKD"},"XDR":{"currencyName":"Special Drawing Rights","id":"XDR"},"KES":{"currencyName":"Kenyan Shilling","currencySymbol":"KSh","id":"KES"},"KGS":{"currencyName":"Kyrgyzstani Som","currencySymbol":"лв","id":"KGS"},"LRD":{"currencyName":"Liberian Dollar","currencySymbol":"$","id":"LRD"},"MOP":{"currencyName":"Macanese Pataca","id":"MOP"},"MVR":{"currencyName":"Maldivian Rufiyaa","id":"MVR"},"MXN":{"currencyName":"Mexican Peso","currencySymbol":"$","id":"MXN"},"NAD":{"currencyName":"Namibian Dollar","currencySymbol":"$","id":"NAD"},"NOK":{"currencyName":"Norwegian Krone","currencySymbol":"kr","id":"NOK"},"PLN":{"currencyName":"Polish Zloty","currencySymbol":"zł","id":"PLN"},"RUB":{"currencyName":"Russian Ruble","currencySymbol":"руб","id":"RUB"},"SZL":{"currencyName":"Swazi Lilangeni","id":"SZL"},"TJS":{"currencyName":"Tajikistani Somoni","id":"TJS"},"TTD":{"currencyName":"Trinidad and Tobago Dollar","currencySymbol":"TT$","id":"TTD"},"UGX":{"currencyName":"Ugandan Shilling","currencySymbol":"USh","id":"UGX"},"UYU":{"currencyName":"Uruguayan Peso","currencySymbol":"$U","id":"UYU"},"VND":{"currencyName":"Vietnamese Dong","currencySymbol":"₫","id":"VND"},"TND":{"currencyName":"Tunisian Dinar","id":"TND"},"UAH":{"currencyName":"Ukrainian Hryvnia","currencySymbol":"₴","id":"UAH"},"UZS":{"currencyName":"Uzbekistani Som","currencySymbol":"лв","id":"UZS"},"TMT":{"currencyName":"Turkmenistan Manat","id":"TMT"},"GBP":{"currencyName":"British Pound","currencySymbol":"£","id":"GBP"},"ZMW":{"currencyName":"Zambian Kwacha","id":"ZMW"},"BTC":{"currencyName":"Bitcoin","currencySymbol":"BTC","id":"BTC"},"BYN":{"currencyName":"New Belarusian Ruble","currencySymbol":"p.","id":"BYN"},"BMD":{"currencyName":"Bermudan Dollar","id":"BMD"},"GGP":{"currencyName":"Guernsey Pound","id":"GGP"},"CLF":{"currencyName":"Chilean Unit Of Account","id":"CLF"},"CUC":{"currencyName":"Cuban Convertible Peso","id":"CUC"},"IMP":{"currencyName":"Manx pound","id":"IMP"},"JEP":{"currencyName":"Jersey Pound","id":"JEP"},"SVC":{"currencyName":"Salvadoran Colón","id":"SVC"},"ZMK":{"currencyName":"Old Zambian Kwacha","id":"ZMK"},"XAG":{"currencyName":"Silver (troy ounce)","id":"XAG"},"ZWL":{"currencyName":"Zimbabwean Dollar","id":"ZWL"}}}';
    
        $data = json_decode($data);
    
        return $data->results;
    }



    }

// --------------------------------------------------------------------


if ( ! function_exists('countries'))
{
    

    /**
     * countries
     * - returns an object of all countries
     * @param  
     * @return object 
     * 
     * 
     */
    function countries(){
    
        $data = '{"results":{"AF":{"alpha3":"AFG","currencyId":"AFN","currencyName":"Afghan afghani","currencySymbol":"؋","id":"AF","name":"Afghanistan"},"AI":{"alpha3":"AIA","currencyId":"XCD","currencyName":"East Caribbean dollar","currencySymbol":"$","id":"AI","name":"Anguilla"},"AU":{"alpha3":"AUS","currencyId":"AUD","currencyName":"Australian dollar","currencySymbol":"$","id":"AU","name":"Australia"},"BD":{"currencyId":"BDT","currencyName":"Bangladeshi taka","name":"Bangladesh","alpha3":"BGD","id":"BD","currencySymbol":"৳"},"BJ":{"currencyId":"XOF","currencyName":"West African CFA franc","name":"Benin","alpha3":"BEN","id":"BJ","currencySymbol":"Fr"},"BR":{"alpha3":"BRA","currencyId":"BRL","currencyName":"Brazilian real","currencySymbol":"R$","id":"BR","name":"Brazil"},"KH":{"alpha3":"KHM","currencyId":"KHR","currencyName":"Cambodian riel","currencySymbol":"៛","id":"KH","name":"Cambodia"},"TD":{"currencyId":"XAF","currencyName":"Central African CFA franc","name":"Chad","alpha3":"TCD","id":"TD","currencySymbol":"Fr"},"CG":{"currencyId":"XAF","currencyName":"Central African CFA franc","name":"Congo","alpha3":"COG","id":"CG","currencySymbol":"Fr"},"CU":{"currencyId":"CUP","currencyName":"Cuban peso","currencySymbol":"$","name":"Cuba","alpha3":"CUB","id":"CU"},"DM":{"alpha3":"DMA","currencyId":"XCD","currencyName":"East Caribbean dollar","currencySymbol":"$","id":"DM","name":"Dominica"},"FI":{"alpha3":"FIN","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"FI","name":"Finland"},"GE":{"currencyId":"GEL","currencyName":"Georgian lari","name":"Georgia","alpha3":"GEO","id":"GE","currencySymbol":"₾"},"GD":{"alpha3":"GRD","currencyId":"XCD","currencyName":"East Caribbean dollar","currencySymbol":"$","id":"GD","name":"Grenada"},"HT":{"currencyId":"HTG","currencyName":"Haitian gourde","name":"Haiti","alpha3":"HTI","id":"HT","currencySymbol":"G"},"IN":{"alpha3":"IND","currencyId":"INR","currencyName":"Indian rupee","currencySymbol":"₹","id":"IN","name":"India"},"IL":{"alpha3":"ISR","currencyId":"ILS","currencyName":"Israeli new sheqel","currencySymbol":"₪","id":"IL","name":"Israel"},"KZ":{"alpha3":"KAZ","currencyId":"KZT","currencyName":"Kazakhstani tenge","currencySymbol":"лв","id":"KZ","name":"Kazakhstan"},"KW":{"currencyId":"KWD","currencyName":"Kuwaiti dinar","name":"Kuwait","alpha3":"KWT","id":"KW","currencySymbol":"د.ك"},"LS":{"currencyId":"LSL","currencyName":"Lesotho loti","name":"Lesotho","alpha3":"LSO","id":"LS","currencySymbol":"L"},"LU":{"alpha3":"LUX","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"LU","name":"Luxembourg"},"MY":{"alpha3":"MYS","currencyId":"MYR","currencyName":"Malaysian ringgit","currencySymbol":"RM","id":"MY","name":"Malaysia"},"MU":{"alpha3":"MUS","currencyId":"MUR","currencyName":"Mauritian rupee","currencySymbol":"₨","id":"MU","name":"Mauritius"},"MN":{"alpha3":"MNG","currencyId":"MNT","currencyName":"Mongolian tugrik","currencySymbol":"₮","id":"MN","name":"Mongolia"},"MM":{"currencyId":"MMK","currencyName":"Myanma kyat","name":"Myanmar","alpha3":"MMR","id":"MM","currencySymbol":"Ks"},"NC":{"currencyId":"XPF","currencyName":"CFP franc","name":"New Caledonia","alpha3":"NCL","id":"NC","currencySymbol":"Fr"},"NO":{"alpha3":"NOR","currencyId":"NOK","currencyName":"Norwegian krone","currencySymbol":"kr","id":"NO","name":"Norway"},"PG":{"currencyId":"PGK","currencyName":"Papua New Guinean kina","name":"Papua New Guinea","alpha3":"PNG","id":"PG","currencySymbol":"K"},"PT":{"alpha3":"PRT","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"PT","name":"Portugal"},"RW":{"currencyId":"RWF","currencyName":"Rwandan franc","name":"Rwanda","alpha3":"RWA","id":"RW","currencySymbol":"Fr"},"WS":{"currencyId":"WST","currencyName":"Samoan tala","name":"Samoa (Western)","alpha3":"WSM","id":"WS","currencySymbol":"T"},"RS":{"alpha3":"SRB","currencyId":"RSD","currencyName":"Serbian dinar","currencySymbol":"Дин.","id":"RS","name":"Serbia"},"SI":{"alpha3":"SVN","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"SI","name":"Slovenia"},"ES":{"alpha3":"ESP","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"ES","name":"Spain"},"SE":{"alpha3":"SWE","currencyId":"SEK","currencyName":"Swedish krona","currencySymbol":"kr","id":"SE","name":"Sweden"},"TZ":{"alpha3":"TZA","currencyId":"TZS","currencyName":"Tanzanian shilling","currencySymbol":"TSh","id":"TZ","name":"Tanzania"},"TN":{"currencyId":"TND","currencyName":"Tunisian dinar","name":"Tunisia","alpha3":"TUN","id":"TN","currencySymbol":"ملّيم"},"UA":{"alpha3":"UKR","currencyId":"UAH","currencyName":"Ukrainian hryvnia","currencySymbol":"₴","id":"UA","name":"Ukraine"},"UZ":{"alpha3":"UZB","currencyId":"UZS","currencyName":"Uzbekistani som","currencySymbol":"лв","id":"UZ","name":"Uzbekistan"},"YE":{"alpha3":"YEM","currencyId":"YER","currencyName":"Yemeni rial","currencySymbol":"﷼","id":"YE","name":"Yemen"},"DZ":{"currencyId":"DZD","currencyName":"Algerian dinar","name":"Algeria","alpha3":"DZA","id":"DZ","currencySymbol":"د.ج"},"AR":{"alpha3":"ARG","currencyId":"ARS","currencyName":"Argentine peso","currencySymbol":"$","id":"AR","name":"Argentina"},"AZ":{"alpha3":"AZE","currencyId":"AZN","currencyName":"Azerbaijani manat","currencySymbol":"ман","id":"AZ","name":"Azerbaijan"},"BY":{"alpha3":"BLR","currencyId":"BYN","currencyName":"New Belarusian ruble","currencySymbol":"p.","id":"BY","name":"Belarus"},';
        $data .= '"BO":{"alpha3":"BOL","currencyId":"BOB","currencyName":"Bolivian boliviano","currencySymbol":"$b","id":"BO","name":"Bolivia"},"BG":{"alpha3":"BGR","currencyId":"BGN","currencyName":"Bulgarian lev","currencySymbol":"лв","id":"BG","name":"Bulgaria"},"CA":{"alpha3":"CAN","currencyId":"CAD","currencyName":"Canadian dollar","currencySymbol":"$","id":"CA","name":"Canada"},"CN":{"alpha3":"CHN","currencyId":"CNY","currencyName":"Chinese renminbi","currencySymbol":"¥","id":"CN","name":"China"},"CR":{"alpha3":"CRI","currencyId":"CRC","currencyName":"Costa Rican colon","currencySymbol":"₡","id":"CR","name":"Costa Rica"},"CZ":{"alpha3":"CZE","currencyId":"CZK","currencyName":"Czech koruna","currencySymbol":"Kč","id":"CZ","name":"Czech Republic"},"EC":{"alpha3":"ECU","currencyId":"USD","currencyName":"U.S. Dollar","currencySymbol":"$","id":"EC","name":"Ecuador"},"EE":{"alpha3":"EST","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"EE","name":"Estonia"},"PF":{"currencyId":"XPF","currencyName":"CFP franc","name":"French Polynesia","alpha3":"PYF","id":"PF","currencySymbol":"Fr"},"GH":{"currencyId":"GHS","currencyName":"Ghanaian cedi","name":"Ghana","alpha3":"GHA","id":"GH","currencySymbol":"₵"},"GN":{"currencyId":"GNF","currencyName":"Guinean franc","name":"Guinea","alpha3":"GIN","id":"GN","currencySymbol":"Fr"},"HK":{"alpha3":"HKG","currencyId":"HKD","currencyName":"Hong Kong dollar","currencySymbol":"$","id":"HK","name":"Hong Kong"},"IR":{"alpha3":"IRN","currencyId":"IRR","currencyName":"Iranian rial","currencySymbol":"﷼","id":"IR","name":"Iran, Islamic Republic of"},"JM":{"alpha3":"JAM","currencyId":"JMD","currencyName":"Jamaican dollar","currencySymbol":"J$","id":"JM","name":"Jamaica"},"KI":{"alpha3":"KIR","currencyId":"AUD","currencyName":"Australian dollar","currencySymbol":"$","id":"KI","name":"Kiribati"},"LA":{"alpha3":"LAO","currencyId":"LAK","currencyName":"Lao kip","currencySymbol":"₭","id":"LA","name":"Laos"},"LY":{"currencyId":"LYD","currencyName":"Libyan dinar","name":"Libya","alpha3":"LBY","id":"LY","currencySymbol":"ل.د"},"MK":{"alpha3":"MKD","currencyId":"MKD","currencyName":"Macedonian denar","currencySymbol":"ден","id":"MK","name":"Macedonia (Former Yug. Rep.)"},"ML":{"currencyId":"XOF","currencyName":"West African CFA franc","name":"Mali","alpha3":"MLI","id":"ML","currencySymbol":"Fr"},"FM":{"alpha3":"FSM","currencyId":"USD","currencyName":"U.S. Dollar","currencySymbol":"$","id":"FM","name":"Micronesia"},"MS":{"alpha3":"MSR","currencyId":"XCD","currencyName":"East Caribbean dollar","currencySymbol":"$","id":"MS","name":"Montserrat"},"NR":{"alpha3":"NRU","currencyId":"AUD","currencyName":"Australian dollar","currencySymbol":"$","id":"NR","name":"Nauru"},"NI":{"alpha3":"NIC","currencyId":"NIO","currencyName":"Nicaraguan cordoba","currencySymbol":"C$","id":"NI","name":"Nicaragua"},"PK":{"alpha3":"PAK","currencyId":"PKR","currencyName":"Pakistani rupee","currencySymbol":"₨","id":"PK","name":"Pakistan"},"PE":{"alpha3":"PER","currencyId":"PEN","currencyName":"Peruvian nuevo sol","currencySymbol":"S/.","id":"PE","name":"Peru"},"QA":{"alpha3":"QAT","currencyId":"QAR","currencyName":"Qatari riyal","currencySymbol":"﷼","id":"QA","name":"Qatar"},"KN":{"alpha3":"KNA","currencyId":"XCD","currencyName":"East Caribbean dollar","currencySymbol":"$","id":"KN","name":"Saint Kitts and Nevis"},"ST":{"currencyId":"STD","currencyName":"Sao Tome and Principe dobra","name":"Sao Tome and Principe","alpha3":"STP","id":"ST","currencySymbol":"Db"},"SL":{"currencyId":"SLL","currencyName":"Sierra Leonean leone","name":"Sierra Leone","alpha3":"SLE","id":"SL","currencySymbol":"Le"},"SO":{"alpha3":"SOM","currencyId":"SOS","currencyName":"Somali shilling","currencySymbol":"S","id":"SO","name":"Somalia"},"SD":{"currencyId":"SDG","currencyName":"Sudanese pound","name":"Sudan","alpha3":"SDN","id":"SD","currencySymbol":"ج.س."},"SY":{"alpha3":"SYR","currencyId":"SYP","currencyName":"Syrian pound","currencySymbol":"£","id":"SY","name":"Syria"},"TG":{"currencyId":"XOF","currencyName":"West African CFA franc","name":"Togo","alpha3":"TGO","id":"TG","currencySymbol":"Fr"},"TM":{"currencyId":"TMT","currencyName":"Turkmenistan manat","name":"Turkmenistan","alpha3":"TKM","id":"TM","currencySymbol":"m"},"GB":{"alpha3":"GBR","currencyId":"GBP","currencyName":"British pound","currencySymbol":"£","id":"GB","name":"United Kingdom"},"VE":{"currencyId":"VEF","currencyName":"Venezuelan bolivar","name":"Venezuela","alpha3":"VEN","id":"VE","currencySymbol":"Bs"},"AD":{"alpha3":"AND","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"AD","name":"Andorra"},"AM":{"currencyId":"AMD","currencyName":"Armenian dram","name":"Armenia","alpha3":"ARM","id":"AM","currencySymbol":"֏"},"BS":{"alpha3":"BHS","currencyId":"BSD","currencyName":"Bahamian dollar","currencySymbol":"$","id":"BS","name":"Bahamas"},"BE":{"alpha3":"BEL","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"BE","name":"Belgium"},"BA":{"alpha3":"BIH","currencyId":"BAM","currencyName":"Bosnia and Herzegovina konvertibilna marka","currencySymbol":"KM","id":"BA","name":"Bosnia-Herzegovina"},"BF":{"currencyId":"XOF","currencyName":"West African CFA franc","name":"Burkina Faso","alpha3":"BFA","id":"BF","currencySymbol":"Fr"},"KY":{"alpha3":"CYM","currencyId":"KYD","currencyName":"Cayman Islands dollar","currencySymbol":"$","id":"KY","name":"Cayman Islands"},"CO":{"alpha3":"COL","currencyId":"COP","currencyName":"Colombian peso","currencySymbol":"$","id":"CO","name":"Colombia"},"CI":{"currencyId":"XOF","currencyName":"West African CFA franc","name":"Côte d\'Ivoire","alpha3":"CIV","id":"CI","currencySymbol":"Fr"},"DK":{"alpha3":"DNK","currencyId":"DKK","currencyName":"Danish krone","currencySymbol":"kr","id":"DK","name":"Denmark"},"EG":{"alpha3":"EGY","currencyId":"EGP","currencyName":"Egyptian pound","currencySymbol":"£","id":"EG","name":"Egypt"},"ET":{"currencyId":"ETB","currencyName":"Ethiopian birr","name":"Ethiopia","alpha3":"ETH","id":"ET","currencySymbol":"Br"},"GA":{"currencyId":"XAF","currencyName":"Central African CFA franc","name":"Gabon","alpha3":"GAB","id":"GA","currencySymbol":"Fr"},"GI":{"alpha3":"GIB","currencyId":"GIP","currencyName":"Gibraltar pound","currencySymbol":"£","id":"GI","name":"Gibraltar"},"GW":{"currencyId":"XOF","currencyName":"West African CFA franc","name":"Guinea-Bissau","alpha3":"GNB","id":"GW","currencySymbol":"Fr"},';
        $data .= '"HU":{"alpha3":"HUN","currencyId":"HUF","currencyName":"Hungarian forint","currencySymbol":"Ft","id":"HU","name":"Hungary"},"IQ":{"currencyId":"IQD","currencyName":"Iraqi dinar","name":"Iraq","alpha3":"IRQ","id":"IQ","currencySymbol":"ع.د"},"JP":{"alpha3":"JPN","currencyId":"JPY","currencyName":"Japanese yen","currencySymbol":"¥","id":"JP","name":"Japan"},"KP":{"alpha3":"PRK","currencyId":"KPW","currencyName":"North Korean won","currencySymbol":"₩","id":"KP","name":"Korea North"},"LV":{"alpha3":"LVA","currencyId":"LVL","currencyName":"Latvian lats","currencySymbol":"Ls","id":"LV","name":"Latvia"},"LI":{"alpha3":"LIE","currencyId":"CHF","currencyName":"Swiss Franc","currencySymbol":"Fr.","id":"LI","name":"Liechtenstein"},"MG":{"currencyId":"MGA","currencyName":"Malagasy ariary","name":"Madagascar","alpha3":"MDG","id":"MG","currencySymbol":"Ar"},"MT":{"alpha3":"MLT","currencyId":"EUR","currencyName":"European Euro","currencySymbol":"€","id":"MT","name":"Malta"},"MD":{"currencyId":"MDL","currencyName":"Moldovan leu","name":"Moldova","alpha3":"MDA","id":"MD","currencySymbol":"L"},"MA":{"currencyId":"MAD","currencyName":"Moroccan dirham","name":"Morocco","alpha3":"MAR","id":"MA","currencySymbol":"د.م."},"NP":{"alpha3":"NPL","currencyId":"NPR","currencyName":"Nepalese rupee","currencySymbol":"₨","id":"NP","name":"Nepal"},"NE":{"currencyId":"XOF","currencyName":"West African CFA franc","name":"Niger","alpha3":"NER","id":"NE","currencySymbol":"Fr"},"PW":{"alpha3":"PLW","currencyId":"USD","currencyName":"U.S. Dollar","currencySymbol":"$","id":"PW","name":"Palau"},"PH":{"alpha3":"PHL","currencyId":"PHP","currencyName":"Philippine peso","currencySymbol":"₱","id":"PH","name":"Philippines"},"RO":{"alpha3":"ROU","currencyId":"RON","currencyName":"Romanian leu","currencySymbol":"lei","id":"RO","name":"Romania"},"LC":{"alpha3":"LCA","currencyId":"XCD","currencyName":"East Caribbean dollar","currencySymbol":"$","id":"LC","name":"Saint Lucia"},"SA":{"alpha3":"SAU","currencyId":"SAR","currencyName":"Saudi riyal","currencySymbol":"﷼","id":"SA","name":"Saudi Arabia"},"SG":{"alpha3":"SGP","currencyId":"SGD","currencyName":"Singapore dollar","currencySymbol":"$","id":"SG","name":"Singapore"},"ZA":{"alpha3":"ZAF","currencyId":"ZAR","currencyName":"South African rand","currencySymbol":"R","id":"ZA","name":"South Africa"},"SR":{"alpha3":"SUR","currencyId":"SRD","currencyName":"Surinamese dollar","currencySymbol":"$","id":"SR","name":"Suriname"},"TW":{"alpha3":"TWN","currencyId":"TWD","currencyName":"New Taiwan dollar","currencySymbol":"NT$","id":"TW","name":"Taiwan"},"TO":{"currencyId":"TOP","currencyName":"Paanga","name":"Tonga","alpha3":"TON","id":"TO","currencySymbol":"T$"},"TV":{"alpha3":"TUV","currencyId":"AUD","currencyName":"Australian dollar","currencySymbol":"$","id":"TV","name":"Tuvalu"},"US":{"alpha3":"USA","currencyId":"USD","currencyName":"United States dollar","currencySymbol":"$","id":"US","name":"United States of America"},"VN":{"alpha3":"VNM","currencyId":"VND","currencyName":"Vietnamese dong","currencySymbol":"₫","id":"VN","name":"Vietnam"},"AL":{"alpha3":"ALB","currencyId":"ALL","currencyName":"Albanian lek","currencySymbol":"Lek","id":"AL","name":"Albania"},"AG":{"alpha3":"ATG","currencyId":"XCD","currencyName":"East Caribbean dollar","currencySymbol":"$","id":"AG","name":"Antigua and Barbuda"},"AT":{"alpha3":"AUT","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"AT","name":"Austria"},"BB":{"alpha3":"BRB","currencyId":"BBD","currencyName":"Barbadian dollar","currencySymbol":"$","id":"BB","name":"Barbados"},"BT":{"currencyId":"BTN","currencyName":"Bhutanese ngultrum","name":"Bhutan","alpha3":"BTN","id":"BT","currencySymbol":"Nu."},"BN":{"alpha3":"BRN","currencyId":"BND","currencyName":"Brunei dollar","currencySymbol":"$","id":"BN","name":"Brunei"},"CM":{"currencyId":"XAF","currencyName":"Central African CFA franc","name":"Cameroon","alpha3":"CMR","id":"CM","currencySymbol":"Fr"},"CL":{"alpha3":"CHL","currencyId":"CLP","currencyName":"Chilean peso","currencySymbol":"$","id":"CL","name":"Chile"},"CD":{"currencyId":"CDF","currencyName":"Congolese franc","name":"Congo, Democratic Republic","alpha3":"COD","id":"CD","currencySymbol":"Fr"},"CY":{"alpha3":"CYP","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"CY","name":"Cyprus"},"DO":{"alpha3":"DOM","currencyId":"DOP","currencyName":"Dominican peso","currencySymbol":"RD$","id":"DO","name":"Dominican Republic"},"ER":{"currencyId":"ERN","currencyName":"Eritrean nakfa","name":"Eritrea","alpha3":"ERI","id":"ER","currencySymbol":"Nfk"},"FR":{"alpha3":"FRA","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"FR","name":"France"},"DE":{"alpha3":"DEU","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"DE","name":"Germany"},"GT":{"alpha3":"GTM","currencyId":"GTQ","currencyName":"Guatemalan quetzal","currencySymbol":"Q","id":"GT","name":"Guatemala"},"HN":{"alpha3":"HND","currencyId":"HNL","currencyName":"Honduran lempira","currencySymbol":"L","id":"HN","name":"Honduras"},"ID":{"alpha3":"IDN","currencyId":"IDR","currencyName":"Indonesian rupiah","currencySymbol":"Rp","id":"ID","name":"Indonesia"},"IT":{"alpha3":"ITA","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"IT","name":"Italy"},"KE":{"alpha3":"KEN","currencyId":"KES","currencyName":"Kenyan shilling","currencySymbol":"KSh","id":"KE","name":"Kenya"},"KG":{"alpha3":"KGZ","currencyId":"KGS","currencyName":"Kyrgyzstani som","currencySymbol":"лв","id":"KG","name":"Kyrgyzstan"},"LR":{"alpha3":"LBR","currencyId":"LRD","currencyName":"Liberian dollar","currencySymbol":"$","id":"LR","name":"Liberia"},"MO":{"currencyId":"MOP","currencyName":"Macanese pataca","name":"Macau","alpha3":"MAC","id":"MO","currencySymbol":"P"},"MV":{"currencyId":"MVR","currencyName":"Maldivian rufiyaa","name":"Maldives","alpha3":"MDV","id":"MV","currencySymbol":".ރ"},"MX":{"alpha3":"MEX","currencyId":"MXN","currencyName":"Mexican peso","currencySymbol":"$","id":"MX","name":"Mexico"},"ME":{"alpha3":"MNE","currencyId":"EUR","currencyName":"European Euro","currencySymbol":"€","id":"ME","name":"Montenegro"},"NA":{"alpha3":"NAM","currencyId":"NAD","currencyName":"Namibian dollar","currencySymbol":"$","id":"NA","name":"Namibia"},"NZ":{"alpha3":"NZL","currencyId":"NZD","currencyName":"New Zealand dollar","currencySymbol":"$","id":"NZ","name":"New Zealand"},"OM":{"alpha3":"OMN","currencyId":"OMR","currencyName":"Omani rial","currencySymbol":"﷼","id":"OM","name":"Oman"},"PY":{"alpha3":"PRY","currencyId":"PYG","currencyName":"Paraguayan guarani","currencySymbol":"Gs","id":"PY","name":"Paraguay"},"PR":{"alpha3":"PRI","currencyId":"USD","currencyName":"U.S. Dollar","currencySymbol":"$","id":"PR","name":"Puerto Rico"},"SH":{"alpha3":"SHN","currencyId":"SHP","currencyName":"Saint Helena pound","currencySymbol":"£","id":"SH","name":"Saint Helena"},"SM":{"alpha3":"SMR","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"SM","name":"San Marino"},"SC":{"alpha3":"SYC","currencyId":"SCR","currencyName":"Seychellois rupee","currencySymbol":"₨","id":"SC","name":"Seychelles"},"SB":{"alpha3":"SLB","currencyId":"SBD","currencyName":"Solomon Islands dollar","currencySymbol":"$","id":"SB","name":"Solomon Islands"},"LK":{"alpha3":"LKA","currencyId":"LKR","currencyName":"Sri Lankan rupee","currencySymbol":"₨","id":"LK","name":"Sri Lanka"},"CH":{"alpha3":"CHE","currencyId":"CHF","currencyName":"Swiss franc","currencySymbol":"Fr.","id":"CH","name":"Switzerland"},"TH":{"alpha3":"THA","currencyId":"THB","currencyName":"Thai baht","currencySymbol":"฿","id":"TH","name":"Thailand"},"TR":{"currencyId":"TRY","currencyName":"Turkish new lira","name":"Turkey","alpha3":"TUR","id":"TR","currencySymbol":"₺"},"AE":{"currencyId":"AED","currencyName":"UAE dirham","name":"United Arab Emirates","alpha3":"ARE","id":"AE","currencySymbol":"فلس"},';
        $data .='"VU":{"currencyId":"VUV","currencyName":"Vanuatu vatu","name":"Vanuatu","alpha3":"VUT","id":"VU","currencySymbol":"Vt"},"ZM":{"currencyId":"ZMW","currencyName":"Zambian kwacha","name":"Zambia","alpha3":"ZMB","id":"ZM","currencySymbol":"ZK"},"AO":{"currencyId":"AOA","currencyName":"Angolan kwanza","name":"Angola","alpha3":"AGO","id":"AO","currencySymbol":"Kz"},"AW":{"alpha3":"ABW","currencyId":"AWG","currencyName":"Aruban florin","currencySymbol":"ƒ","id":"AW","name":"Aruba"},"BH":{"currencyId":"BHD","currencyName":"Bahraini dinar","name":"Bahrain","alpha3":"BHR","id":"BH","currencySymbol":"دينار"},"BZ":{"alpha3":"BLZ","currencyId":"BZD","currencyName":"Belize dollar","currencySymbol":"BZ$","id":"BZ","name":"Belize"},"BW":{"alpha3":"BWA","currencyId":"BWP","currencyName":"Botswana pula","currencySymbol":"P","id":"BW","name":"Botswana"},"BI":{"currencyId":"BIF","currencyName":"Burundi franc","name":"Burundi","alpha3":"BDI","id":"BI","currencySymbol":"Fr"},"CF":{"currencyId":"XAF","currencyName":"Central African CFA franc","name":"Central African Republic","alpha3":"CAF","id":"CF","currencySymbol":"Fr"},"KM":{"currencyId":"KMF","currencyName":"Comorian franc","name":"Comoros","alpha3":"COM","id":"KM","currencySymbol":"Fr"},"HR":{"alpha3":"HRV","currencyId":"HRK","currencyName":"Croatian kuna","currencySymbol":"kn","id":"HR","name":"Croatia"},"DJ":{"currencyId":"DJF","currencyName":"Djiboutian franc","name":"Djibouti","alpha3":"DJI","id":"DJ","currencySymbol":"Fr"},"SV":{"alpha3":"SLV","currencyId":"USD","currencyName":"U.S. Dollar","currencySymbol":"$","id":"SV","name":"El Salvador"},"FJ":{"alpha3":"FJI","currencyId":"FJD","currencyName":"Fijian dollar","currencySymbol":"$","id":"FJ","name":"Fiji"},"GM":{"currencyId":"GMD","currencyName":"Gambian dalasi","name":"Gambia","alpha3":"GMB","id":"GM","currencySymbol":"D"},"GR":{"alpha3":"GRC","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"GR","name":"Greece"},"GY":{"alpha3":"GUY","currencyId":"GYD","currencyName":"Guyanese dollar","currencySymbol":"$","id":"GY","name":"Guyana"},"IS":{"alpha3":"ISL","currencyId":"ISK","currencyName":"Icelandic króna","currencySymbol":"kr","id":"IS","name":"Iceland"},"IE":{"alpha3":"IRL","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"IE","name":"Ireland"},"JO":{"currencyId":"JOD","currencyName":"Jordanian dinar","name":"Jordan","alpha3":"JOR","id":"JO","currencySymbol":"د.ا "},"KR":{"alpha3":"KOR","currencyId":"KRW","currencyName":"South Korean won","currencySymbol":"₩","id":"KR","name":"Korea South"},"LB":{"alpha3":"LBN","currencyId":"LBP","currencyName":"Lebanese lira","currencySymbol":"£","id":"LB","name":"Lebanon"},"MW":{"currencyId":"MWK","currencyName":"Malawian kwacha","name":"Malawi","alpha3":"MWI","id":"MW","currencySymbol":"MK"},"MR":{"currencyId":"MRO","currencyName":"Mauritanian ouguiya","name":"Mauritania","alpha3":"MRT","id":"MR","currencySymbol":"UM"},"MC":{"alpha3":"MCO","currencyId":"EUR","currencyName":"European Euro","currencySymbol":"€","id":"MC","name":"Monaco"},"MZ":{"currencyId":"MZN","currencyName":"Mozambican metical","name":"Mozambique","alpha3":"MOZ","id":"MZ","currencySymbol":"MT"},"NL":{"alpha3":"NLD","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"NL","name":"Netherlands"},"NG":{"alpha3":"NGA","currencyId":"NGN","currencyName":"Nigerian naira","currencySymbol":"₦","id":"NG","name":"Nigeria"},"PA":{"alpha3":"PAN","currencyId":"PAB","currencyName":"Panamanian balboa","currencySymbol":"B/.","id":"PA","name":"Panama"},"PL":{"alpha3":"POL","currencyId":"PLN","currencyName":"Polish zloty","currencySymbol":"zł","id":"PL","name":"Poland"},"RU":{"alpha3":"RUS","currencyId":"RUB","currencyName":"Russian ruble","currencySymbol":"руб","id":"RU","name":"Russia"},"VC":{"alpha3":"VCT","currencyId":"XCD","currencyName":"East Caribbean dollar","currencySymbol":"$","id":"VC","name":"Saint Vincent and the Grenadines"},"SN":{"currencyId":"XOF","currencyName":"West African CFA franc","name":"Senegal","alpha3":"SEN","id":"SN","currencySymbol":"Fr"},"SK":{"alpha3":"SVK","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"SK","name":"Slovakia"},"SS":{"currencyId":"SDG","currencyName":"Sudanese pound","name":"South Sudan","alpha3":"SSD","id":"SS","currencySymbol":"£"},"SZ":{"currencyId":"SZL","currencyName":"Swazi lilangeni","name":"Swaziland","alpha3":"SWZ","id":"SZ","currencySymbol":"L"},"TJ":{"currencyId":"TJS","currencyName":"Tajikistani somoni","name":"Tajikistan","alpha3":"TJK","id":"TJ","currencySymbol":"ЅМ"},"TT":{"alpha3":"TTO","currencyId":"TTD","currencyName":"Trinidad and Tobago dollar","currencySymbol":"TT$","id":"TT","name":"Trinidad and Tobago"},"UG":{"alpha3":"UGA","currencyId":"UGX","currencyName":"Ugandan shilling","currencySymbol":"USh","id":"UG","name":"Uganda"},"UY":{"alpha3":"URY","currencyId":"UYU","currencyName":"Uruguayan peso","currencySymbol":"$U","id":"UY","name":"Uruguay"},"WF":{"currencyId":"XPF","currencyName":"CFP franc","name":"Wallis and Futuna Islands","alpha3":"WLF","id":"WF","currencySymbol":"Fr"},"LT":{"alpha3":"LTU","currencyId":"EUR","currencyName":"European euro","currencySymbol":"€","id":"LT","name":"Lithuania"}}}';
    
        $data = json_decode($data);
    
        return $data->results;
    }
  



}

// --------------------------------------------------------------------


if ( ! function_exists('get_client_ip'))
{
    

    
    /**
     * get_client_ip
     * - Get the ip address of users
     * 
     * @return ip address
     * @return False if ip isn't found 
     * 
     * 
     */
    function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }




}

// --------------------------------------------------------------------


if ( ! function_exists('get_user_ip'))
{
    

    
    /**
     * get_user_ip
     * - Get the ip address of users
     * 
     * @return ip address
     * @return False if ip isn't found 
     * 
     * 
     */
    function get_user_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }




}

// --------------------------------------------------------------------




// --------------------------------------------------------------------

if ( ! function_exists('builders'))
{
    

    
    /**
     * is_email()
     * - checks if email string provided is email
     * 
     *@param $string
     * @return false of HTML tags doesn't exit in the string
     * @return true if HTML Tags Exist in the string
     * 
     * 
     */
    function builders($str="")   
    {
        $str = ltrim($str,"\\//");
        $url = $dir = APPPATH."builders"."/";
        if($str !="" and is_string($str)){
            $url = $url.$str;
        }

        return $url;
    }
}


if ( ! function_exists('mail_template'))
{
    

    
    /**
     * is_email()
     * - checks if email string provided is email
     * 
     *@param $string
     * @return false of HTML tags doesn't exit in the string
     * @return true if HTML Tags Exist in the string
     * 
     * 
     */
    function mail_template($str="")   
    {
        $str = ltrim($str,"\\//");
        $url = $dir = APPPATH."mail_templates"."/";
        if($str !="" and is_string($str)){
            $url = $url.$str;
        }

        return $url;
    }
}

// --------------------------------------------------------------------




if ( ! function_exists('is_email'))
{
    

    
    /**
     * is_email()
     * - checks if email string provided is email
     * 
     *@param $string
     * @return false of HTML tags doesn't exit in the string
     * @return true if HTML Tags Exist in the string
     * 
     * 
     */
    function is_email($email)   
    {
        return (filter_var($email,FILTER_VALIDATE_EMAIL) !== false)?true:false;

    }
}













?>
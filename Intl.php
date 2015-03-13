<?php
namespace Asgard\Common;

class Intl {
	static protected $singleton;
	protected $countryNames;
	protected $defaultTranslations;
	protected $translator;

	static public function singleton() {
		if(!static::$singleton)
			static::$singleton = new static;
		return static::$singleton;
	}

	public function __construct() {
		$this->countryNames = [
			'AF',
			'AL',
			'DZ',
			'AS',
			'AD',
			'AO',
			'AI',
			'AQ',
			'AG',
			'AR',
			'AM',
			'AW',
			'AU',
			'AT',
			'AZ',
			'BS',
			'BH',
			'BD',
			'BB',
			'BY',
			'BE',
			'BZ',
			'BJ',
			'BM',
			'BT',
			'BO',
			'BA',
			'BW',
			'BV',
			'BR',
			'BQ',
			'IO',
			'VG',
			'BN',
			'BG',
			'BF',
			'BI',
			'KH',
			'CM',
			'CA',
			'CT',
			'CV',
			'KY',
			'CF',
			'TD',
			'CL',
			'CN',
			'CX',
			'CC',
			'CO',
			'KM',
			'CG',
			'CD',
			'CK',
			'CR',
			'HR',
			'CU',
			'CY',
			'CZ',
			'CI',
			'DK',
			'DJ',
			'DM',
			'DO',
			'NQ',
			'DD',
			'EC',
			'EG',
			'SV',
			'GQ',
			'ER',
			'EE',
			'ET',
			'FK',
			'FO',
			'FJ',
			'FI',
			'FR',
			'GF',
			'PF',
			'TF',
			'FQ',
			'GA',
			'GM',
			'GE',
			'DE',
			'GH',
			'GI',
			'GR',
			'GL',
			'GD',
			'GP',
			'GU',
			'GT',
			'GG',
			'GN',
			'GW',
			'GY',
			'HT',
			'HM',
			'HN',
			'HK',
			'HU',
			'IS',
			'IN',
			'ID',
			'IR',
			'IQ',
			'IE',
			'IM',
			'IL',
			'IT',
			'JM',
			'JP',
			'JE',
			'JT',
			'JO',
			'KZ',
			'KE',
			'KI',
			'KW',
			'KG',
			'LA',
			'LV',
			'LB',
			'LS',
			'LR',
			'LY',
			'LI',
			'LT',
			'LU',
			'MO',
			'MK',
			'MG',
			'MW',
			'MY',
			'MV',
			'ML',
			'MT',
			'MH',
			'MQ',
			'MR',
			'MU',
			'YT',
			'FX',
			'MX',
			'FM',
			'MI',
			'MD',
			'MC',
			'MN',
			'ME',
			'MS',
			'MA',
			'MZ',
			'MM',
			'NA',
			'NR',
			'NP',
			'NL',
			'AN',
			'NT',
			'NC',
			'NZ',
			'NI',
			'NE',
			'NG',
			'NU',
			'NF',
			'KP',
			'VD',
			'MP',
			'NO',
			'OM',
			'PC',
			'PK',
			'PW',
			'PS',
			'PA',
			'PZ',
			'PG',
			'PY',
			'YD',
			'PE',
			'PH',
			'PN',
			'PL',
			'PT',
			'PR',
			'QA',
			'RO',
			'RU',
			'RW',
			'RE',
			'BL',
			'SH',
			'KN',
			'LC',
			'MF',
			'PM',
			'VC',
			'WS',
			'SM',
			'SA',
			'SN',
			'RS',
			'CS',
			'SC',
			'SL',
			'SG',
			'SK',
			'SI',
			'SB',
			'SO',
			'ZA',
			'GS',
			'KR',
			'ES',
			'LK',
			'SD',
			'SR',
			'SJ',
			'SZ',
			'SE',
			'CH',
			'SY',
			'ST',
			'TW',
			'TJ',
			'TZ',
			'TH',
			'TL',
			'TG',
			'TK',
			'TO',
			'TT',
			'TN',
			'TR',
			'TM',
			'TC',
			'TV',
			'UM',
			'PU',
			'VI',
			'UG',
			'UA',
			'SU',
			'AE',
			'GB',
			'US',
			'ZZ',
			'UY',
			'UZ',
			'VU',
			'VA',
			'VE',
			'VN',
			'WK',
			'WF',
			'EH',
			'YE',
			'ZM',
			'ZW',
			'AX',
		];

		$this->defaultTranslations = [
			'AF' => 'Afghanistan',
			'AL' => 'Albania',
			'DZ' => 'Algeria',
			'AS' => 'American Samoa',
			'AD' => 'Andorra',
			'AO' => 'Angola',
			'AI' => 'Anguilla',
			'AQ' => 'Antarctica',
			'AG' => 'Antigua and Barbuda',
			'AR' => 'Argentina',
			'AM' => 'Armenia',
			'AW' => 'Aruba',
			'AU' => 'Australia',
			'AT' => 'Austria',
			'AZ' => 'Azerbaijan',
			'BS' => 'Bahamas',
			'BH' => 'Bahrain',
			'BD' => 'Bangladesh',
			'BB' => 'Barbados',
			'BY' => 'Belarus',
			'BE' => 'Belgium',
			'BZ' => 'Belize',
			'BJ' => 'Benin',
			'BM' => 'Bermuda',
			'BT' => 'Bhutan',
			'BO' => 'Bolivia',
			'BA' => 'Bosnia and Herzegovina',
			'BW' => 'Botswana',
			'BV' => 'Bouvet Island',
			'BR' => 'Brazil',
			'BQ' => 'British Antarctic Territory',
			'IO' => 'British Indian Ocean Territory',
			'VG' => 'British Virgin Islands',
			'BN' => 'Brunei',
			'BG' => 'Bulgaria',
			'BF' => 'Burkina Faso',
			'BI' => 'Burundi',
			'KH' => 'Cambodia',
			'CM' => 'Cameroon',
			'CA' => 'Canada',
			'CT' => 'Canton and Enderbury Islands',
			'CV' => 'Cape Verde',
			'KY' => 'Cayman Islands',
			'CF' => 'Central African Republic',
			'TD' => 'Chad',
			'CL' => 'Chile',
			'CN' => 'China',
			'CX' => 'Christmas Island',
			'CC' => 'Cocos [Keeling] Islands',
			'CO' => 'Colombia',
			'KM' => 'Comoros',
			'CG' => 'Congo - Brazzaville',
			'CD' => 'Congo - Kinshasa',
			'CK' => 'Cook Islands',
			'CR' => 'Costa Rica',
			'HR' => 'Croatia',
			'CU' => 'Cuba',
			'CY' => 'Cyprus',
			'CZ' => 'Czech Republic',
			'CI' => 'Côte d’Ivoire',
			'DK' => 'Denmark',
			'DJ' => 'Djibouti',
			'DM' => 'Dominica',
			'DO' => 'Dominican Republic',
			'NQ' => 'Dronning Maud Land',
			'DD' => 'East Germany',
			'EC' => 'Ecuador',
			'EG' => 'Egypt',
			'SV' => 'El Salvador',
			'GQ' => 'Equatorial Guinea',
			'ER' => 'Eritrea',
			'EE' => 'Estonia',
			'ET' => 'Ethiopia',
			'FK' => 'Falkland Islands',
			'FO' => 'Faroe Islands',
			'FJ' => 'Fiji',
			'FI' => 'Finland',
			'FR' => 'France',
			'GF' => 'French Guiana',
			'PF' => 'French Polynesia',
			'TF' => 'French Southern Territories',
			'FQ' => 'French Southern and Antarctic Territories',
			'GA' => 'Gabon',
			'GM' => 'Gambia',
			'GE' => 'Georgia',
			'DE' => 'Germany',
			'GH' => 'Ghana',
			'GI' => 'Gibraltar',
			'GR' => 'Greece',
			'GL' => 'Greenland',
			'GD' => 'Grenada',
			'GP' => 'Guadeloupe',
			'GU' => 'Guam',
			'GT' => 'Guatemala',
			'GG' => 'Guernsey',
			'GN' => 'Guinea',
			'GW' => 'Guinea-Bissau',
			'GY' => 'Guyana',
			'HT' => 'Haiti',
			'HM' => 'Heard Island and McDonald Islands',
			'HN' => 'Honduras',
			'HK' => 'Hong Kong SAR China',
			'HU' => 'Hungary',
			'IS' => 'Iceland',
			'IN' => 'India',
			'ID' => 'Indonesia',
			'IR' => 'Iran',
			'IQ' => 'Iraq',
			'IE' => 'Ireland',
			'IM' => 'Isle of Man',
			'IL' => 'Israel',
			'IT' => 'Italy',
			'JM' => 'Jamaica',
			'JP' => 'Japan',
			'JE' => 'Jersey',
			'JT' => 'Johnston Island',
			'JO' => 'Jordan',
			'KZ' => 'Kazakhstan',
			'KE' => 'Kenya',
			'KI' => 'Kiribati',
			'KW' => 'Kuwait',
			'KG' => 'Kyrgyzstan',
			'LA' => 'Laos',
			'LV' => 'Latvia',
			'LB' => 'Lebanon',
			'LS' => 'Lesotho',
			'LR' => 'Liberia',
			'LY' => 'Libya',
			'LI' => 'Liechtenstein',
			'LT' => 'Lithuania',
			'LU' => 'Luxembourg',
			'MO' => 'Macau SAR China',
			'MK' => 'Macedonia',
			'MG' => 'Madagascar',
			'MW' => 'Malawi',
			'MY' => 'Malaysia',
			'MV' => 'Maldives',
			'ML' => 'Mali',
			'MT' => 'Malta',
			'MH' => 'Marshall Islands',
			'MQ' => 'Martinique',
			'MR' => 'Mauritania',
			'MU' => 'Mauritius',
			'YT' => 'Mayotte',
			'FX' => 'Metropolitan France',
			'MX' => 'Mexico',
			'FM' => 'Micronesia',
			'MI' => 'Midway Islands',
			'MD' => 'Moldova',
			'MC' => 'Monaco',
			'MN' => 'Mongolia',
			'ME' => 'Montenegro',
			'MS' => 'Montserrat',
			'MA' => 'Morocco',
			'MZ' => 'Mozambique',
			'MM' => 'Myanmar [Burma]',
			'NA' => 'Namibia',
			'NR' => 'Nauru',
			'NP' => 'Nepal',
			'NL' => 'Netherlands',
			'AN' => 'Netherlands Antilles',
			'NT' => 'Neutral Zone',
			'NC' => 'New Caledonia',
			'NZ' => 'New Zealand',
			'NI' => 'Nicaragua',
			'NE' => 'Niger',
			'NG' => 'Nigeria',
			'NU' => 'Niue',
			'NF' => 'Norfolk Island',
			'KP' => 'North Korea',
			'VD' => 'North Vietnam',
			'MP' => 'Northern Mariana Islands',
			'NO' => 'Norway',
			'OM' => 'Oman',
			'PC' => 'Pacific Islands Trust Territory',
			'PK' => 'Pakistan',
			'PW' => 'Palau',
			'PS' => 'Palestinian Territories',
			'PA' => 'Panama',
			'PZ' => 'Panama Canal Zone',
			'PG' => 'Papua New Guinea',
			'PY' => 'Paraguay',
			'YD' => 'People\'s Democratic Republic of Yemen',
			'PE' => 'Peru',
			'PH' => 'Philippines',
			'PN' => 'Pitcairn Islands',
			'PL' => 'Poland',
			'PT' => 'Portugal',
			'PR' => 'Puerto Rico',
			'QA' => 'Qatar',
			'RO' => 'Romania',
			'RU' => 'Russia',
			'RW' => 'Rwanda',
			'RE' => 'Réunion',
			'BL' => 'Saint Barthélemy',
			'SH' => 'Saint Helena',
			'KN' => 'Saint Kitts and Nevis',
			'LC' => 'Saint Lucia',
			'MF' => 'Saint Martin',
			'PM' => 'Saint Pierre and Miquelon',
			'VC' => 'Saint Vincent and the Grenadines',
			'WS' => 'Samoa',
			'SM' => 'San Marino',
			'SA' => 'Saudi Arabia',
			'SN' => 'Senegal',
			'RS' => 'Serbia',
			'CS' => 'Serbia and Montenegro',
			'SC' => 'Seychelles',
			'SL' => 'Sierra Leone',
			'SG' => 'Singapore',
			'SK' => 'Slovakia',
			'SI' => 'Slovenia',
			'SB' => 'Solomon Islands',
			'SO' => 'Somalia',
			'ZA' => 'South Africa',
			'GS' => 'South Georgia and the South Sandwich Islands',
			'KR' => 'South Korea',
			'ES' => 'Spain',
			'LK' => 'Sri Lanka',
			'SD' => 'Sudan',
			'SR' => 'Suriname',
			'SJ' => 'Svalbard and Jan Mayen',
			'SZ' => 'Swaziland',
			'SE' => 'Sweden',
			'CH' => 'Switzerland',
			'SY' => 'Syria',
			'ST' => 'São Tomé and Príncipe',
			'TW' => 'Taiwan',
			'TJ' => 'Tajikistan',
			'TZ' => 'Tanzania',
			'TH' => 'Thailand',
			'TL' => 'Timor-Leste',
			'TG' => 'Togo',
			'TK' => 'Tokelau',
			'TO' => 'Tonga',
			'TT' => 'Trinidad and Tobago',
			'TN' => 'Tunisia',
			'TR' => 'Turkey',
			'TM' => 'Turkmenistan',
			'TC' => 'Turks and Caicos Islands',
			'TV' => 'Tuvalu',
			'UM' => 'U.S. Minor Outlying Islands',
			'PU' => 'U.S. Miscellaneous Pacific Islands',
			'VI' => 'U.S. Virgin Islands',
			'UG' => 'Uganda',
			'UA' => 'Ukraine',
			'SU' => 'Union of Soviet Socialist Republics',
			'AE' => 'United Arab Emirates',
			'GB' => 'United Kingdom',
			'US' => 'United States',
			'ZZ' => 'Unknown or Invalid Region',
			'UY' => 'Uruguay',
			'UZ' => 'Uzbekistan',
			'VU' => 'Vanuatu',
			'VA' => 'Vatican City',
			'VE' => 'Venezuela',
			'VN' => 'Vietnam',
			'WK' => 'Wake Island',
			'WF' => 'Wallis and Futuna',
			'EH' => 'Western Sahara',
			'YE' => 'Yemen',
			'ZM' => 'Zambia',
			'ZW' => 'Zimbabwe',
			'AX' => 'Åland Islands',
		];
	}

	public function setTranslator(\Symfony\Component\Translation\TranslatorInterface $translator) {
		$this->translator = $translator;
		return $this;
	}

	public function trans($name) {
		if($this->translator) {
			$res = $this->translator->trans('intl.countries.'.$name);
			if($res !== 'intl.countries.'.$name)
				return $res;
		}
		if(isset($this->defaultTranslations[$name]))
			return $this->defaultTranslations[$name];
		else
			return $name;
	}

	public function setCountryNames(array $names) {
		$this->countryNames = $names;
		return $this;
	}

	public function getCountryNames() {
		$names = [];
		foreach($this->countryNames as $v)
			$names[$v] = $this->trans($v);
		uasort($names, function($a, $b) {
			return \Asgard\Common\Tools::removeAccents($a) > \Asgard\Common\Tools::removeAccents($b);
		});
		return $names;
	}
}
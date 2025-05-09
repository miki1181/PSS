<?php
//============================================================+
// File name   : html_entity_decode_php4.php
// Begin       : 2006-06-22
// Last Update : 2006-06-22
// Author      : Nicola Asuni
// Version     : 1.0.000
// License     : GNU LGPL (http://www.gnu.org/copyleft/lesser.html)
//
// Description : This is a PHP4 function that redefine the
//               standard html_entity_decode function to support
//               UTF-8 encoding.
//
//============================================================+

/**
 * TCPDF Class.
 * @package com.tecnick.tcpdf
 */


/**
 * Returns the UTF-8 string corresponding to unicode value.
 *
 * @ignore
 * @param $num unicode value to convert.
 * @return string converted
 */
function __code_to_utf8($num) {
  if ($num <= 0x7F) {
        $ord = $num[1];
        if (preg_match('/^x([0-9a-f]+)$/i', $ord, $match))
        {
            $ord = hexdec($match[1]);
        }
        else
        {
            $ord = intval($ord);
        }

        $no_bytes = 0;
        $byte = [];
  
    if($ord < 128) { return chr($ord); }
  
    if ($ord < 2048)
    {
        $no_bytes = 2;
    }
    elseif ($ord < 65536)
    {
        $no_bytes = 3;
    }
    elseif ($ord < 1114112)
    {
        $no_bytes = 4;
    }
    else
    {
        return '';
    }
  
    switch($no_bytes)
        {
            case 2:
            {
                $prefix = [31, 192];
                break;
            }
            case 3:
            {
                $prefix = [15, 224];
                break;
            }
            case 4:
            {
                $prefix = [7, 240];
            }
        }

        for ($i = 0; $i < $no_bytes; $i++)
        {
            $byte[$no_bytes - $i - 1] = (($ord & (63 * (2 ** (6 * $i)))) / (2 ** (6 * $i))) & 63 | 128;
        }

        $byte[0] = ($byte[0] & $prefix[0]) | $prefix[1];

        $ret = '';
        for ($i = 0; $i < $no_bytes; $i++)
        {
            $ret .= chr($byte[$i]);
        }

        return $ret;
    }
}

/**
 * Reverse function for htmlentities.
 * Convert entities in UTF-8.
 *
 * @param $text_to_convert Text to convert.
 * @return string converted
 */
//function html_entity_decode_php4($text_to_convert) {
function cms_html_entity_decode($text_to_convert) {
  $htmlentities_table = [
    '&Aacute;' => ''.chr(195).chr(129).'',
    '&aacute;' => ''.chr(195).chr(161).'',
    '&Acirc;' => ''.chr(195).chr(130).'',
    '&acirc;' => ''.chr(195).chr(162).'',
    '&acute;' => ''.chr(194).chr(180).'',
    '&AElig;' => ''.chr(195).chr(134).'',
    '&aelig;' => ''.chr(195).chr(166).'',
    '&Agrave;' => ''.chr(195).chr(128).'',
    '&agrave;' => ''.chr(195).chr(160).'',
    '&alefsym;' => ''.chr(226).chr(132).chr(181).'',
    '&Alpha;' => ''.chr(206).chr(145).'',
    '&alpha;' => ''.chr(206).chr(177).'',
    '&amp;' => ''.chr(38).'',
    '&and;' => ''.chr(226).chr(136).chr(167).'',
    '&ang;' => ''.chr(226).chr(136).chr(160).'',
    '&Aring;' => ''.chr(195).chr(133).'',
    '&aring;' => ''.chr(195).chr(165).'',
    '&asymp;' => ''.chr(226).chr(137).chr(136).'',
    '&Atilde;' => ''.chr(195).chr(131).'',
    '&atilde;' => ''.chr(195).chr(163).'',
    '&Auml;' => ''.chr(195).chr(132).'',
    '&auml;' => ''.chr(195).chr(164).'',
    '&bdquo;' => ''.chr(226).chr(128).chr(158).'',
    '&Beta;' => ''.chr(206).chr(146).'',
    '&beta;' => ''.chr(206).chr(178).'',
    '&brvbar;' => ''.chr(194).chr(166).'',
    '&bull;' => ''.chr(226).chr(128).chr(162).'',
    '&cap;' => ''.chr(226).chr(136).chr(169).'',
    '&Ccedil;' => ''.chr(195).chr(135).'',
    '&ccedil;' => ''.chr(195).chr(167).'',
    '&cedil;' => ''.chr(194).chr(184).'',
    '&cent;' => ''.chr(194).chr(162).'',
    '&Chi;' => ''.chr(206).chr(167).'',
    '&chi;' => ''.chr(207).chr(135).'',
    '&circ;' => ''.chr(203).chr(134).'',
    '&clubs;' => ''.chr(226).chr(153).chr(163).'',
    '&cong;' => ''.chr(226).chr(137).chr(133).'',
    '&copy;' => ''.chr(194).chr(169).'',
    '&crarr;' => ''.chr(226).chr(134).chr(181).'',
    '&cup;' => ''.chr(226).chr(136).chr(170).'',
    '&curren;' => ''.chr(194).chr(164).'',
    '&dagger;' => ''.chr(226).chr(128).chr(160).'',
    '&Dagger;' => ''.chr(226).chr(128).chr(161).'',
    '&darr;' => ''.chr(226).chr(134).chr(147).'',
    '&dArr;' => ''.chr(226).chr(135).chr(147).'',
    '&deg;' => ''.chr(194).chr(176).'',
    '&Delta;' => ''.chr(206).chr(148).'',
    '&delta;' => ''.chr(206).chr(180).'',
    '&diams;' => ''.chr(226).chr(153).chr(166).'',
    '&divide;' => ''.chr(195).chr(183).'',
    '&Eacute;' => ''.chr(195).chr(137).'',
    '&eacute;' => ''.chr(195).chr(169).'',
    '&Ecirc;' => ''.chr(195).chr(138).'',
    '&ecirc;' => ''.chr(195).chr(170).'',
    '&Egrave;' => ''.chr(195).chr(136).'',
    '&egrave;' => ''.chr(195).chr(168).'',
    '&empty;' => ''.chr(226).chr(136).chr(133).'',
    '&emsp;' => ''.chr(226).chr(128).chr(131).'',
    '&ensp;' => ''.chr(226).chr(128).chr(130).'',
    '&Epsilon;' => ''.chr(206).chr(149).'',
    '&epsilon;' => ''.chr(206).chr(181).'',
    '&equiv;' => ''.chr(226).chr(137).chr(161).'',
    '&Eta;' => ''.chr(206).chr(151).'',
    '&eta;' => ''.chr(206).chr(183).'',
    '&ETH;' => ''.chr(195).chr(144).'',
    '&eth;' => ''.chr(195).chr(176).'',
    '&Euml;' => ''.chr(195).chr(139).'',
    '&euml;' => ''.chr(195).chr(171).'',
    '&euro;' => ''.chr(226).chr(130).chr(172).'',
    '&exist;' => ''.chr(226).chr(136).chr(131).'',
    '&fnof;' => ''.chr(198).chr(146).'',
    '&forall;' => ''.chr(226).chr(136).chr(128).'',
    '&frac12;' => ''.chr(194).chr(189).'',
    '&frac14;' => ''.chr(194).chr(188).'',
    '&frac34;' => ''.chr(194).chr(190).'',
    '&frasl;' => ''.chr(226).chr(129).chr(132).'',
    '&Gamma;' => ''.chr(206).chr(147).'',
    '&gamma;' => ''.chr(206).chr(179).'',
    '&ge;' => ''.chr(226).chr(137).chr(165).'',
    '&harr;' => ''.chr(226).chr(134).chr(148).'',
    '&hArr;' => ''.chr(226).chr(135).chr(148).'',
    '&hearts;' => ''.chr(226).chr(153).chr(165).'',
    '&hellip;' => ''.chr(226).chr(128).chr(166).'',
    '&Iacute;' => ''.chr(195).chr(141).'',
    '&iacute;' => ''.chr(195).chr(173).'',
    '&Icirc;' => ''.chr(195).chr(142).'',
    '&icirc;' => ''.chr(195).chr(174).'',
    '&iexcl;' => ''.chr(194).chr(161).'',
    '&Igrave;' => ''.chr(195).chr(140).'',
    '&igrave;' => ''.chr(195).chr(172).'',
    '&image;' => ''.chr(226).chr(132).chr(145).'',
    '&infin;' => ''.chr(226).chr(136).chr(158).'',
    '&int;' => ''.chr(226).chr(136).chr(171).'',
    '&Iota;' => ''.chr(206).chr(153).'',
    '&iota;' => ''.chr(206).chr(185).'',
    '&iquest;' => ''.chr(194).chr(191).'',
    '&isin;' => ''.chr(226).chr(136).chr(136).'',
    '&Iuml;' => ''.chr(195).chr(143).'',
    '&iuml;' => ''.chr(195).chr(175).'',
    '&Kappa;' => ''.chr(206).chr(154).'',
    '&kappa;' => ''.chr(206).chr(186).'',
    '&Lambda;' => ''.chr(206).chr(155).'',
    '&lambda;' => ''.chr(206).chr(187).'',
    '&lang;' => ''.chr(226).chr(140).chr(169).'',
    '&laquo;' => ''.chr(194).chr(171).'',
    '&larr;' => ''.chr(226).chr(134).chr(144).'',
    '&lArr;' => ''.chr(226).chr(135).chr(144).'',
    '&lceil;' => ''.chr(226).chr(140).chr(136).'',
    '&ldquo;' => ''.chr(226).chr(128).chr(156).'',
    '&le;' => ''.chr(226).chr(137).chr(164).'',
    '&lfloor;' => ''.chr(226).chr(140).chr(138).'',
    '&lowast;' => ''.chr(226).chr(136).chr(151).'',
    '&loz;' => ''.chr(226).chr(151).chr(138).'',
    '&lrm;' => ''.chr(226).chr(128).chr(142).'',
    '&lsaquo;' => ''.chr(226).chr(128).chr(185).'',
    '&lsquo;' => ''.chr(226).chr(128).chr(152).'',
    '&macr;' => ''.chr(194).chr(175).'',
    '&mdash;' => ''.chr(226).chr(128).chr(148).'',
    '&micro;' => ''.chr(194).chr(181).'',
    '&middot;' => ''.chr(194).chr(183).'',
    '&minus;' => ''.chr(226).chr(136).chr(146).'',
    '&Mu;' => ''.chr(206).chr(156).'',
    '&mu;' => ''.chr(206).chr(188).'',
    '&nabla;' => ''.chr(226).chr(136).chr(135).'',
        //'&nbsp;' => ''.chr(194).chr(160).'', // don't actually know why (Jo Morg)
    '&nbsp;' => ''.chr(32).'',
    '&ndash;' => ''.chr(226).chr(128).chr(147).'',
    '&ne;' => ''.chr(226).chr(137).chr(160).'',
    '&ni;' => ''.chr(226).chr(136).chr(139).'',
    '&not;' => ''.chr(194).chr(172).'',
    '&notin;' => ''.chr(226).chr(136).chr(137).'',
    '&nsub;' => ''.chr(226).chr(138).chr(132).'',
    '&Ntilde;' => ''.chr(195).chr(145).'',
    '&ntilde;' => ''.chr(195).chr(177).'',
    '&Nu;' => ''.chr(206).chr(157).'',
    '&nu;' => ''.chr(206).chr(189).'',
    '&Oacute;' => ''.chr(195).chr(147).'',
    '&oacute;' => ''.chr(195).chr(179).'',
    '&Ocirc;' => ''.chr(195).chr(148).'',
    '&ocirc;' => ''.chr(195).chr(180).'',
    '&OElig;' => ''.chr(197).chr(146).'',
    '&oelig;' => ''.chr(197).chr(147).'',
    '&Ograve;' => ''.chr(195).chr(146).'',
    '&ograve;' => ''.chr(195).chr(178).'',
    '&oline;' => ''.chr(226).chr(128).chr(190).'',
    '&Omega;' => ''.chr(206).chr(169).'',
    '&omega;' => ''.chr(207).chr(137).'',
    '&Omicron;' => ''.chr(206).chr(159).'',
    '&omicron;' => ''.chr(206).chr(191).'',
    '&oplus;' => ''.chr(226).chr(138).chr(149).'',
    '&or;' => ''.chr(226).chr(136).chr(168).'',
    '&ordf;' => ''.chr(194).chr(170).'',
    '&ordm;' => ''.chr(194).chr(186).'',
    '&Oslash;' => ''.chr(195).chr(152).'',
    '&oslash;' => ''.chr(195).chr(184).'',
    '&Otilde;' => ''.chr(195).chr(149).'',
    '&otilde;' => ''.chr(195).chr(181).'',
    '&otimes;' => ''.chr(226).chr(138).chr(151).'',
    '&Ouml;' => ''.chr(195).chr(150).'',
    '&ouml;' => ''.chr(195).chr(182).'',
    '&para;' => ''.chr(194).chr(182).'',
    '&part;' => ''.chr(226).chr(136).chr(130).'',
    '&permil;' => ''.chr(226).chr(128).chr(176).'',
    '&perp;' => ''.chr(226).chr(138).chr(165).'',
    '&Phi;' => ''.chr(206).chr(166).'',
    '&phi;' => ''.chr(207).chr(134).'',
    '&Pi;' => ''.chr(206).chr(160).'',
    '&pi;' => ''.chr(207).chr(128).'',
    '&piv;' => ''.chr(207).chr(150).'',
    '&plusmn;' => ''.chr(194).chr(177).'',
    '&pound;' => ''.chr(194).chr(163).'',
    '&prime;' => ''.chr(226).chr(128).chr(178).'',
    '&Prime;' => ''.chr(226).chr(128).chr(179).'',
    '&prod;' => ''.chr(226).chr(136).chr(143).'',
    '&prop;' => ''.chr(226).chr(136).chr(157).'',
    '&Psi;' => ''.chr(206).chr(168).'',
    '&psi;' => ''.chr(207).chr(136).'',
    '&radic;' => ''.chr(226).chr(136).chr(154).'',
    '&rang;' => ''.chr(226).chr(140).chr(170).'',
    '&raquo;' => ''.chr(194).chr(187).'',
    '&rarr;' => ''.chr(226).chr(134).chr(146).'',
    '&rArr;' => ''.chr(226).chr(135).chr(146).'',
    '&rceil;' => ''.chr(226).chr(140).chr(137).'',
    '&rdquo;' => ''.chr(226).chr(128).chr(157).'',
    '&real;' => ''.chr(226).chr(132).chr(156).'',
    '&reg;' => ''.chr(194).chr(174).'',
    '&rfloor;' => ''.chr(226).chr(140).chr(139).'',
    '&Rho;' => ''.chr(206).chr(161).'',
    '&rho;' => ''.chr(207).chr(129).'',
    '&rlm;' => ''.chr(226).chr(128).chr(143).'',
    '&rsaquo;' => ''.chr(226).chr(128).chr(186).'',
    '&rsquo;' => ''.chr(226).chr(128).chr(153).'',
    '&sbquo;' => ''.chr(226).chr(128).chr(154).'',
    '&Scaron;' => ''.chr(197).chr(160).'',
    '&scaron;' => ''.chr(197).chr(161).'',
    '&sdot;' => ''.chr(226).chr(139).chr(133).'',
    '&sect;' => ''.chr(194).chr(167).'',
    '&shy;' => ''.chr(194).chr(173).'',
    '&Sigma;' => ''.chr(206).chr(163).'',
    '&sigma;' => ''.chr(207).chr(131).'',
    '&sigmaf;' => ''.chr(207).chr(130).'',
    '&sim;' => ''.chr(226).chr(136).chr(188).'',
    '&spades;' => ''.chr(226).chr(153).chr(160).'',
    '&sub;' => ''.chr(226).chr(138).chr(130).'',
    '&sube;' => ''.chr(226).chr(138).chr(134).'',
    '&sum;' => ''.chr(226).chr(136).chr(145).'',
    '&sup1;' => ''.chr(194).chr(185).'',
    '&sup2;' => ''.chr(194).chr(178).'',
    '&sup3;' => ''.chr(194).chr(179).'',
    '&sup;' => ''.chr(226).chr(138).chr(131).'',
    '&supe;' => ''.chr(226).chr(138).chr(135).'',
    '&szlig;' => ''.chr(195).chr(159).'',
    '&Tau;' => ''.chr(206).chr(164).'',
    '&tau;' => ''.chr(207).chr(132).'',
    '&there4;' => ''.chr(226).chr(136).chr(180).'',
    '&Theta;' => ''.chr(206).chr(152).'',
    '&theta;' => ''.chr(206).chr(184).'',
    '&thetasym;' => ''.chr(207).chr(145).'',
    '&thinsp;' => ''.chr(226).chr(128).chr(137).'',
    '&THORN;' => ''.chr(195).chr(158).'',
    '&thorn;' => ''.chr(195).chr(190).'',
    '&tilde;' => ''.chr(203).chr(156).'',
    '&times;' => ''.chr(195).chr(151).'',
    '&trade;' => ''.chr(226).chr(132).chr(162).'',
    '&Uacute;' => ''.chr(195).chr(154).'',
    '&uacute;' => ''.chr(195).chr(186).'',
    '&uarr;' => ''.chr(226).chr(134).chr(145).'',
    '&uArr;' => ''.chr(226).chr(135).chr(145).'',
    '&Ucirc;' => ''.chr(195).chr(155).'',
    '&ucirc;' => ''.chr(195).chr(187).'',
    '&Ugrave;' => ''.chr(195).chr(153).'',
    '&ugrave;' => ''.chr(195).chr(185).'',
    '&uml;' => ''.chr(194).chr(168).'',
    '&upsih;' => ''.chr(207).chr(146).'',
    '&Upsilon;' => ''.chr(206).chr(165).'',
    '&upsilon;' => ''.chr(207).chr(133).'',
    '&Uuml;' => ''.chr(195).chr(156).'',
    '&uuml;' => ''.chr(195).chr(188).'',
    '&weierp;' => ''.chr(226).chr(132).chr(152).'',
    '&Xi;' => ''.chr(206).chr(158).'',
    '&xi;' => ''.chr(206).chr(190).'',
    '&Yacute;' => ''.chr(195).chr(157).'',
    '&yacute;' => ''.chr(195).chr(189).'',
    '&yen;' => ''.chr(194).chr(165).'',
    '&yuml;' => ''.chr(195).chr(191).'',
    '&Yuml;' => ''.chr(197).chr(184).'',
    '&Zeta;' => ''.chr(206).chr(150).'',
    '&zeta;' => ''.chr(206).chr(182).'',
    '&zwj;' => ''.chr(226).chr(128).chr(141).'',
    '&zwnj;' => ''.chr(226).chr(128).chr(140).'',
    '&quot;' => '\'',
    '&gt;' => '>',
    '&lt;' => '<'
  ];

  $return_text = html_entity_decode((string)$text_to_convert, (ENT_QUOTES | ENT_HTML5), 'UTF-8');

  # just to be on the safe side if html_entity_decode still missed something
  # and also converts &nbsp; to chr(32) which seems correct (Jo Morg)
  $return_text = strtr($return_text, $htmlentities_table);

  // convert hex, and numeric entities to their character values.
  $return_text = preg_replace_callback('~&#x([0-9a-f]+);~i', function( array $matches ) {
          return __code_to_utf8( $matches[1] );
      }, $return_text );
  $return_text = preg_replace_callback('~&#([0-9]+);~', static function(array $matches ) {
          return __code_to_utf8( $matches[1] );
      }, $return_text );

  return $return_text;
}

// EOF
?>

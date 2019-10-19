<?php

namespace Faker\Provider\nl_NL;

class Company extends \Faker\Provider\Company
{
    protected static $formats = array(
        '{{lastName}} {{companySuffix}}',
        '{{lastName}} {{lastName}} {{companySuffix}}',
        '{{lastName}}',
        '{{lastName}}',
    );

    protected static $companySuffix = array('VOF', 'CV', 'LLP', 'BV', 'NV', 'IBC', 'CSL', 'EESV', 'SE', 'CV', 'Stichting', '& Zonen', '& Zn');

    /**
     * Alias dutch vat number format
     */
    public static function btw()
    {
        return self::vat();
    }

    /**
     * Belasting Toegevoegde Waarde (BTW) = VAT
     *
     * @return string VAT Number
     * @see (dutch) http://www.belastingdienst.nl/wps/wcm/connect/bldcontentnl/belastingdienst/zakelijk/btw/administratie_bijhouden/btw_nummers_controleren/uw_btw_nummer
     *
     *
     * @example 'NL123456789B01'
     *
     */
    public static function vat()
    {
        return sprintf("%s%d%s%d", 'NL', self::randomNumber(9, true), 'B', self::randomNumber(2, true));

    }
}

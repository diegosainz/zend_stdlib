<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_InfoCard
 * @subpackage Zend_InfoCard_Xml_Security
 * @copyright  Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id$
 */

/**
 * A Transform to perform C14n XML Exclusive Canonicalization
 *
 * @uses       DOMDocument
 * @uses       Zend_InfoCard_Xml_Security_Transform_Exception
 * @uses       Zend_InfoCard_Xml_Security_Transform_Interface
 * @category   Zend
 * @package    Zend_InfoCard
 * @subpackage Zend_InfoCard_Xml_Security
 * @copyright  Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_InfoCard_Xml_Security_Transform_XmlExcC14N
    implements Zend_InfoCard_Xml_Security_Transform_Interface
{
    /**
     * Transform the input XML based on C14n XML Exclusive Canonicalization rules
     *
     * @throws Zend_InfoCard_Xml_Security_Transform_Exception
     * @param string $strXMLData The input XML
     * @return string The output XML
     */
    public function transform($strXMLData)
    {
        $dom = new DOMDocument();
        $dom->loadXML($strXMLData);

        if(method_exists($dom, 'C14N')) {
            return $dom->C14N(true, false);
        }

        throw new Zend_InfoCard_Xml_Security_Transform_Exception("This transform requires the C14N() method to exist in the DOM extension");
    }
}

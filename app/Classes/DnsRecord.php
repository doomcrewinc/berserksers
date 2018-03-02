<?php
/**
 * Created by PhpStorm.
 * User: drupp
 * Date: 2/27/2018
 * Time: 2:56 PM
 */

namespace App\Classes;


class RecordHandler
{
    protected $search;
    protected $is_domain;
    protected $is_ip;

    protected $mapped_options = [
        'a'     => DNS_A,
        'aaaa'  => DNS_AAAA,
        'mx'    => DNS_MX,
        'ns'    => DNS_NS,
        'soa'   => DNS_SOA,
        'txt'   => DNS_TXT,
        'srv'   => DNS_SRV,
        'cname' => DNS_CNAME
    ];

    /**
     * RecordHandler constructor.
     * @param $input
     */
    public function __construct($input) {
        $this->search       = $input;
        $this->is_domain    = is_domain($input);
        $this->is_ip        = is_ip($input);

        if ($this->is_ip) {
            $this->search = gethostbyaddr($this->search);
        }

    }

    public function getRecords() {
        $records = [];

        $allRecords = $this->getAll();

        if (!empty($allRecords)) {
            foreach ($allRecords as $record) {
                
            }
        }

        return $records;
    }


    /**
     * @param $recordType
     * @return array|null
     */
    public function get($recordType) {
        $dnsRecordType = $this->validRecordType($recordType);

        if (!empty($dnsRecordType)) {
            return dns_get_record($this->search, $dnsRecordType);
        }

        return null;
    }

    protected function getAll() {
        return dns_get_record($this->search, DNS_ALL);
    }

    protected function validRecordType($recordType) {
        return !empty($mapped_options[$recordType]);
    }
}
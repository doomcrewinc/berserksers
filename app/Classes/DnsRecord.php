<?php

namespace App\Classes;

class DnsRecord
{
    protected $search;

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
     *
     * @param $request
     */
    public function __construct($request) {
        $search = $request->getParam('search');

        if (is_ip($search)) {
            $search = gethostbyaddr($search);
        }

        $this->search = strip_scheme($search);
    }

    /**
     * Gets all DNS records and only maps the records we allow to be returned.
     *
     * @return array
     */
    public function getRecords() {
        $records    = [];
        $allRecords = $this->getAll();

        if (!empty($allRecords)) {
            foreach ($allRecords as $record) {
                $type = strtolower($record['type']);
                if (!empty($this->mapped_options[$type])) {
                    $records[] = $record;
                }
            }
        }

        return $records;
    }


    /**
     * Get a single record type
     *
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

    /**
     * Get all DNS records for a domain
     *
     * @return array
     */
    protected function getAll() {
        return dns_get_record($this->search, DNS_ALL);
    }

    /**
     * Check the requested record type is one we allow
     *
     * @param $recordType
     * @return bool
     */
    protected function validRecordType($recordType) {
        return !empty($this->mapped_options[$recordType]);
    }
}
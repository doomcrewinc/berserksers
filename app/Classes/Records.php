<?php
/**
 * Created by PhpStorm.
 * User: drupp
 * Date: 2/27/2018
 * Time: 2:56 PM
 */

namespace App\Classes;


class Records
{
    private $is_domain;

    private $is_ip;

    private $mapped_options = [
        'a'     => DNS_A,
        'aaaa'  => DNS_AAAA,
        'mx'    => DNS_MX,
        'ns'    => DNS_NS,
        'soa'   => DNS_SOA,
        'txt'   => DNS_TXT,
        'srv'   => DNS_SRV,
        'cname' => DNS_CNAME
    ];

    public function __construct($domain) {
        $this->is_domain    = false;
        $this->is_ip        = false;
    }


    public function getA() {

    }

    public function getAaaa() {

    }

    public function getMX() {

    }

    public function getNS() {

    }

    public function getSoa() {

    }

    public function getTxt() {

    }

    public function getSrv() {

    }

    public function getCname() {

    }
}
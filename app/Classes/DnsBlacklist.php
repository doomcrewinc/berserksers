<?php

namespace App\Classes;

class DnsBlacklist
{
    protected $ip;

    protected $dnsbl = [
      'all.s5h.net',	'b.barracudacentral.org', 'bl.emailbasura.org',
      'bl.spamcannibal.org',	'bl.spamcop.net',	'blacklist.woody.ch',
      'bogons.cymru.com',	'cbl.abuseat.org',	'cdl.anti-spam.org.cn',
      'combined.abuse.ch',	'db.wpbl.info',	'dnsbl-1.uceprotect.net',
      'dnsbl-2.uceprotect.net',	'dnsbl-3.uceprotect.net',	'dnsbl.anticaptcha.net',
      'dnsbl.cyberlogic.net',	'dnsbl.dronebl.org',	'dnsbl.inps.de',
      'dnsbl.sorbs.net',	'dnsbl.spfbl.net',	'drone.abuse.ch',
      'duinv.aupads.org',	'dul.dnsbl.sorbs.net',	'dyna.spamrats.com',
      'dynip.rothen.com',	'exitnodes.tor.dnsbl.sectoor.de',	'http.dnsbl.sorbs.net',
      'ips.backscatterer.org',	'ix.dnsbl.manitu.net',	'korea.services.net',
      'misc.dnsbl.sorbs.net',	'noptr.spamrats.com',	'orvedb.aupads.org',
      'pbl.spamhaus.org',	'proxy.bl.gweep.ca',	'psbl.surriel.com',
      'relays.bl.gweep.ca',	'relays.nether.net',	'sbl.spamhaus.org',
      'short.rbl.jp',	'singular.ttk.pte.hu',	'smtp.dnsbl.sorbs.net',
      'socks.dnsbl.sorbs.net',	'spam.abuse.ch',	'spam.dnsbl.anonmails.de',
      'spam.dnsbl.sorbs.net',	'spam.spamrats.com',	'spambot.bls.digibase.ca',
      'spamrbl.imp.ch',	'spamsources.fabel.dk',	'ubl.lashback.com',
      'ubl.unsubscore.com'	'virus.rbl.jp'	'web.dnsbl.sorbs.net',
      'wormrbl.imp.ch',	'xbl.spamhaus.org',	'z.mailspike.net',
      'zen.spamhaus.org',	'zombie.dnsbl.sorbs.net'
    ];

    public function __construct($string) {
        $ip = '';

        if (is_domain($string)) {
            $ip = gethostbyname($string);
        }

        $this->ip = $ip;
    }

    public function isBlacklisted() {
        $reverse_ip = implode(".", array_reverse(explode(".", $this->ip)));

        if ($this->checkBlacklists($reverse_ip)) {
            return $this->blacklisted;
        }
        return false;
    }

    protected function checkBlacklists() {
        $blacklisted = [];

        foreach ($this->dnsbl as $bl) {
            $lookup = $reverse_ip . "." . $bl;
            $result = gethostbyname($lookup)
            if ($result == $lookup) {
                $blacklisted[] = $bl;
            }
        }
    }

}
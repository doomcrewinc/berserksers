<?php

namespace App\Classes\Dns;

use Slim\Http\Request;

class Blacklist
{
    protected $ip = '';
    protected $server = '';

    protected $blacklisted = [];

    protected static $dnsbl = [
      'all.s5h.net', 'b.barracudacentral.org', 'bl.emailbasura.org',
      'bl.spamcannibal.org', 'bl.spamcop.net', 'blacklist.woody.ch',
      'bogons.cymru.com', 'cbl.abuseat.org', 'cdl.anti-spam.org.cn',
      'combined.abuse.ch', 'db.wpbl.info', 'dnsbl-1.uceprotect.net',
      'dnsbl-2.uceprotect.net',	'dnsbl-3.uceprotect.net', 'dnsbl.anticaptcha.net',
      'dnsbl.cyberlogic.net', 'dnsbl.dronebl.org', 'dnsbl.inps.de',
      'dnsbl.sorbs.net', 'dnsbl.spfbl.net', 'drone.abuse.ch',
      'duinv.aupads.org', 'dul.dnsbl.sorbs.net', 'dyna.spamrats.com',
      'dynip.rothen.com', 'exitnodes.tor.dnsbl.sectoor.de', 'http.dnsbl.sorbs.net',
      'ips.backscatterer.org', 'ix.dnsbl.manitu.net', 'korea.services.net',
      'misc.dnsbl.sorbs.net', 'noptr.spamrats.com', 'orvedb.aupads.org',
      'pbl.spamhaus.org', 'proxy.bl.gweep.ca', 'psbl.surriel.com',
      'relays.bl.gweep.ca', 'relays.nether.net', 'sbl.spamhaus.org',
      'short.rbl.jp', 'singular.ttk.pte.hu', 'smtp.dnsbl.sorbs.net',
      'socks.dnsbl.sorbs.net', 'spam.abuse.ch',	'spam.dnsbl.anonmails.de',
      'spam.dnsbl.sorbs.net', 'spam.spamrats.com', 'spambot.bls.digibase.ca',
      'spamrbl.imp.ch',	'spamsources.fabel.dk', 'ubl.lashback.com',
      'ubl.unsubscore.com', 'virus.rbl.jp', 'web.dnsbl.sorbs.net',
      'wormrbl.imp.ch', 'xbl.spamhaus.org', 'z.mailspike.net',
      'zen.spamhaus.org', 'zombie.dnsbl.sorbs.net'
    ];

    /**
     * Blacklist constructor.
     * @param Request $request
     */
    public function __construct(Request $request) {
        $lookup = $request->getParam('lookup');
        $server = $request->getParam('server');

        if (is_domain($lookup)) {
            $lookup = gethostbyname($lookup);
        }

        $this->server = $server;
        $this->ip     = $lookup;
    }

    public static function returnList() {
        return self::$dnsbl;
    }

    public function checkIfBlacklisted() {
        $lookup = implode(".", array_reverse(explode(".", $this->ip))) . '.' . $this->server . '.';
        $result = checkdnsrr ($lookup, "A");

        return [
            'lookup'      => $lookup,
            'server'      => $this->server,
            'blacklisted' => ($result) ? true :  false
        ];
    }
}

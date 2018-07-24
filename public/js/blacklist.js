/**
 * TODO:
 *  Set IP that we submit on the form in var.
 *  Retrieve list of dns servers from the backend via ajax and store in var.
 *  Retrieve query per blacklist with pass/failure.
 *  Show structure of table with blacklist and perhaps a progress bar/notification of pass/failure.
 *  Store the results for analytics?
 */
let dnsbl = (function($) {
    let failed = [];
    let passed = [];
    let list   = [];
    let lookup = '';

    return {
        setLookup: function(data) {
            lookup = data;
        },
        getBlackList: function() {
            $.ajax({
                url: '/api/v1/get-blacklist',
                type: 'get',
                contentType: 'application/json',
                success: function(response) {
                      if (response) {
                          list = response;
                          console.log(response);
                      }
                },
                error: function() {
                    alert('Error: Could not fetch DNS Blacklist.');
                }
            })
        },
        queryServer: function(server) {
            $.ajax({
                url: '/api/v1/query-blacklist',
                type: 'get',
                contentType: 'application/json',
                data: {
                    server: server,
                    lookup: lookup
                },
                success: function(response) {
                    console.log(response);
                    if (response && response.blacklisted === 'true') {
                        passed.push(response);
                    } else {
                        failed.push(response);
                    }
                },
                error: function() {
                    alert('Error: Could not fetch server blacklist.');
                }
            })
        },
        showTable: function() {

        },
        appendResult: function() {

        }
    }
})(jQuery);
<?php

/*
 * Copyright (C) 2020 Tobias Boehnert
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * 1. Redistributions of source code must retain the above copyright notice,
 *    this list of conditions and the following disclaimer.
 * 2. Redistributions in binary form must reproduce the above copyright
 *    notice, this list of conditions and the following disclaimer in the
 *    documentation and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED ``AS IS'' AND ANY EXPRESS OR IMPLIED WARRANTIES,
 * INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * AUTHOR BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY,
 * OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

function radsecproxy_enabled()
{
    $model = new \Muro\RadSecProxy\RadSecProxy();
    if ((string)$model->general->enabled == '1') {
        return true;
    }

    return false;
}

function radsecproxy_syslog()
{
    $logfacilities = array();
    $logfacilities['radsecproxy'] = array(
        'facility' => array('LOG_DAEMON'),
    );
    return $logfacilities;
}


function radsecproxy_services()
{
    $services = array();

    if (radsecproxy_enabled()) {
        $services[] = array(
            'description' => gettext('Radius Secure Proxy'),
            'configd' => array(
                'restart' => array('radsecproxy restart'),
                'start' => array('radsecproxy start'),
                'stop' => array('radsecproxy stop'),
            ),
            'name' => 'radsecproxy',
            'pidfile' => '/var/run/radsecproxy.pid'
        );
    }
    return $services;
}

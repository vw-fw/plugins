<?php

/*
 *    Copyright (C) 2018 Michael Muenz <m.muenz@gmail.com>
 *    All rights reserved.
 *
 *    Redistribution and use in source and binary forms, with or without
 *    modification, are permitted provided that the following conditions are met:
 *
 *    1. Redistributions of source code must retain the above copyright notice,
 *       this list of conditions and the following disclaimer.
 *
 *    2. Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *
 *    THIS SOFTWARE IS PROVIDED ``AS IS'' AND ANY EXPRESS OR IMPLIED WARRANTIES,
 *    INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 *    AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *    AUTHOR BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY,
 *    OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 *    SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 *    INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 *    CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 *    ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 *    POSSIBILITY OF SUCH DAMAGE.
 */

namespace Muro\Nut\Api;

use Muro\Base\ApiControllerBase;
use Muro\Core\Backend;
use Muro\Nut\Nut;

class DiagnosticsController extends ApiControllerBase
{
    public function upsstatusAction()
    {
        $this->sessionClose();
        $mdl = new Nut();
        $host = '127.0.0.1';
        if (!empty((string)$mdl->netclient->address)) {
            $host = (string)$mdl->netclient->address;
        }
        $upsname = 'UPSName';
        if (!empty((string)$mdl->general->name)) {
            $upsname = (string)$mdl->general->name;
        }
        $backend = new Backend();
        $response = $backend->configdpRun('nut upsstatus', array("{$upsname}@{$host}"));
        return array("response" => $response);
    }
}
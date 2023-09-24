<?php

/**
 *    Copyright (C) 2016 Frank Wall
 *    Copyright (C) 2015 Deciso B.V.
 *
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
 *
 */

namespace Muro\HAProxy\Api;

use Muro\Base\ApiControllerBase;
use Muro\Core\Backend;
use Muro\HAProxy\HAProxy;

/**
 * Class StatisticsController
 * @package Muro\HAProxy
 */
class StatisticsController extends ApiControllerBase
{
    /**
     * get info
     * @return array|mixed
     */
    public function infoAction()
    {
        $backend = new Backend();
        $responseRaw = $backend->configdRun("Primary Server Load Balancer statistics info");
        $response = json_decode($responseRaw, true);
        return $response;
    }

    /**
     * get counters
     * @return array|mixed
     */
    public function countersAction()
    {
        $backend = new Backend();
        $responseRaw = $backend->configdRun("Primary Server Load Balancer statistics stat");
        $response = json_decode($responseRaw, true);
        return $response;
    }

    /**
     * get tables
     * @return array|mixed
     */
    public function tablesAction()
    {
        $backend = new Backend();
        $responseRaw = $backend->configdRun("Primary Server Load Balancer statistics table");
        $response = json_decode($responseRaw, true);
        return $response;
    }
}
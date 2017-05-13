<?php

/**
 *
 *
 */

function firstCaptureOrEmptyString($array)
{
	if ($array || count($array) < 2)
	{
		return '';
	}

	return $array[1];
}

function DisplayDashboard()
{

	$status = new StatusMessages();

	//wlan0 info
	exec('ifconfig wlan0', $return);
	exec('iwconfig wlan0', $return);

	$strWlan0 = implode(" ", $return);
	$strWlan0 = preg_replace('/\s\s+/', ' ', $strWlan0);

	// Parse results from ifconfig/iwconfig
	preg_match('/HWaddr ([0-9a-f:]+)/i', $strWlan0, $result);
	$strHWAddress0 = firstCaptureOrEmptyString($result);
	preg_match('/Access Point: ([0-9a-f:]+)/i', $strWlan0, $result);
	$strHWAccessPoint0 = firstCaptureOrEmptyString($result);
	preg_match('/inet addr:([0-9.]+)/i', $strWlan0, $result);
	$strIPAddress0 = firstCaptureOrEmptyString($result);
	preg_match('/Mask:([0-9.]+)/i', $strWlan0, $result);
	$strNetMask0 = firstCaptureOrEmptyString($result);
	preg_match('/RX packets:(\d+)/', $strWlan0, $result);
	$strRxPackets0 = firstCaptureOrEmptyString($result);
	preg_match('/TX packets:(\d+)/', $strWlan0, $result);
	$strTxPackets0 = firstCaptureOrEmptyString($result);
	preg_match('/RX bytes:(\d+ \(\d+.\d+ [K|M|G]iB\))/i', $strWlan0, $result);
	$strRxBytes0 = firstCaptureOrEmptyString($result);
	preg_match('/TX Bytes:(\d+ \(\d+.\d+ [K|M|G]iB\))/i', $strWlan0, $result);
	$strTxBytes0 = firstCaptureOrEmptyString($result);
	preg_match('/ESSID:\"([a-zA-Z0-9\s]+)\"/i', $strWlan0, $result);
	$strSSID0 = str_replace('"', '', firstCaptureOrEmptyString($result));
	preg_match('/Access Point: ([0-9a-f:]+)/i', $strWlan0, $result);
	$strBSSID0 = firstCaptureOrEmptyString($result);
	preg_match('/Bit Rate=([0-9\.]+ Mb\/s)/i', $strWlan0, $result);
	$strBitrate0 = firstCaptureOrEmptyString($result);
	preg_match('/Tx-Power=([0-9]+ dBm)/i', $strWlan0, $result);
	$strTxPower0 = firstCaptureOrEmptyString($result);
	preg_match('/Link Quality=([0-9]+)/i', $strWlan0, $result);
	$strLinkQuality0 = firstCaptureOrEmptyString($result);
	preg_match('/Signal level=(-?[0-9]+ dBm)/i', $strWlan0, $result);
	$strSignalLevel0 = firstCaptureOrEmptyString($result);
	preg_match('/Frequency:(\d+.\d+ GHz)/i', $strWlan0, $result);
	$strFrequency0 = firstCaptureOrEmptyString($result);

	$isAccessPoint0 = strcasecmp($strHWAddress0, $strHWAccessPoint0) === 0;

	if (strpos($strWlan0, "UP") !== false && strpos($strWlan0, "RUNNING") !== false)
	{
		$status->addMessage('Interface wlan0 is up', 'success');
		$wlan0up = true;
	}
	else
	{
		$status->addMessage('Interface wlan0 is down', 'warning');
	}

	//wlan1 info
	$return = '';
	exec('ifconfig wlan1', $return);
	exec('iwconfig wlan1', $return);

	$strWlan1 = implode(" ", $return);
	$strWlan1 = preg_replace('/\s\s+/', ' ', $strWlan1);

	// Parse results from ifconfig/iwconfig
	preg_match('/HWaddr ([0-9a-f:]+)/i', $strWlan1, $result);
	$strHWAddress1 = firstCaptureOrEmptyString($result);
	preg_match('/Access Point: ([0-9a-f:]+)/i', $strWlan1, $result);
	$strHWAccessPoint1 = firstCaptureOrEmptyString($result);
	preg_match('/inet addr:([0-9.]+)/i', $strWlan1, $result);
	$strIPAddress1 = firstCaptureOrEmptyString($result);
	preg_match('/Mask:([0-9.]+)/i', $strWlan1, $result);
	$strNetMask1 = firstCaptureOrEmptyString($result);
	preg_match('/RX packets:(\d+)/', $strWlan1, $result);
	$strRxPackets1 = firstCaptureOrEmptyString($result);
	preg_match('/TX packets:(\d+)/', $strWlan1, $result);
	$strTxPackets1 = firstCaptureOrEmptyString($result);
	preg_match('/RX bytes:(\d+ \(\d+.\d+ [K|M|G]iB\))/i', $strWlan1, $result);
	$strRxBytes1 = firstCaptureOrEmptyString($result);
	preg_match('/TX Bytes:(\d+ \(\d+.\d+ [K|M|G]iB\))/i', $strWlan1, $result);
	$strTxBytes1 = firstCaptureOrEmptyString($result);
	preg_match('/ESSID:\"([a-zA-Z0-9\s]+)\"/i', $strWlan1, $result);
	$strSSID1 = str_replace('"', '', firstCaptureOrEmptyString($result));
	preg_match('/Access Point: ([0-9a-f:]+)/i', $strWlan1, $result);
	$strBSSID1 = firstCaptureOrEmptyString($result);
	preg_match('/Bit Rate=([0-9\.]+ Mb\/s)/i', $strWlan1, $result);
	$strBitrate1 = firstCaptureOrEmptyString($result);
	preg_match('/Tx-Power=([0-9]+ dBm)/i', $strWlan1, $result);
	$strTxPower1 = firstCaptureOrEmptyString($result);
	preg_match('/Link Quality=([0-9]+)/i', $strWlan1, $result);
	$strLinkQuality1 = firstCaptureOrEmptyString($result);
	preg_match('/Signal level=(-?[0-9]+ dBm)/i', $strWlan1, $result);
	$strSignalLevel1 = firstCaptureOrEmptyString($result);
	preg_match('/Frequency:(\d+.\d+ GHz)/i', $strWlan1, $result);
	$strFrequency1 = firstCaptureOrEmptyString($result);

	$isAccessPoint1 = strcasecmp($strHWAddress1, $strHWAccessPoint1) === 0;

	if (strpos($strWlan1, "UP") !== false && strpos($strWlan1, "RUNNING") !== false)
	{
		$status->addMessage('Interface wlan1 is up', 'success');
		$wlan1up = true;
	}
	else
	{
		$status->addMessage('Interface wlan1 is down', 'warning');
	}

	if (isset($_POST['ifdown_wlan0']))
	{
		exec('ifconfig wlan0 | grep -i running | wc -l', $test);
		if ($test[0] == 1)
		{
			exec('sudo ifdown wlan0', $return);
		}
		else
		{
			echo 'Interface already down';
		}
	}
    elseif (isset($_POST['ifup_wlan0']))
	{
		exec('ifconfig wlan0 | grep -i running | wc -l', $test);
		if ($test[0] == 0)
		{
			exec('sudo ifup wlan0', $return);
		}
		else
		{
			echo 'Interface already up';
		}
	}
    elseif (isset($_POST['ifdown_wlan1']))
	{
		exec('ifconfig wlan1 | grep -i running | wc -l', $test);
		if ($test[0] == 1)
		{
			exec('sudo ifdown wlan1', $return);
		}
		else
		{
			echo 'Interface already down';
		}
	}
    elseif (isset($_POST['ifup_wlan1']))
	{
		exec('ifconfig wlan1 | grep -i running | wc -l', $test);
		if ($test[0] == 0)
		{
			exec('sudo ifup wlan1', $return);
		}
		else
		{
			echo 'Interface already up';
		}
	}
	?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fa fa-dashboard fa-fw"></i> Dashboard</div>
                <div class="panel-body">
                    <p><?php $status->showMessages(); ?></p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h4>Interface Information</h4>
                                    <div class="info-item">Interface Name</div>
                                    wlan0<br/>
                                    <div class="info-item">Mode</div>
									<?php echo $isAccessPoint0 ? 'Access Point' : 'Client' ?><br/>
                                    <div class="info-item">IP Address</div>
									<?php echo $strIPAddress0 ?><br/>
                                    <div class="info-item">Subnet Mask</div>
									<?php echo $strNetMask0 ?><br/>
                                    <div class="info-item">Mac Address</div>
									<?php echo $strHWAddress0 ?><br/><br/>

                                    <h4>Interface Statistics</h4>
                                    <div class="info-item">Received Packets</div>
									<?php echo $strRxPackets0 ?><br/>
                                    <div class="info-item">Received Bytes</div>
									<?php echo $strRxBytes0 ?><br/><br/>
                                    <div class="info-item">Transferred Packets</div>
									<?php echo $strTxPackets0 ?><br/>
                                    <div class="info-item">Transferred Bytes</div>
									<?php echo $strTxBytes0 ?><br/>
                                </div><!-- /.panel-body -->
                            </div><!-- /.panel-default -->
                        </div><!-- /.col-md-6 -->

                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body wireless">
                                    <h4>Wireless Information</h4>
                                    <div class="info-item">Connected To</div>
									<?php echo $strSSID0 ?><br/>
                                    <div class="info-item">AP Mac Address</div>
									<?php echo $strBSSID0 ?><br/>
                                    <div class="info-item">Bitrate</div>
									<?php echo $strBitrate0 ?><br/>
                                    <div class="info-item">Signal Level</div>
									<?php echo $strSignalLevel0 ?><br/>
                                    <div class="info-item">Transmit Power</div>
									<?php echo $strTxPower0 ?><br/>
                                    <div class="info-item">Frequency</div>
									<?php echo $strFrequency0 ?><br/><br/>
                                    <div class="info-item">Link Quality</div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info progress-bar-striped active"
                                             role="progressbar"
                                             aria-valuenow="<?php echo $strLinkQuality0 ?>" aria-valuemin="0"
                                             aria-valuemax="100"
                                             style="width: <?php echo $strLinkQuality0 ?>%;"><?php echo $strLinkQuality0 ?>
                                            %
                                        </div>
                                    </div>
                                </div><!-- /.panel-body -->
                            </div><!-- /.panel-default -->
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->

                    <div class="col-lg-12">
                        <div class="row">
                            <form action="?page=wlan0_info" method="POST">
								<?php if (!$wlan0up)
								{
									echo '<input type="submit" class="btn btn-success" value="Start wlan0" name="ifup_wlan0" />';
								}
								else
								{
									echo '<input type="submit" class="btn btn-warning" value="Stop wlan0" name="ifdown_wlan0" />';
								}
								?>
                                <input type="button" class="btn btn-outline btn-primary" value="Refresh"
                                       onclick="document.location.reload(true)"/>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h4>Interface Information</h4>
                                    <div class="info-item">Interface Name</div>
                                    wlan1<br/>
                                    <div class="info-item">Mode</div>
									<?php echo $isAccessPoint1 ? 'Access Point' : 'Client' ?><br/>
                                    <div class="info-item">IP Address</div>
									<?php echo $strIPAddress1 ?><br/>
                                    <div class="info-item">Subnet Mask</div>
									<?php echo $strNetMask1 ?><br/>
                                    <div class="info-item">Mac Address</div>
									<?php echo $strHWAddress1 ?><br/><br/>

                                    <h4>Interface Statistics</h4>
                                    <div class="info-item">Received Packets</div>
									<?php echo $strRxPackets1 ?><br/>
                                    <div class="info-item">Received Bytes</div>
									<?php echo $strRxBytes1 ?><br/><br/>
                                    <div class="info-item">Transferred Packets</div>
									<?php echo $strTxPackets1 ?><br/>
                                    <div class="info-item">Transferred Bytes</div>
									<?php echo $strTxBytes1 ?><br/>
                                </div><!-- /.panel-body -->
                            </div><!-- /.panel-default -->
                        </div><!-- /.col-md-6 -->

                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body wireless">
                                    <h4>Wireless Information</h4>
                                    <div class="info-item">Connected To</div>
									<?php echo $strSSID1 ?><br/>
                                    <div class="info-item">AP Mac Address</div>
									<?php echo $strBSSID1 ?><br/>
                                    <div class="info-item">Bitrate</div>
									<?php echo $strBitrate1 ?><br/>
                                    <div class="info-item">Signal Level</div>
									<?php echo $strSignalLevel1 ?><br/>
                                    <div class="info-item">Transmit Power</div>
									<?php echo $strTxPower1 ?><br/>
                                    <div class="info-item">Frequency</div>
									<?php echo $strFrequency1 ?><br/><br/>
                                    <div class="info-item">Link Quality</div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info progress-bar-striped active"
                                             role="progressbar"
                                             aria-valuenow="<?php echo $strLinkQuality1 ?>" aria-valuemin="0"
                                             aria-valuemax="100"
                                             style="width: <?php echo $strLinkQuality1 ?>%;"><?php echo $strLinkQuality1 ?>
                                            %
                                        </div>
                                    </div>
                                </div><!-- /.panel-body -->
                            </div><!-- /.panel-default -->
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->

                    <div class="col-lg-12">
                        <div class="row">
                            <form action="?page=wlan0_info" method="POST">
								<?php if (!$wlan1up)
								{
									echo '<input type="submit" class="btn btn-success" value="Start wlan1" name="ifup_wlan1" />';
								}
								else
								{
//                                    echo '<input type="submit" class="btn btn-warning" value="Stop wlan1" name="ifdown_wlan1" />';
								}
								?>
                                <input type="button" class="btn btn-outline btn-primary" value="Refresh"
                                       onclick="document.location.reload(true)"/>
                            </form>
                        </div>
                    </div>

                </div><!-- /.panel-body -->
                <div class="panel-footer">Information provided by ifconfig and iwconfig</div>
            </div><!-- /.panel-default -->
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
	<?php
}

?>

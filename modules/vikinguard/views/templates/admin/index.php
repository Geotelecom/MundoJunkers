<?php
/**
 * ©2015 Heimdalapm
 *
 * @author    http://heimdalapm.com
 * @copyright Copyright (C) 2015 heimdalapm.com <@info@heimdalapm.com>
 *            All rights reserved.
 * @license   http://heimdalapm.com/heimdal/EULA.html
 */

header('Expires: Mon, 26 Jul 1998 05:00:00 GMT');
header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');

header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

header('Location: ../');
exit;

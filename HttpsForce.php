<?php

/* 
 * Force HTTPS from within Yii2.
 * @author David Webb <david@dpwlabs.com>
 * 
 * 
 */

namespace dpwlabs\https;

use Yii;
use yii\helpers\Url;

class HttpsForce {

  /**
   * Force HTTPS connection.
   * @param yii\base\Controller $controller
   * @return boolean true if connection is secure
   */
  public static function requireHttps($controller) {
    if (!Yii::$app->request->isSecureConnection && Yii::$app->request->serverName != 'localhost') {
      $url = Url::current([], 'https');
      $controller->redirect($url)->send();
      return false;
    }
    return true;
  }

}

<?php

namespace App\Utils;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

final class Helpers
{
  /* Get Youtube */
  public function getYoutube($url = '')
  {
    if ($url != '') {
      $parts = parse_url($url);
      if (isset($parts['query'])) {
        parse_str($parts['query'], $qs);
        if (isset($qs['v'])) return $qs['v'];
        else if ($qs['vi']) return $qs['vi'];
      }
      if (isset($parts['path'])) {
        $path = explode('/', trim($parts['path'], '/'));
        return $path[count($path) - 1];
      }
    }
    return false;
  }

  /* Get short video */
  public function getShortVideo($url = '')
  {
    if ($url != '') {
      $parseString = parse_url($url);
      if (isset($parseString['path'])) {
        $short = str_replace('/shorts/', '', $parseString['path']);
        return $short;
      }
    }
    return false;
  }

  /* Create watermark */
  public function createWatermark($data, $path, $pathInsert, $position, $x, $y, $option)
  {
    if ($data) {
      $manager = new ImageManager(new Driver());
      foreach ($data as $v) {
        if ($v->photo1) {
          $image = $manager->read($path . $v->photo1);
          $watermark = $manager->read($pathInsert);
          $image->place($watermark, $position, $x, $y);
          $publicPath = public_path('upload/wk_' . $option);
          $image->save($publicPath . "/" . $v->photo1);
        }
        if ($v->photo2) {
          $image = $manager->read($path . $v->photo2);
          $watermark = $manager->read($pathInsert);
          $image->place($watermark, $position, $x, $y);
          $publicPath = public_path('upload/wk_' . $option);
          $image->save($publicPath . "/" . $v->photo2);
        }
        if ($v->photo3) {
          $image = $manager->read($path . $v->photo3);
          $watermark = $manager->read($pathInsert);
          $image->place($watermark, $position, $x, $y);
          $publicPath = public_path('upload/wk_' . $option);
          $image->save($publicPath . "/" . $v->photo3);
        }
        if ($v->photo4) {
          $image = $manager->read($path . $v->photo4);
          $watermark = $manager->read($pathInsert);
          $image->place($watermark, $position, $x, $y);
          $publicPath = public_path('upload/wk_' . $option);
          $image->save($publicPath . "/" . $v->photo4);
        }
      }
      return;
    }
  }

  /* UTF8 convert */
  public function utf8Convert($str = '')
  {
    if ($str != '') {
      $utf8 = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'd' => 'đ|Đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'i' => 'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        '' => '`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\“|\”|\:|\;|_',
      );

      foreach ($utf8 as $ascii => $uni) {
        $str = preg_replace("/($uni)/i", $ascii, $str);
      }
    }

    return $str;
  }

  /* Change title */
  public function changeTitle($text = '')
  {
    if ($text != '') {
      $text = strtolower($this->utf8Convert($text));
      $text = preg_replace("/[^a-z0-9-\s]/", "", $text);
      $text = preg_replace('/([\s]+)/', '-', $text);
      $text = str_replace(array('%20', ' '), '-', $text);
      $text = preg_replace("/\-\-\-\-\-/", "-", $text);
      $text = preg_replace("/\-\-\-\-/", "-", $text);
      $text = preg_replace("/\-\-\-/", "-", $text);
      $text = preg_replace("/\-\-/", "-", $text);
      $text = '@' . $text . '@';
      $text = preg_replace('/\@\-|\-\@|\@/', '', $text);
    }

    return $text;
  }

  /* Check data */
  public function isRow($count)
  {
    if (
      $count > 0
    ) {
      return true;
    }
    return FALSE;
  }

  /* Transfer */
  public function transfer(string $message, string $status, string $url)
  {
    include_once(dirname(dirname(dirname(__FILE__))) . '/resources/views/transfer/index.blade.php');
  }

  /* Format phone number */
  public function formatPhone($number, $dash = ' ')
  {
    if (preg_match('/^(\d{4})(\d{3})(\d{3})$/', $number, $matches) || preg_match('/^(\d{3})(\d{4})(\d{4})$/', $number, $matches)) {
      return $matches[1] . $dash . $matches[2] . $dash . $matches[3];
    }
  }

  /* Google page speed */
  public function isGoogleSpeed()
  {
    if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Lighthouse') === false || stripos($_SERVER['HTTP_USER_AGENT'], 'Google-InspectionTool') === false) {
      return false;
    }
    return true;
  }

  /* Check field upload file */
  public static function hasFile($field)
  {
    if (isset($_FILES[$field])) {
      if ($_FILES[$field]['error'] == 4) {
        return false;
      } else if ($_FILES[$field]['error'] == 0) {
        return true;
      }
    } else {
      return false;
    }
  }

  /* Alert */
  public function alert(string $notify = '')
  {
    echo '<script language="javascript">alert("' . $notify . '")</script>';
  }

  /* Check status */
  public function checkStatus(string $statusDefault, string $statusStr)
  {
    if (isset($statusStr)) $sst = explode(',', $statusStr);
    if (in_array($statusDefault, $sst)) return true;
    return FALSE;
  }

  /* Structdata JSON Schema Product */
  public function buildSchemaProduct($id, $title, $photo, $code, $brand, $description, $salePrice, $author, $url)
  {
    $str = '{';
    $str .= '"@context": "https://schema.org/",';
    $str .= '"@type": "Product",';
    $str .= '"name": "' . $title . '",';
    $str .= '"image":';
    $str .= '[';
    $str .= '"' . $photo . '"';
    $str .= '],';
    $str .= '"description": "' . $description . '",';
    $str .= '"sku":"SP0' . $id . '",';
    $str .= '"mpn": "' . $code . '",';
    $str .= '"brand":';
    $str .= '{';
    $str .= '"@type": "Brand",';
    $str .= '"name": "' . $brand . '"';
    $str .= '},';
    $str .= '"review":';
    $str .= '{';
    $str .= '"@type": "Review",';
    $str .= '"reviewRating":';
    $str .= '{';
    $str .= '"@type": "Rating",';
    $str .= '"ratingValue": "5",';
    $str .= '"bestRating": "5"';
    $str .= '},';
    $str .= '"author":';
    $str .= '{';
    $str .= '"@type": "Person",';
    $str .= '"name": "' . $author . '"';
    $str .= '}';
    $str .= '},';
    $str .= '"aggregateRating":';
    $str .= '{';
    $str .= '"@type": "AggregateRating",';
    $str .= '"ratingValue": "4.4",';
    $str .= '"reviewCount": "89"';
    $str .= '},';
    $str .= '"offers":';
    $str .= '{';
    $str .= '"@type": "Offer",';
    $str .= '"url": "' . $url . '",';
    $str .= '"priceCurrency": "VND",';
    $str .= '"priceValidUntil": "2099-11-20",';
    $str .= '"price": "' . $salePrice . '",';
    $str .= '"itemCondition": "https://schema.org/UsedCondition",';
    $str .= '"availability": "https://schema.org/InStock"';
    $str .= '}';
    $str .= '}';
    $str = json_encode(json_decode($str), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    return $str;
  }

  /* Structdata JSON Schema Article */
  public function buildSchemaArticle($id, $title, $photo, $createdAt, $updatedAt, $companyName, $url, $logo, $urlBase)
  {
    $str = '{';
    $str .= '"@context": "https://schema.org",';
    $str .= '"@type": "NewsArticle",';
    $str .= '"mainEntityOfPage": ';
    $str .= '{';
    $str .= '"@type": "WebPage",';
    $str .= '"@id": "' . $id . '"';
    $str .= '},';
    $str .= '"headline": "' . $title . '",';
    $str .= '"image":';
    $str .= '{';
    $str .= '"@context": "https://schema.org/",';
    $str .= '"@type": "ImageObject",';
    $str .= '"contentUrl": "' . $photo . '",';
    $str .= '"url": "' . $photo . '",';
    $str .= '"license": "' . $url . '",';
    $str .= '"acquireLicensePage": "' . $url . '",';
    $str .= '"creditText": "' . $title . '",';
    $str .= '"copyrightNotice": "' . $companyName . '",';
    $str .= '"creator":';
    $str .= '{';
    $str .= '"@type": "Organization",';
    $str .= '"name": "' . $companyName . '"';
    $str .= '}';
    $str .= '},';
    $str .= '"datePublished": "' . $createdAt . '",';
    $str .= '"dateModified": "' . $updatedAt . '",';
    $str .= '"author":';
    $str .= '{';
    $str .= '"@type": "Organization",';
    $str .= '"name": "' . $companyName . '",';
    $str .= '"url": "' . $urlBase . '"';
    $str .= '},';
    $str .= '"publisher": ';
    $str .= '{';
    $str .= '"@type": "Organization",';
    $str .= '"name": "' . $companyName . '",';
    $str .= '"logo": ';
    $str .= '{';
    $str .= '"@type": "ImageObject",';
    $str .= '"url": "' . $logo . '"';
    $str .= '}';
    $str .= '}';
    $str .= '}';
    $str = json_encode(json_decode($str), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    return $str;
  }

  /* Recursive Render */
  public function isChild($data, $id)
  {
    foreach ($data as &$value) {
      if ($value['id_parent'] == $id) return true;
    }
    return FALSE;
  }

  public function recursiveCategory($data, $idParent = 0, $categoryDirect, $url, $id = 1)
  {
    $categories = "";
    $idParent == 0 ? $categories .= '<ul class="main-menu">' : $categories .= '<ul class="sub-menu-' . $id . '">';
    foreach ($data as $key => &$value) {
      if ($value['id_parent'] == $idParent) {
        $categories .= "<li>";
        $categories .= '<a href="' . $url . $categoryDirect . '?slug' . $id . '=' . $value['slug'] . '">' . $value['title'] . '</a>';
        unset($data[$key]);
        if ($this->isChild($data, $value['id'])) {
          $categories .= self::recursiveCategory($data, $value['id'], $categoryDirect, $url, $id + 1);
        }
        $categories .= "</li>";
      }
    }
    $categories .= "</ul>";
    return $categories;
  }

  /* Upload file */
  public function uploadFile(string $field = "", array $extensionAllow = [], string $folderUploadFile, $postMaxSize = 20971520)
  {
    if (isset($_FILES[$field]) && !$_FILES[$field]['error']) {
      $filename = $_FILES[$field]['name'];
      $filesize = $_FILES[$field]['size'];
      $name = pathinfo($filename, PATHINFO_FILENAME);

      if (!file_exists($folderUploadFile)) {
        mkdir($folderUploadFile, 0777, true);
      }

      $uploadfile = $folderUploadFile . $filename;

      $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

      if (!in_array($extension, $extensionAllow)) {
        self::alert('Chỉ hỗ trợ upload file có các định dạng' . implode(",", $extensionAllow));
        return false;
      }

      if (
        $filesize >= $postMaxSize
      ) {
        self::alert('Dung lượng file không được vượt quá ' . $postMaxSize . "byte");
        return false;
      }

      if (file_exists($uploadfile)) {
        for ($i = 0; $i < 1000; $i++) {
          if (!file_exists($folderUploadFile . $name . $i . '.' . $extension)) {
            $filename = $name . $i . '.' . $extension;
            $uploadfile = $folderUploadFile . $filename;
            break;
          }
        }
      } else {
        $filename = $_FILES[$field]['name'];
        $uploadfile = $folderUploadFile . $filename;
      }

      if (!copy($_FILES[$field]['tmp_name'], $uploadfile)) {
        if (!move_uploaded_file($_FILES[$field]['tmp_name'], $uploadfile)) {
          return false;
        }
      }
      return $filename;
    }
    return FALSE;
  }
}

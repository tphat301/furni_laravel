<?php

namespace App\Utils;

final class Helpers
{
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
        $this->alert('Chỉ hỗ trợ upload file có các định dạng' . implode(",", $extensionAllow));
        return false;
      }

      if ($filesize >= $postMaxSize) {
        $this->alert('Dung lượng file không được vượt quá ' . $postMaxSize . "byte");
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

  /* Check status */
  public function checkStatus(string $statusDefault, string $statusStr)
  {
    if (isset($statusStr)) $sst = explode(',', $statusStr);
    if (in_array($statusDefault, $sst)) return true;
    return FALSE;
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
}

<?php
/**
 * Created by PhpStorm.
 * User: Siipe
 * Date: 25/09/2015
 * Time: 17:07
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Network\Exception\InternalErrorException;
use Cake\Utility\Text;

class UploadComponent extends Component {

    public function decodeAndMoveBase64File($string) {
        $dir = WWW_ROOT.'img'.DS.'uploads'.DS;
        list($type, $string) = explode(';', $string);
        list(, $string)      = explode(',', $string);
        $extensionArray = explode('/', $type);
        $string = base64_decode($string);

        $imageName = Text::uuid().'.'.end($extensionArray);

        if(file_put_contents($dir.$imageName, $string))
            return $imageName;

        return null;
    }

    public function sendFileAndGetName($file, $oldFile = null) {
        $dir = WWW_ROOT.'img'.DS.'uploads';
        $this->deleteFile($oldFile);
        if(!empty($file)) {
            $filename = $file['name'];
            $tmp = $file['tmp_name'];
            if(!$this->isValidExtension($filename))
                throw new InternalErrorException(__('File extension not allowed'));
            elseif(is_uploaded_file($tmp)) {
                $newName = Text::uuid() . '-' . $filename;
                if (!move_uploaded_file($tmp, $dir.DS.$newName))
                    throw new InternalErrorException(__('It was not possible to move the file'));

                return $newName;
            }
        }
        return null;
    }

    public function deleteFile($fileName) {
        if($fileName) {
            $path = WWW_ROOT . 'img' . DS . 'uploads' . DS . $fileName;
            if (file_exists($path))
                unlink($path);
        }
    }

    private function isValidExtension($filename) {
        $extensions = ['jpg', 'png', 'jpeg'];
        return in_array(end(explode('.', $filename)), $extensions);
    }
}
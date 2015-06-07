<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Url;

class Article  extends Model {

    const ARTICLES_DIR = '@app/docs';
    public $url;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['url', 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'url' => 'Article name',
        ];
    }

    /**
     * List of all md articles in docs folder
     *
     * @return array
     */
    public static function articlesList()
    {

        $files = scandir(Yii::getAlias(self::ARTICLES_DIR)); // all files in dir

        $files = array_filter($files,function($filename) {
            return preg_match('/\.md$/', $filename);  // only .md files
        });

        $files = str_replace('.md','',$files); // file names without ext

        // replace keys with url to files
        foreach ($files as $index => $filename) {
            if (is_numeric($index)) {
              unset ($files[$index]);
              $url = static::makeUrl($filename);
              $files[$url] = $filename;
            }
        }

        return $files;

    }

    /**
     * @param $filename String
     * @return url controller/action to get html content of this file
     */

    public static function makeUrl($filename) {

        return Url::to(['ajax/load-file','filename' => $filename]);

    }

    /**
     * @param $filename String
     * @return string html content of .md file
     */

    public static function getContent($filename) {

        $markdown = file_get_contents(Yii::getAlias(self::ARTICLES_DIR.'/'.$filename.'.md'));

        $parser = new \cebe\markdown\Markdown();
        return $parser->parse($markdown);

    }

} 
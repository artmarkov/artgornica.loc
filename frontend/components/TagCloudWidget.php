<?php
/**
 * Array
(
    [0] => Array
        (
            [id] => 4
            [name] => Исполни свою мечту
            [slug] => name-4
            [count] => 50
            [url] => /4
        )

    [1] => Array
        (
            [id] => 1
            [name] => 30 встреч
            [slug] => name-1
            [count] => 40
            [url] => /1
        )
 * Simple tag cloud widget
 * @author Yaroslav Pelesh aka Tokolist http://tokolist.com
 * @link https://github.com/tokolist/yii-components
 * @version 1.1
 * @license http://www.opensource.org/licenses/mit-license.php The MIT License
 */
namespace frontend\components;
use yeesoft\helpers\Html;
use yii\helpers\ArrayHelper;

class TagCloudWidget extends \yii\base\Widget
{
        const DISTRIBUTION_LINEAR = 0;
	const DISTRIBUTION_LOGARITHMIC = 1;
	
	public $maxTags = 30;
	public $distribution = self::DISTRIBUTION_LOGARITHMIC;
	public $tagTable = 'tags';
	public $tagTableName = 'name';
	public $tagTableCount = 'count';
	public $urlRoute = 'site/index';
	public $urlParamName = 'slug';
	public $tagClasses = ['tag12', 'tag13', 'tag14', 'tag15', 'tag16', 'tag17', 'tag18'];
	public $linkOptions = ['nowrap'];
        public $iconClass = ['fa fa-tags'];
	public $itemTemplate = "{link}\n";
        
	protected function getLinearDistribution($rows, $maxCount, $minCount, $classesCount)
	{
		$tags = array();
		$countDiff = $maxCount - $minCount;
		$minCount--; $countDiff++; //Prevent zero division
		$classesCount--;
		foreach($rows as $row)
		{
			$tags[$row[$this->urlParamName]] = [ $this->tagTableName => $row[$this->tagTableName], 'class' =>$this->tagClasses[
				floor(($row[$this->tagTableCount] - $minCount) / $countDiff * $classesCount)
                            ]
			];
		}
		return $tags;
	}
	protected function getLogarithmicDistribution($rows, $maxCount, $minCount, $classesCount)
	{
		$tags = array();
		$minCount++;
		$maxCount++;
		$countDiff = log($maxCount) - log($minCount);
		$classesCount--;
		$minCount = log($minCount);
		foreach($rows as $row)
		{
			$tags[$row[$this->urlParamName]] = [ $this->tagTableName => $row[$this->tagTableName], 'class' => $this->tagClasses[
				floor((log($row[$this->tagTableCount] + 1) - $minCount) / $countDiff * $classesCount)
                            ]
			];
		}
		return $tags;
	}
	private function ciStringCompare($a, $b)
	{
		return strtolower($a) > strtolower($b);
	}
	public function run()
    {
        $sql = "SELECT * FROM {$this->tagTable} ORDER BY {$this->tagTableCount} DESC";
		if($this->maxTags !== false) {
			$sql .= " LIMIT {$this->maxTags}";
                }
		$command = \Yii::$app->db->createCommand($sql);
		$rows = $command->queryAll();
//                echo '<pre>' . print_r($rows, true) . '</pre>';
		if(!empty($rows))
		{
			$minCount = $rows[count($rows) - 1][$this->tagTableCount];
			$maxCount = $rows[0][$this->tagTableCount];
			$classesCount = count($this->tagClasses);
			switch($this->distribution)
			{
				case self::DISTRIBUTION_LINEAR:
					$tags = $this->getLinearDistribution($rows, $maxCount, $minCount, $classesCount);
					break;
				default: //DISTRIBUTION_LOGARITHMIC
					$tags = $this->getLogarithmicDistribution($rows, $maxCount, $minCount, $classesCount);
					break;
			}
			ksort($tags, SORT_LOCALE_STRING);
			//uksort($tags, array($this, 'ciStringCompare'));
                        echo '<pre>' . print_r($tags, true) . '</pre>';
			foreach($tags as $slug => $item)
			{
                           $link =  Html::a(Html::encode($item['name']), [$this->urlRoute, $this->urlParamName=>$slug], ['class' => ArrayHelper::merge($this->linkOptions, [$item['class']])]);
  			 
//                                $icon =  Html::tag('i', '', ['class' => ArrayHelper::merge($this->iconClass, [$class]),'aria-hidden'=>'true']);//                                
//                                $link =  Html::a($icon . $tag, [$this->urlRoute, $this->urlParamName=>$tag], ['class' => $this->linkOptions]);
//                                
				echo strtr($this->itemTemplate, array('{link}'=>$link));
			}
		}
	}
}

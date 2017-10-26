<?php
/** 
 * A class for generating Sitemaps v.0.9 (http://www.sitemaps.org/)
 * 
 * @author Alexander Makarov
 * @copyright 2008
 * @version 1.0
 * @uses PHP5
 * @link http://rmcreative.ru/blog/post/sitemap-klass-dlja-php5
 */
class Sitemap {
   const HEAD = "<\x3Fxml version=\"1.0\" encoding=\"UTF-8\"\x3F>\n\t<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">";
   const FOOT = "\t</urlset>";
   private $items = array();

   /**
   * Escapes sitemap entities according to spec.
   *
   * @param String $var
   * @return string
   * @access private
   */
   private static function escapeEntites($var){
      $entities = array(
        '&' => '&amp;',
        "'" => '&apos;',
        '"' => '&quot;',
        '>' => '&gt;',
        '<' => '&lt;'
      );
      return str_replace(array_keys($entities), array_values($entities), $var);
   }
   
   /** 
   * Adds a new item to sitemap.
   * @param SitemapItem item $item
   * @access public
   */
   function addItem(SitemapItem $item){
      $this->items[] = $item;
   }
   
   /** 
   * Generates sitemap.
   * @param string $fileName (optional) if file name is specified - write map to it, otherwise return it as a string.
   * @access public
   * @return [void|string]
   */
   function generate($fileName = null){
      ob_start();
      echo self::HEAD,"\n";
      
      foreach($this->items as $item){
         echo "\t\t<url>\n\t\t\t<loc>", self::escapeEntites($item->loc), "</loc>\n";
      
         if (!empty($item->lastmod)){
             echo "\t\t\t<lastmod>", $item->lastmod, "</lastmod>\n";
         }
         
         if (!empty( $item->changefreq)){
             echo "\t\t\t<changefreq>", $item->changefreq, "</changefreq>\n";
         }
         
         if (!empty($item->priority)){
             echo "\t\t\t<priority>", $item->priority, "</priority>\n";
         }
         
         echo "\t\t</url>\n";
       }
   
       echo self::FOOT, "\n";
       $map = ob_get_clean();
      
       if(is_null($fileName)){
          return $map;
       }
       else{
          file_put_contents($fileName, $map);
       }
   }
}

/** 
* A class for storing sitemap item.
*/
class SitemapItem {
   //$changefreq constants
   const always = 'always';
   const hourly = 'hourly';
   const daily = 'daily';
   const weekly = 'weekly';
   const monthly = 'monthly';
   const yearly = 'yearly';
   const never = 'never';
   
  /** 
   * @access public
   * @param string $loc location item URL.
   * @param int $lastmod date (optional). Last modification timestamp.
   * @param string $changefreq (optional). Use one of self:: contants here.
   * @param float $priority (optional) item's priority (0.0-1.0). Default is 0.5.
   */
  function __construct($loc, $lastmod = '', $changefreq = '', $priority = '' ){
    $this->loc = $loc;
    if((int)$lastmod){
       $this->lastmod = date('c', $lastmod);       
    }
    else {
       $this->lastmod = '';
    }
    $this->changefreq = $changefreq;
    $this->priority = $priority;
  }
}

// Создаём класс. 
$sitemap = new Sitemap(); 
$baseURL="http://dvornagin.lline.net/";
// Добавим страничку 
$sitemap->addItem(new SitemapItem( 
  $baseURL // URL.  
)); 
$sitemap->addItem(new SitemapItem( 
  $baseURL.'news/' // URL.  
));
$sitemap->addItem(new SitemapItem( 
  $baseURL.'announcement/' // URL. 
));
$sitemap->addItem(new SitemapItem( 
  $baseURL.'text/' // URL. 
));
$sitemap->addItem(new SitemapItem( 
  $baseURL.'press/' // URL. 
));

$query = "select * from text order by pos";
$result = "";
try {
    $result = $DBH->query($query)->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    if ($DEBUG)
        $ERROR[] = $e;
    else
        $ERROR[] = "Ошибка при обработке запроса";
}

foreach($result as $text){ 
  $sitemap->addItem(new SitemapItem( 
  $baseURL.'/text/'.$text['link'].'/' // URL. 
)); 
} 

$query = "select * from press order by pos";
$result = "";
try {
    $result = $DBH->query($query)->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    if ($DEBUG)
        $ERROR[] = $e;
    else
        $ERROR[] = "Ошибка при обработке запроса";
}
foreach($result as $press){ 
  $sitemap->addItem(new SitemapItem( 
  $baseURL.'/press/'.$press['id'].'/' // URL. 
)); 
} 

$query = "select announcement.*, announcement_type.link as link 
            from announcement 
            left join announcement_type 
            on announcement.tid=announcement_type.id 
            group by announcement.id
            order by announcement.date desc";
$result = "";
try {
    $result = $DBH->query($query)->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    if ($DEBUG)
        $ERROR[] = $e;
    else
        $ERROR[] = "Ошибка при обработке запроса";
}
foreach($result as $anno){ 
  $sitemap->addItem(new SitemapItem( 
  $baseURL.'/announcement/'.$anno['link'].'/'.$anno['id'].'/' // URL. 
)); 
} 
// Сгенерим sitemap в файл sitemap.xml. 
// Если файл не указать - generate вернёт строку. 
$sitemap->generate('sitemap.xml');  
?>

<?php namespace Brigham\Podcast\Adapters\Providers\SimplePie;

use DateTime;
use Brigham\Podcast\Adapters\EpisodeAdapterInterface;

class EpisodeAdapter implements EpisodeAdapterInterface {

    private $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    public function getDescription()
    {
        return $this->item->get_description();
    }

    public function getImageSrc()
    {
        // IF RSS HAS ITUNES DATA
        return $this->item->get_item_tags('http://www.itunes.com/dtds/podcast-1.0.dtd', 'image')[0]['attribs']['']['href'];
    }

    public function getSrc()
    {
        return $this->item->get_enclosure()->link;
    }

    public function getName()
    {
        return $this->item->get_title();
    }

    public function getPublishedAt()
    {
        $date_time = new DateTime();
        $date_time->setTimestamp(strtotime($this->item->get_date()));
        return $date_time;
    }
}
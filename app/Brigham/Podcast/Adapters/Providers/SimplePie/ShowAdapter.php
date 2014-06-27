<?php namespace Brigham\Podcast\Adapters\Providers\SimplePie;

use \DateTime;
use Brigham\Podcast\Adapters\ShowAdapterInterface;

class ShowAdapter implements ShowAdapterInterface {

    private $provider;
    private $show;

    public function __construct($provider)
    {
        $this->provider = $provider;
    }

    public function getShow(){
        return $this->show;
    }

    public function getFeedUrl()
    {
        return $this->provider->feed_url;
    }

    public function getName()
    {
        return $this->provider->get_title();
    }

    public function getDescription()
    {
        return $this->provider->get_description();
    }

    public function getImageSrc()
    {
        return $this->provider->get_image_url();
    }

    public function getLastBuildDate()
    {
        $last_build_date = null;
        if ($return = $this->provider->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'lastBuildDate'))
        {
            $last_build_date = $this->provider->sanitize($return[0]['data'], SimplePie_Misc :: atom_10_construct_type ($return[0]['attribs']), $this->provider->get_base($return[0]));
        }
        elseif ($return = $this->provider->get_channel_tags (SIMPLEPIE_NAMESPACE_ATOM_03, 'lastBuildDate'))
        {
            $last_build_date = $this->provider->sanitize($return[0]['data'], SimplePie_Misc :: atom_03_construct_type ($return[0]['attribs']), $this->provider->get_base($return[0]));
        }
        elseif ($return = $this->provider->get_channel_tags (SIMPLEPIE_NAMESPACE_RSS_10, 'lastBuildDate'))
        {
            $last_build_date = $this->provider->sanitize ($return[0]['data'], SIMPLEPIE_CONSTRUCT_MAYBE_HTML, $this->provider->get_base($return[0]));
        }
        elseif ($return =$this->provider->get_channel_tags (SIMPLEPIE_NAMESPACE_RSS_090, 'lastBuildDate'))
        {
            $last_build_date = $this->provider->sanitize ($return[0]['data'], SIMPLEPIE_CONSTRUCT_MAYBE_HTML, $this->provider->get_base($return[0]));
        }
        elseif ($return = $this->provider->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'lastBuildDate'))
        {
            $last_build_date = $this->provider->sanitize ($return[0]['data'], SIMPLEPIE_CONSTRUCT_MAYBE_HTML, $this->provider->get_base($return[0]));
        }
        elseif ($return = $this->provider->get_channel_tags (SIMPLEPIE_NAMESPACE_DC_11, 'lastBuildDate'))
        {
            $last_build_date = $this->provider->sanitize ($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
        }
        elseif ($return = $this->provider->get_channel_tags(SIMPLEPIE_NAMESPACE_DC_10, 'lastBuildDate'))
        {
            $last_build_date = $this->provider->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
        }

        if (is_null($last_build_date)) {
            return $last_build_date;
        }

        $date_time = new DateTime();
        $date_time->setTimestamp(strtotime($last_build_date));
        return $date_time;

    }

    public function getEpisodes(){
        return $this->provider->get_items();
    }
}
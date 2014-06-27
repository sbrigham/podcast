<?php
/**
 * Created by PhpStorm.
 * User: spencerbrigham
 * Date: 6/10/14
 * Time: 10:40 PM
 */

namespace Brigham\Podcast\Builders;

use Brigham\Podcast\Adapters\ShowAdapterInterface;

interface ShowBuilderInterface {
    public function __construct(ShowAdapterInterface $show_adapter);
    public function build();
    public function getShow(); // returns a podcast array representation
    public function getEpisodes();
}
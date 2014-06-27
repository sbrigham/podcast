<?php

use Illuminate\Console\Command;
use Brigham\Podcast\Services\PodcastServiceInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class UpdatePodcastsCommand extends Command {


    protected $pod_service;
	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'podcasts:update';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Updates all of the active podcasts in the database.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(PodcastServiceInterface $pod_service)
	{
        $this->pod_service = $pod_service;
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
        $this->pod_service->updatePodcasts();
        $this->info('Done!');
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			//array('example', InputArgument::REQUIRED, 'An example argument.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}

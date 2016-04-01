<?php
/**
 * @package     Joomla.Cli
 * @subpackage  JConsole
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace DevelopmentBundle\Command\Sqlsync\Backup;

use Windwalker\Console\Command\Command;
use DevelopmentBundle\Sqlsync\Model\SchemaModel;



/**
 * Class Backup
 *
 * @package     Joomla.Cli
 * @subpackage  JConsole
 *
 * @since       3.2
 */
class BackupCommand extends Command
{
	/**
	 * An enabled flag.
	 *
	 * @var bool
	 */
	public static $isEnabled = true;

	/**
	 * Console(Argument) name.
	 *
	 * @var  string
	 */
	protected $name = 'backup';

	/**
	 * The command description.
	 *
	 * @var  string
	 */
	protected $description = 'Backup sql.';

	/**
	 * The usage to tell user how to use this command.
	 *
	 * @var string
	 */
	protected $usage = 'backup <option>[option]</option>';

	/**
	 * Execute this command.
	 *
	 * @return int|void
	 */
	protected function doExecute()
	{
		$model = new SchemaModel;

		$this->out()->out('Backing up...');

		// Backup
		$model->backup();

		$this->out()->out(sprintf('Database backup to: %s', $model->getState()->get('dump.path')));

		return;
	}
}
